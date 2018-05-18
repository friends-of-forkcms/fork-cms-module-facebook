<?php

namespace Backend\Modules\FacebookRatings\Command;

use Common\ModulesSettings;

final class SaveSettingsHandler
{
    /** @var ModulesSettings */
    private $settings;

    public function __construct(ModulesSettings $settings)
    {
        $this->settings = $settings;
    }

    public function handle(SaveSettings $saveSettings): void
    {
        $this->settings->set('FacebookRatings', 'minimum_rating', $saveSettings->minimumRating);
    }
}
