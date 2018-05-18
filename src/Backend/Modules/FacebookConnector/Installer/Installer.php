<?php

namespace Backend\Modules\FacebookConnector\Installer;

use Backend\Core\Engine\Model;
use Backend\Core\Installer\ModuleInstaller;
use Backend\Modules\FacebookConnector\Domain\SeoPage\SeoPage;
use Backend\Modules\FacebookConnector\Domain\SeoPageBase\SeoPageBase;
use Common\ModuleExtraType;

/**
 * Installer for the FacebookConnector module
 */
class Installer extends ModuleInstaller
{
    /**
     * Install the module
     */
    public function install()
    {
        // add 'FacebookConnector' as a module
        $this->addModule('FacebookConnector');

        // import locale
        $this->importLocale(dirname(__FILE__) . '/Data/locale.xml');

        // Insert the rest
        $this->insertBackendNavigationForSettings();
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
            'facebook_connector/settings'
        );
    }

    protected function insertRights()
    {
        // Module rights
        $this->setModuleRights(1, $this->getModule());

        // Settings
        $this->setActionRights(1, $this->getModule(), 'Reset');
        $this->setActionRights(1, $this->getModule(), 'Settings');
        $this->setActionRights(1, $this->getModule(), 'CallbackFromFacebook');
    }

    protected function insertSettings()
    {
        $this->setSetting($this->getModule(), 'facebook_access_token', null);
        $this->setSetting($this->getModule(), 'facebook_page_access_token', null);
        $this->setSetting($this->getModule(), 'facebook_page_id', null);
    }
}
