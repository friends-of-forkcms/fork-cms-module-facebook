<?php

namespace Backend\Modules\FacebookEvents\Command;

use Symfony\Component\Validator\Constraints as Assert;
use Common\ModulesSettings;

final class SaveSettings
{
    /**
     * @var int
     *
     * @Assert\Range(
     *      min = 0,
     *      max = 30
     * )
     */
    public $maximumNumberOfEvents;

    public function __construct(ModulesSettings $modulesSettings)
    {
        $this->maximumNumberOfEvents = $modulesSettings->get('FacebookEvents', 'maximum_number_of_events');
    }
}
