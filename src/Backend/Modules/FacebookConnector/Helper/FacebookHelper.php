<?php

namespace Backend\Modules\FacebookConnector\Helper;

use Backend\Core\Engine\Model;
use Backend\Core\Language\Language;
use Backend\Modules\FacebookConnector\Component\FacebookStep;
use Common\ModulesSettings;
use Facebook\Facebook;
use Facebook\FacebookApp;
use Facebook\FacebookRequest;
use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException;

class FacebookHelper
{
    /** @var ModulesSettings */
    protected $settings;

    public function __construct(ModulesSettings $settings)
    {
        $this->settings = $settings;
    }

    public function getAccessTokenFromCallback()
    {
        $fb = $this->getFacebook();
        $helper = $fb->getRedirectLoginHelper();

        try {
            $accessToken = $helper->getAccessToken();
        } catch (FacebookResponseException $e) {
            // When Graph returns an error
            throw new \Exception('Graph returned an error: ' . $e->getMessage());
        } catch (FacebookSDKException $e) {
            // When validation fails or other local issues
            throw new \Exception('Facebook SDK returned an error: ' . $e->getMessage());
        }

        if (!isset($accessToken)) {
            if ($helper->getError()) {
                $errors = [];
                $errors[] = "Error: " . $helper->getError() . " - ";
                $errors[] = "Error Code: " . $helper->getErrorCode() . " - ";
                $errors[] = "Error Reason: " . $helper->getErrorReason() . " - ";
                $errors[] = "Error Description: " . $helper->getErrorDescription() . " - ";

                throw new \Exception(implode(', ', $errors));
            } else {
                throw new \Exception('Bad request');
            }
        }

        // Set access token
        $this->settings->set('FacebookConnector', 'facebook_access_token', $accessToken->getValue());

        // The OAuth 2.0 client handler helps us manage access tokens
        $oAuth2Client = $fb->getOAuth2Client();

        // Get the access token metadata from /debug_token
        $tokenMetadata = $oAuth2Client->debugToken($accessToken);

        // Validation (these will throw FacebookSDKException's when they fail)
        $tokenMetadata->validateAppId($this->settings->get('Core', 'facebook_app_id'));

        // If you know the user ID this access token belongs to, you can validate it here
        //$tokenMetadata->validateUserId('123');
        $tokenMetadata->validateExpiration();

        if (!$accessToken->isLongLived()) {
            // Exchanges a short-lived access token for a long-lived one
            try {
                $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
            } catch (FacebookSDKException $e) {
                throw new \Exception('<p>Error getting long-lived access token: ' . $e->getMessage() . '</p>\n\n');
            }

            // Set long lived access token
            $this->settings->set('FacebookConnector', 'facebook_access_token', $accessToken->getValue());
        }
    }

    public function getFacebook(bool $usePageAccessToken = false): Facebook
    {
        $parameters = [
            'app_id' => $this->settings->get('Core', 'facebook_app_id'),
            'app_secret' => $this->settings->get('Core', 'facebook_app_secret'),
            'default_graph_version' => 'v2.9',
        ];

        if ($usePageAccessToken) {
            $parameters['default_access_token'] = $this->getPageAccessToken();
        }

        return new Facebook($parameters);
    }

    public function getFacebookApp(): FacebookApp
    {
        return new FacebookApp(
            $this->settings->get('Core', 'facebook_app_id'),
            $this->settings->get('Core', 'facebook_app_secret'),
            'v2.7'
        );
    }

    public function getLoginUrl(): string
    {
        $fb = $this->getFacebook();
        $helper = $fb->getRedirectLoginHelper();

        $permissions = ['email']; // Optional permissions
        return $helper->getLoginUrl(rtrim(SITE_URL, '/') . '/private/' . Language::getWorkingLanguage() . '/facebook_connector/callback_from_facebook', $permissions);
    }

    private function getNewPageAccessToken(): ?string
    {
        $request = new FacebookRequest(
            $this->getFacebookApp(),
            $this->settings->get('FacebookConnector', 'facebook_access_token'),
            'GET',
            '/' . $this->settings->get('FacebookConnector', 'facebook_page_id') . '?fields=access_token',
            array('ADMINISTER')
        );

        $result = $this->getFacebook()->getClient()->sendRequest($request);
        $json = json_decode($result->getBody());

        if ($json->access_token === null) {
            return null;
        }

        return $json->access_token;
    }

    public function getPageId(): ?string
    {
        return $this->settings->get('FacebookConnector', 'facebook_page_id');
    }

    public function getPageAccessToken(): string
    {
        if ($this->settings->get('FacebookConnector', 'facebook_page_access_token') === null) {
            $newPageAccessToken = $this->getNewPageAccessToken();
            if ($newPageAccessToken !== null) {
                $this->settings->set('FacebookConnector', 'facebook_page_access_token', $newPageAccessToken);
            }
        }

        return $this->settings->get('FacebookConnector', 'facebook_page_access_token');
    }

    public function getStep(): string
    {
        $step = new FacebookStep($this->settings);
        return $step->getStep();
    }

    public function isValidPageId(string $pageId): bool
    {
        $request = new FacebookRequest(
            $this->getFacebookApp(),
            $this->settings->get('FacebookConnector', 'facebook_access_token'),
            'GET',
            '/' . $pageId
        );

        $result = $this->getFacebook()->getClient()->sendRequest($request);
        $json = json_decode($result->getBody());

        try {
            return isset($json->name);
        } catch (\Exception $e) {
            return false;
        }
    }

    public function reset(): void
    {
        $this->settings->delete('FacebookConnector', 'facebook_access_token');
        $this->settings->delete('FacebookConnector', 'facebook_page_id');
        $this->settings->delete('FacebookConnector', 'facebook_page_access_token');
    }

    public function resetAccessTokens(): void
    {
        $this->settings->delete('FacebookConnector', 'facebook_access_token');
        $this->settings->delete('FacebookConnector', 'facebook_page_access_token');
    }
}
