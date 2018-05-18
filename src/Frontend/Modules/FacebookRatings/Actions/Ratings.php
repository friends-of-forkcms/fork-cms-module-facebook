<?php

namespace Frontend\Modules\FacebookRatings\Actions;

use Frontend\Core\Engine\Base\Block;

class Ratings extends Block
{
    public function execute(): void
    {
        parent::execute();

        try {
            $this->tpl->assign('ratings', $this->get('facebook.repository.rating')->findAll());
        } catch (\Exception $e) {
            // @todo: Notify your "error log service" of this error

            $this->tpl->assign('ratings', false);
        }

        $this->tpl->assign('facebookPageId', $this->get('facebook.helper')->getPageId());
        $this->tpl->assign('minimumRating', $this->get('fork.settings')->get('FacebookRatings', 'minimum_rating', 4));
        $this->loadTemplate();
    }
}
