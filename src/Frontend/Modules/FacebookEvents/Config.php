<?php

namespace Frontend\Modules\FacebookEvents;

use Frontend\Core\Engine\Base\Config as FrontendBaseConfig;

/**
 * This is the configuration-object
 */
class Config extends FrontendBaseConfig
{
    /**
     * The default action
     *
     * @var string
     */
    protected $defaultWidget = 'Events';
}
