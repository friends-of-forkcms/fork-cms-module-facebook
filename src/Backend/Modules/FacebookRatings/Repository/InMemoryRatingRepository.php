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
                    "name" => "Philippe Smolders",
                    "id" => "10209220103076751",
                ],
                "rating" => 4,
                "review_text" => "Fijne avond gehad met topbediening",
            ],
            [
                "created_time" => "2016-12-15T18:41:16+0000",
                "reviewer" => [
                    "name" => "Geert De Vriendt",
                    "id" => "1867621790154072",
                ],
                "rating" => 5,
                "review_text" => "Toffe, vriendelijke ontvangst. Mooi kader. Héél vlotte bediening. Héél lekker eten. Supervriendelijke uitbaters. Meer dan 5 sterren waard. Uiterst correcte en vlotte samenwerking",
            ],
            [
                "created_time" => "2016-11-27T18:32:24+0000",
                "reviewer" => [
                    "name" => "Stefanie Isaura Huys",
                    "id" => "1386867694761618",
                ],
                "rating" => 5,
            ],
            [
                "created_time" => "2017-04-13T08:06:47+0000",
                "reviewer" => [
                    "name" => "Melanie Vervaeck",
                    "id" => "10211423086545233",
                ],
                "rating" => 4,
                "review_text" => "Op 8 april ging ons huwelijksfeest door in gruuthuse. Veel voorbereidingen veel stress maar met katty en pascal was dit absoluut niet nodig! Heel flexibele super lieve mensen die overal helpen waar nodig!! Ook personeel doet hun werk uitstekend! Zaal prachtig versierd, eten tip top inorde! Van ons verdienen jullie alle sterren!!",
            ],
            [
                "created_time" => "2017-04-05T06:38:26+0000",
                "reviewer" => [
                    "name" => "Julie Lasuy",
                    "id" => "10155161313065928",
                ],
                "rating" => 4,
                "review_text" => "Onze babyborrel was piekfijn in orde! Zeer correcte prijs en heel vriendelijk personeel. Zonder enige twijfel zouden we er opnieuw voor kiezen!",
            ],
            [
                "created_time" => "2017-03-28T18:45:58+0000",
                "reviewer" => [
                    "name" => "Jens Verstraete",
                    "id" => "835490536606797",
                ],
                "rating" => 5,
                "review_text" => "2 weken geleden babyborrel laten doorgaan in Salons Gruuthuse van ons zoontje en het was super. Iedereen die uitgenodigd was sprak zowel tijdens als na de banbyborrel lovende woorden uit. Is een echte aanrader. ��",
            ],
            [
                "created_time" => "2017-01-15T20:51:34+0000",
                "reviewer" => [
                    "name" => "Killian Pycke",
                    "id" => "1441967165860315",
                ],
                "rating" => 5,
                "review_text" => "Heel lekker en een zeer goede bediening !!",
            ],
            [
                "created_time" => "2016-12-15T21:58:00+0000",
                "reviewer" => [
                    "name" => "Philippe Smolders",
                    "id" => "10209220103076751",
                ],
                "rating" => 4,
                "review_text" => "Fijne avond gehad met topbediening",
            ],
            [
                "created_time" => "2016-12-15T18:41:16+0000",
                "reviewer" => [
                    "name" => "Geert De Vriendt",
                    "id" => "1867621790154072",
                ],
                "rating" => 5,
                "review_text" => "Toffe, vriendelijke ontvangst. Mooi kader. Héél vlotte bediening. Héél lekker eten. Supervriendelijke uitbaters. Meer dan 5 sterren waard. Uiterst correcte en vlotte samenwerking",
            ],
            [
                "created_time" => "2016-11-27T18:32:24+0000",
                "reviewer" => [
                    "name" => "Stefanie Isaura Huys",
                    "id" => "1386867694761618",
                ],
                "rating" => 5,
            ],
        ];
    }
}
