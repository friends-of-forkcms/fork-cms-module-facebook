<?php

namespace Backend\Modules\FacebookConnector\Component;

use Common\ModulesSettings;

class FacebookStep
{
    public const STEP_ONE_REQUIRES_FACEBOOK_APP_ID_AND_SECRET = 'step_one_get_facebook_app_id_and_secret';
    public const STEP_TWO_REQUIRES_LOGIN = 'step_two_requires_login';
    public const STEP_THREE_REQUIRES_PAGE_ID = 'step_three_requires_page_id';
    public const STEP_FOUR_REQUIRES_PAGE_ACCESS_TOKEN = 'step_four_requires_page_access_token';
    public const ACTIVE = 'active';

    /** @var string */
    private $step;

    public function __construct(ModulesSettings $settings)
    {
        if ($settings->get('Core', 'facebook_app_id') === null
            || $settings->get('Core', 'facebook_app_id') === null
        ) {
            $this->step = self::STEP_ONE_REQUIRES_FACEBOOK_APP_ID_AND_SECRET;

            return;
        }

        if ($settings->get('FacebookConnector', 'facebook_access_token') === null) {
            $this->step = self::STEP_TWO_REQUIRES_LOGIN;

            return;
        }

        if ($settings->get('FacebookConnector', 'facebook_page_id') === null) {
            $this->step = self::STEP_THREE_REQUIRES_PAGE_ID;

            return;
        }

        if ($settings->get('FacebookConnector', 'facebook_page_access_token') === null) {
            $this->step = self::STEP_FOUR_REQUIRES_PAGE_ACCESS_TOKEN;

            return;
        }

        $this->step = self::ACTIVE;
    }

    public function getStep(): string
    {
        return $this->step;
    }
}
