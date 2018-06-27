<?php

namespace Backend\Modules\FacebookEvents\Repository;

use Backend\Modules\FacebookConnector\Component\FacebookStep;
use Backend\Modules\FacebookEvents\Helper\FacebookEventsHelper;

class FacebookEventRepository implements EventRepository
{
    /** @var FacebookEventsHelper */
    private $facebookRatingsHelper;

    public function __construct(FacebookEventsHelper $facebookRatingsHelper)
    {
        $this->facebookRatingsHelper = $facebookRatingsHelper;
    }

    public function findAll(int $limit = null): array
    {
        if ($this->facebookRatingsHelper->getFacebookHelper()->getStep() !== FacebookStep::ACTIVE) {
            throw new \Exception('Facebook parameters not complete, you have to fill in the FacebookEvents settings first.');
        }

        return $this->facebookRatingsHelper->getEvents($limit);
    }
}
