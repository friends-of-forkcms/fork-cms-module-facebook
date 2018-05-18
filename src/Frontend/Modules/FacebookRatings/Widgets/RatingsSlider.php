<?php

namespace Frontend\Modules\FacebookRatings\Widgets;

use Frontend\Core\Engine\Base\Widget;

class RatingsSlider extends Widget
{
    public function execute(): void
    {
        parent::execute();
        $this->tpl->assign('facebookPageId', $this->get('facebook.helper')->getPageId());
        $this->tpl->assign('minimumRating', $this->get('fork.settings')->get('FacebookRatings', 'minimum_rating', 4));

        try {
            $this->addJSData('ratings', $this->getRatingsForJSData($this->getRatings()));
            $this->tpl->assign('hasRatings', true);
        } catch (\Exception $e) {
            // Notify bugsnag of this error
            $this->get('bugsnag')->notifyException($e);

            $this->tpl->assign('hasRatings', false);
        }

        $this->loadTemplate();
    }

    private function getRatings(int $limit = 10): array
    {
        return $this->get('facebook.repository.rating')->findAll($limit);
    }

    private function getRatingsForJSData(array $data): array
    {
        $ratings = [];

        foreach ($data as $item) {
            $item['stars_html'] = $this->getStarsHtml($item['rating']);

            $ratings[] = $item;
        }

        return $ratings;
    }

    private function getStarsHtml(int $rating): string
    {
        $html = '';

        for ($i = 1; $i < 6; $i ++) {
            $iconClass = ($i <= $rating) ? 'fa-star' : 'fa-star-o';
            $html .= '<i class="fa ' . $iconClass . '" aria-hidden="true"></i>';
        }

        return $html;
    }
}
