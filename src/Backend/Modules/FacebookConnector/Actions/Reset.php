<?php

namespace Backend\Modules\FacebookConnector\Actions;

use Backend\Core\Engine\Base\ActionEdit;
use Backend\Core\Engine\Model;

class Reset extends ActionEdit
{
    public function execute(): void
    {
        parent::execute();

        $this->get('facebook.helper')->reset();
        $this->redirect(Model::createURLForAction('Settings'));
    }
}
