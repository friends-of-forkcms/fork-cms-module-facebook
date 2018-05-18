<?php

namespace Backend\Modules\FacebookConnector\Command;

use Common\ModulesSettings;

final class SavePageIdHandler
{
    /** @var ModulesSettings */
    private $settings;

    public function __construct(ModulesSettings $settings)
    {
        $this->settings = $settings;
    }

    public function handle(SavePageId $saveSettings): void
    {
        $this->settings->set('FacebookConnector', 'facebook_page_id', $saveSettings->pageId);
    }
}
