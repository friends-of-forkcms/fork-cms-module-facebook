<?php

namespace Backend\Modules\FacebookRatings\Repository;

use Backend\Modules\FacebookConnector\Component\FacebookStep;
use Backend\Modules\FacebookRatings\Helper\FacebookRatingsHelper;

class FacebookRatingRepository implements RatingRepository
{
    /** @var FacebookRatingsHelper */
    private $facebookRatingsHelper;

    public function __construct(FacebookRatingsHelper $facebookRatingsHelper)
    {
        $this->facebookRatingsHelper = $facebookRatingsHelper;
    }

    public function findAll(int $limit = null): array
    {
        if ($this->facebookRatingsHelper->getFacebookHelper()->getStep() !== FacebookStep::ACTIVE) {
            throw new \Exception('Facebook parameters not complete, you have to fill in the FacebookRatings settings first.');
        }

        return $this->facebookRatingsHelper->getRatings($limit);
    }
}
