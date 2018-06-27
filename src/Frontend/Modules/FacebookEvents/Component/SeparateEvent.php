<?php

namespace Frontend\Modules\FacebookEvents\Component;

class SeparateEvent
{
    /** @var \DateTime*/
    private $endTime;

    /** @var array */
    private $event;

    /** @var int */
    private $id;

    /** @var \DateTime*/
    private $startTime;

    private function __construct(\DateTime $startTime, \DateTime $endTime, int $id, array $event)
    {
        $this->startTime = $startTime;
        $this->endTime = $endTime;
        $this->id = $id;
        $this->event = $event;
    }

    public static function create(\DateTime $startTime, \DateTime $endTime, int $id, array $event): SeparateEvent
    {
        return new self($startTime, $endTime, $id, $event);
    }

    public function getEndTime(): \DateTime
    {
        return $this->endTime;
    }

    public function getEvent(): array
    {
        return $this->event;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getStartTime(): \DateTime
    {
        return $this->startTime;
    }
}
