<?php

namespace Frontend\Modules\FacebookRatings\Actions;

use Frontend\Core\Engine\Base\Block;

class Ratings extends Block
{
    public function execute(): void
    {
        parent::execute();

        try {
            $this->template->assign('ratings', $this->get('facebook.repository.rating')->findAll());
        } catch (\Exception $e) {
            // @todo: Notify your "error log service" of this error

            $this->template->assign('ratings', false);
        }

        $this->template->assign('facebookPageId', $this->get('facebook.helper')->getPageId());
        $this->template->assign('minimumRating', $this->get('fork.settings')->get('FacebookRatings', 'minimum_rating', 4));
        $this->loadTemplate();
    }
}
