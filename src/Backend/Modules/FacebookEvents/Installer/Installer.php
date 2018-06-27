<?php

namespace Backend\Modules\FacebookEvents\Installer;

use Backend\Core\Engine\Model;
use Backend\Core\Installer\ModuleInstaller;
use Backend\Modules\FacebookEvents\Domain\SeoPage\SeoPage;
use Backend\Modules\FacebookEvents\Domain\SeoPageBase\SeoPageBase;
use Common\ModuleExtraType;

/**
 * Installer for the FacebookEvents module
 */
class Installer extends ModuleInstaller
{
    /**
     * Install the module
     */
    public function install()
    {
        $this->addModule('FacebookEvents');
        $this->importLocale(dirname(__FILE__) . '/Data/locale.xml');
        $this->insertBackendNavigationForSettings();
        $this->insertFrontendExtras();
        $this->insertRights();
        $this->insertSettings();
    }

    protected function insertBackendNavigationForSettings()
    {
        // Define settings id
        $navigationSettingsId = $this->setNavigation(null, 'Settings');
        $navigationModulesId = $this->setNavigation($navigationSettingsId, 'Modules');

        // Add navigation items for seo pages
        $this->setNavigation(
            $navigationModulesId,
            $this->getModule(),
            'facebook_events/settings'
        );
    }

    protected function insertFrontendExtras()
    {
        $this->insertExtra($this->getModule(), ModuleExtraType::widget(), 'Events', 'Events');
    }

    protected function insertRights()
    {
        // Module rights
        $this->setModuleRights(1, $this->getModule());

        // Settings
        $this->setActionRights(1, $this->getModule(), 'Settings');
    }

    protected function insertSettings()
    {
        $this->setSetting($this->getModule(), 'maximum_number_of_events', 10);
    }
}
