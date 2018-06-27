<?php

namespace Frontend\Modules\FacebookEvents\Component;

class SeparateEventCollection
{
    /** @var array */
    private $separateEvents = [];

    public function __construct(array $events)
    {
        foreach ($events as $event) {
            if (array_key_exists('event_times', $event)) {
                foreach ($event['event_times'] as $eventTime) {
                    $this->add(SeparateEvent::create(
                        self::createDateTime($eventTime['start_time']),
                        self::createDateTime($eventTime['end_time']),
                        $eventTime['id'],
                        $event
                    ));
                }

                continue;
            }

            $this->add(SeparateEvent::create(
                self::createDateTime($event['start_time']),
                self::createDateTime($event['end_time']),
                $event['id'],
                $event
            ));
        }
    }

    public function add(SeparateEvent $separateEvent): void
    {
        $this->separateEvents[] = $separateEvent;
    }

    public static function createDateTime(string $dateTime): \DateTime
    {
        return \DateTime::createFromFormat(\DateTime::ATOM, $dateTime);
    }

    public function getAll(): array
    {
        return $this->separateEvents;
    }

    public function getAllOrdered(): array
    {
        $separateEvents = $this->separateEvents;
        usort($separateEvents, function(SeparateEvent $a, SeparateEvent $b){
            return ($a->getStartTime()->getTimeStamp() <= $b->getStartTime()->getTimeStamp()) ? -1 : 1;
        });

        return $separateEvents;
    }

    public function getAllOrderedInTheFuture(): array
    {
        return array_filter($this->getAllOrdered(), function (SeparateEvent $event){
            $clonedEvent = clone $event->getStartTime();

            return $clonedEvent->setTime(0, 0,0) >= (new \DateTime())->setTime(0, 0,0);
        });
    }
}
