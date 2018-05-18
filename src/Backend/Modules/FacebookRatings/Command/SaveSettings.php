<?php

namespace Backend\Modules\FacebookRatings\Command;

use Symfony\Component\Validator\Constraints as Assert;
use Common\ModulesSettings;

final class SaveSettings
{
    /**
     * @var int
     *
     * @Assert\Range(
     *      min = 0,
     *      max = 5
     * )
     */
    public $minimumRating;

    public function __construct(ModulesSettings $modulesSettings)
    {
        $this->minimumRating = $modulesSettings->get('FacebookRatings', 'minimum_rating');
    }
}
