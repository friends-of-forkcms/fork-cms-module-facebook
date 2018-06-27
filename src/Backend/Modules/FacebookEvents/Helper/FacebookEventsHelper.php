<?php

namespace Backend\Modules\FacebookEvents\Helper;

use Backend\Modules\FacebookConnector\Helper\FacebookHelper;
use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException;

class FacebookEventsHelper
{
    /** @var FacebookHelper */
    protected $facebookHelper;

    public function __construct(FacebookHelper $facebookHelper)
    {
        $this->facebookHelper = $facebookHelper;
    }

    public function getFacebookHelper(): FacebookHelper
    {
        return $this->facebookHelper;
    }

    public function getEvents(int $limit = null): array
    {
        $fb = $this->facebookHelper->getFacebook(true);

        try {
            $parameters = ($limit !== null) ? '?fields=cover,id,description,end_time,event_times,place,start_time&limit=' . $limit : null;

            // Get the \Facebook\GraphNodes\GraphUser object for the current user.
            // If you provided a 'default_access_token', the '{access-token}' is optional.
            $response = $fb->get($this->facebookHelper->getPageId() . '/events' . $parameters);

            return $response->getDecodedBody()['data'];
        } catch(FacebookResponseException $e) {
            if ($e->getErrorType() === 'OAuthException') {
                $this->facebookHelper->resetAccessTokens();
            }

            // When Graph returns an error
            throw new \Exception(
                'Fork CMS admin: Please log in to the "FacebookConnector" module settings, to re-click the "login button".'
                . 'Because we automatically removed the access-token and page-access-token, '
                . 'since of the following error: from the Facebook Graph: ' . $e->getMessage() . '.'
            );
        } catch(FacebookSDKException $e) {
            throw new \Exception('Facebook SDK returned an error: ' . $e->getMessage());
        }
    }
}
