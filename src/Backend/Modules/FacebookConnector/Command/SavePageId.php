<?php

namespace Backend\Modules\FacebookConnector\Command;

use Backend\Modules\FacebookConnector\Validator\Constraints as Assert;

final class SavePageId
{
    /**
     * @var string
     *
     * @Assert\ValidFacebookPageId
     */
    public $pageId;
}
