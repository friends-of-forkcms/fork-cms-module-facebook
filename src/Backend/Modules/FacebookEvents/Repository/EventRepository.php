<?php

namespace Backend\Modules\FacebookEvents\Repository;

interface EventRepository
{
    public function findAll(int $limit = null): array;
}
