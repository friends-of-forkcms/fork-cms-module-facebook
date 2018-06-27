<?php

namespace Frontend\Modules\FacebookEvents\Widgets;

use Frontend\Core\Engine\Base\Widget;
use Frontend\Modules\FacebookEvents\Component\SeparateEventCollection;

class Events extends Widget
{
    public function execute(): void
    {
        parent::execute();

        try {
            $this->template->assign('events', (new SeparateEventCollection($this->getEvents()))->getAllOrderedInTheFuture());
            $this->template->assign('hasEvents', true);
        } catch (\Exception $e) {
            // @note: Notify your bug tracker of this error

            $this->template->assign('hasEvents', false);
        }

        $this->loadTemplate();
    }

    private function getEvents(): array
    {
        return $this->get('facebook.repository.event')->findAll(
            $this->get('fork.settings')->get('FacebookEvents', 'maximum_number_of_events', 10)
        );
    }
}
