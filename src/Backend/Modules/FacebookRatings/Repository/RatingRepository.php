<?php

namespace Backend\Modules\FacebookRatings\Repository;

interface RatingRepository
{
    public function findAll(int $limit = null): array;
}
