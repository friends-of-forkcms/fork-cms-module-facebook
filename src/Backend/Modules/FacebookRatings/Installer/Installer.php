<?php

namespace Backend\Modules\FacebookRatings\Installer;

use Backend\Core\Engine\Model;
use Backend\Core\Installer\ModuleInstaller;
use Backend\Modules\FacebookRatings\Domain\SeoPage\SeoPage;
use Backend\Modules\FacebookRatings\Domain\SeoPageBase\SeoPageBase;
use Common\ModuleExtraType;

/**
 * Installer for the FacebookRatings module
 */
class Installer extends ModuleInstaller
{
    /**
     * Install the module
     */
    public function install()
    {
        $this->addModule('FacebookRatings');
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
            'facebook_ratings/settings'
        );
    }

    protected function insertFrontendExtras()
    {
        $this->insertExtra($this->getModule(), ModuleExtraType::block(), 'Ratings', 'Ratings');
        $this->insertExtra($this->getModule(), ModuleExtraType::widget(), 'RatingsSlider', 'RatingsSlider');
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
        $this->setSetting($this->getModule(), 'minimum_rating', 4);
    }
}
