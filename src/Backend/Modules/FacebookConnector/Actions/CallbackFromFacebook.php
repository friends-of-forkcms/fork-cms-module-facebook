<?php

namespace Backend\Modules\FacebookConnector\Actions;

use Backend\Core\Engine\Base\ActionEdit;
use Backend\Core\Engine\Model;

class CallbackFromFacebook extends ActionEdit
{
    public function execute(): void
    {
        parent::execute();

        try {
            $this->get('facebook.helper')->getAccessTokenFromCallback();
            $this->redirect(Model::createURLForAction('Settings'));
        } catch (\Exception $e) {
            $this->redirect(Model::createURLForAction('Settings') . '?error=' . $e->getMessage());
        }
    }
}
