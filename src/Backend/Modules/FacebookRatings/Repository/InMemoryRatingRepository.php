<?php

namespace Backend\Modules\FacebookRatings\Repository;

class InMemoryRatingRepository implements RatingRepository
{
    public function findAll(int $limit = null): array
    {
        $data = $this->getDummyData();

        if ($limit === null) {
            return $data;
        }

        return array_splice($data, 0, $limit);
    }

    private function getDummyData(): array
    {
        return [
            [
                "created_time" => "2016-12-15T21:58:00+0000",
                "reviewer" => [
                    "name" => "Philippe Pieters",
                    "id" => "10209220103076751",
                ],
                "rating" => 4,
                "review_text" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse in velit non erat rutrum scelerisque. In diam tellus, facilisis vel pharetra sed, condimentum volutpat eros.",
            ],
            [
                "created_time" => "2016-12-15T18:41:16+0000",
                "reviewer" => [
                    "name" => "Jean De man",
                    "id" => "1867621790154072",
                ],
                "rating" => 5,
                "review_text" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse in velit non erat rutrum scelerisque. In diam tellus, facilisis vel pharetra sed, condimentum volutpat eros.",
            ],
            [
                "created_time" => "2016-11-27T18:32:24+0000",
                "reviewer" => [
                    "name" => "Erica Vangheluwe",
                    "id" => "1386867694761618",
                ],
                "rating" => 5,
            ],
            [
                "created_time" => "2017-04-13T08:06:47+0000",
                "reviewer" => [
                    "name" => "Vanessa Aruba",
                    "id" => "10211423086545233",
                ],
                "rating" => 4,
                "review_text" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse in velit non erat rutrum scelerisque. In diam tellus, facilisis vel pharetra sed, condimentum volutpat eros.",
            ],
            [
                "created_time" => "2017-04-05T06:38:26+0000",
                "reviewer" => [
                    "name" => "Helouise Krekels",
                    "id" => "10155161313065928",
                ],
                "rating" => 4,
                "review_text" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse in velit non erat rutrum scelerisque. In diam tellus, facilisis vel pharetra sed, condimentum volutpat eros.",
            ],
            [
                "created_time" => "2017-03-28T18:45:58+0000",
                "reviewer" => [
                    "name" => "Pieter Krakels",
                    "id" => "835490536606797",
                ],
                "rating" => 5,
                "review_text" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse in velit non erat rutrum scelerisque. In diam tellus, facilisis vel pharetra sed, condimentum volutpat eros.",
            ],
        ];
    }
}
