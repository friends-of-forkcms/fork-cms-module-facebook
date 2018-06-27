<?php

namespace Backend\Modules\FacebookEvents;

use Backend\Core\Engine\Base\Config as BackendBaseConfig;

/**
 * This is the configuration-object for the FacebookEvents module
 */
class Config extends BackendBaseConfig
{
    /**
     * The default action
     *
     * @var string
     */
    protected $defaultAction = 'Settings';
}
