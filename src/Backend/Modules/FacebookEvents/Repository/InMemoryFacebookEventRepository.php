<?php

namespace Backend\Modules\FacebookEvents\Repository;

class InMemoryFacebookEventRepository implements EventRepository
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
        return json_decode('{
          "data": [
            {
              "cover": {
                "offset_x": 0,
                "offset_y": 50,
                "source": "https://scontent.xx.fbcdn.net/v/t1.0-9/p720x720/33203935_857522741110433_6498988205562396672_o.jpg?_nc_cat=0&oh=c68bac04ca93d0c51f747166cd8ffa51&oe=5B7763EC",
                "id": "857522734443767"
              },
              "description": "Gezellig samenzijn met collega\'s en vrienden na het werk. \"De summerclub trakteert.\" Er is fingerfood voorzien voor iedereen tussen 17.30h en 18.30h Daarna wordt er de ganse avond gezorgd voor \"Allround music\" door DJ M-aximm.",
              "end_time": "2018-08-10T01:00:00+0200",
              "name": "Het perfecte einde van een werkdag!",
              "place": {
                "name": "Bar à Côté - Summer Club",
                "location": {
                  "city": "Waregem",
                  "country": "Belgium",
                  "latitude": 50.884043629659,
                  "longitude": 3.4650278091431,
                  "street": "Krakeelhoek 51",
                  "zip": "8790"
                },
                "id": "674998012696241"
              },
              "start_time": "2018-05-24T16:00:00+0200",
              "event_times": [
                {
                  "id": "567582883613536",
                  "start_time": "2018-08-09T16:00:00+0200",
                  "end_time": "2018-08-10T01:00:00+0200"
                },
                {
                  "id": "567582890280202",
                  "start_time": "2018-08-02T16:00:00+0200",
                  "end_time": "2018-08-03T01:00:00+0200"
                },
                {
                  "id": "567582880280203",
                  "start_time": "2018-07-26T16:00:00+0200",
                  "end_time": "2018-07-27T01:00:00+0200"
                },
                {
                  "id": "567582893613535",
                  "start_time": "2018-07-19T16:00:00+0200",
                  "end_time": "2018-07-20T01:00:00+0200"
                },
                {
                  "id": "567582900280201",
                  "start_time": "2018-07-12T16:00:00+0200",
                  "end_time": "2018-07-13T01:00:00+0200"
                },
                {
                  "id": "567582903613534",
                  "start_time": "2018-07-05T16:00:00+0200",
                  "end_time": "2018-07-06T01:00:00+0200"
                },
                {
                  "id": "567582906946867",
                  "start_time": "2018-06-28T16:00:00+0200",
                  "end_time": "2018-06-29T01:00:00+0200"
                },
                {
                  "id": "567582910280200",
                  "start_time": "2018-06-21T16:00:00+0200",
                  "end_time": "2018-06-22T01:00:00+0200"
                },
                {
                  "id": "567582913613533",
                  "start_time": "2018-06-14T16:00:00+0200",
                  "end_time": "2018-06-15T01:00:00+0200"
                },
                {
                  "id": "567582916946866",
                  "start_time": "2018-06-07T16:00:00+0200",
                  "end_time": "2018-06-08T01:00:00+0200"
                },
                {
                  "id": "567582920280199",
                  "start_time": "2018-05-31T16:00:00+0200",
                  "end_time": "2018-06-01T01:00:00+0200"
                },
                {
                  "id": "567582886946869",
                  "start_time": "2018-05-24T16:00:00+0200",
                  "end_time": "2018-05-25T01:00:00+0200"
                }
              ],
              "id": "567582870280204"
            },
            {
              "cover": {
                "offset_x": 0,
                "offset_y": 27,
                "source": "https://scontent.xx.fbcdn.net/v/t1.0-9/p720x720/32256308_853238908205483_840174630495846400_o.jpg?_nc_cat=0&oh=f5497266e1151e871050c09fed0fb41b&oe=5B88C29F",
                "id": "853238904872150"
              },
              "description": "Family Funday staat voor ongedwongen amusement waar de kinderen centraal staan. Wij voorzien een tof springkasteel in onze kids corner, gratis ijsjes voor alle kinderen tussen 14.00h & 16.00h en deze week hebben we de ballonnenclown op bezoek die de gekste figuren maakt. Ook voor de \'grotere kindjes\' ;-) Ondertussen kunnen de volwassenen genieten van een lekker drankje. Kinderen moeten vergezeld zijn van een volwassene. #bac_summerclub #bac_familyfunday",
              "end_time": "2018-05-21T22:00:00+0200",
              "name": "Family Funday",
              "place": {
                "name": "Bar à Côté - Summer Club",
                "location": {
                  "city": "Waregem",
                  "country": "Belgium",
                  "latitude": 50.884043629659,
                  "longitude": 3.4650278091431,
                  "street": "Krakeelhoek 51",
                  "zip": "8790"
                },
                "id": "674998012696241"
              },
              "start_time": "2018-05-21T11:00:00+0200",
              "id": "528691524192095"
            },
            {
              "cover": {
                "offset_x": 0,
                "offset_y": 50,
                "source": "https://scontent.xx.fbcdn.net/v/t1.0-9/p720x720/33203935_857522741110433_6498988205562396672_o.jpg?_nc_cat=0&oh=c68bac04ca93d0c51f747166cd8ffa51&oe=5B7763EC",
                "id": "857522734443767"
              },
              "description": "Jullie weten wat dit betekent jongens!! Ambiance verzekerd op de bonkende beats van vroeger. D.j.\'s van dienst zijn Dj John B en D.j. Turbo. Full power @ your summerclub 2018. Tag, like & deel met je vrienden! Don\'t forget --> #bac_summerclub",
              "end_time": "2018-05-21T01:00:00+0200",
              "name": "Let\'s go back to the real \'Old skool\' house music!",
              "place": {
                "name": "Bar à Côté - Summer Club",
                "location": {
                  "city": "Waregem",
                  "country": "Belgium",
                  "latitude": 50.884043629659,
                  "longitude": 3.4650278091431,
                  "street": "Krakeelhoek 51",
                  "zip": "8790"
                },
                "id": "674998012696241"
              },
              "start_time": "2018-05-20T19:00:00+0200",
              "id": "1825901524133959"
            },
            {
              "cover": {
                "offset_x": 0,
                "offset_y": 50,
                "source": "https://scontent.xx.fbcdn.net/v/t1.0-9/p720x720/33203935_857522741110433_6498988205562396672_o.jpg?_nc_cat=0&oh=c68bac04ca93d0c51f747166cd8ffa51&oe=5B7763EC",
                "id": "857522734443767"
              },
              "description": "Grijp je kans om te feesten met je vrienden dankzij deze superpromo!! Tag your friends, like & share. Gebruik #bac_summerclub en je vrienden vinden al je posts en foto\'s makkelijk terug ;-) Beats by DJ M-aximm. \"When the music matters!\"",
              "end_time": "2018-05-20T01:00:00+0200",
              "name": "Eristoff bottle night!",
              "place": {
                "name": "Bar à Côté - Summer Club",
                "location": {
                  "city": "Waregem",
                  "country": "Belgium",
                  "latitude": 50.884043629659,
                  "longitude": 3.4650278091431,
                  "street": "Krakeelhoek 51",
                  "zip": "8790"
                },
                "id": "674998012696241"
              },
              "start_time": "2018-05-19T16:00:00+0200",
              "id": "1633498403433746"
            },
            {
              "cover": {
                "offset_x": 0,
                "offset_y": 27,
                "source": "https://scontent.xx.fbcdn.net/v/t1.0-9/p720x720/32256308_853238908205483_840174630495846400_o.jpg?_nc_cat=0&oh=f5497266e1151e871050c09fed0fb41b&oe=5B88C29F",
                "id": "853238904872150"
              },
              "description": "Weekend kick off @ Bar à Côté - Summer Club. Happy hour van 19.00h tot 20.00h. Double up on friday!! Tag,share & enjoy. Allround music by The Foxybrothers #bac_summerclub",
              "end_time": "2018-08-18T01:00:00+0200",
              "name": "Happy Friday",
              "place": {
                "name": "Bar à Côté - Summer Club",
                "location": {
                  "city": "Waregem",
                  "country": "Belgium",
                  "latitude": 50.884043629659,
                  "longitude": 3.4650278091431,
                  "street": "Krakeelhoek 51",
                  "zip": "8790"
                },
                "id": "674998012696241"
              },
              "start_time": "2018-05-18T16:00:00+0200",
              "event_times": [
                {
                  "id": "1123735557779282",
                  "start_time": "2018-08-17T16:00:00+0200",
                  "end_time": "2018-08-18T01:00:00+0200"
                },
                {
                  "id": "1123735524445952",
                  "start_time": "2018-08-10T16:00:00+0200",
                  "end_time": "2018-08-11T01:00:00+0200"
                },
                {
                  "id": "1123735514445953",
                  "start_time": "2018-08-03T16:00:00+0200",
                  "end_time": "2018-08-04T01:00:00+0200"
                },
                {
                  "id": "1123735527779285",
                  "start_time": "2018-07-27T16:00:00+0200",
                  "end_time": "2018-07-28T01:00:00+0200"
                },
                {
                  "id": "1123735517779286",
                  "start_time": "2018-07-20T16:00:00+0200",
                  "end_time": "2018-07-21T01:00:00+0200"
                },
                {
                  "id": "1123735521112619",
                  "start_time": "2018-07-13T16:00:00+0200",
                  "end_time": "2018-07-14T01:00:00+0200"
                },
                {
                  "id": "1123735531112618",
                  "start_time": "2018-07-06T16:00:00+0200",
                  "end_time": "2018-07-07T01:00:00+0200"
                },
                {
                  "id": "1123735537779284",
                  "start_time": "2018-06-29T16:00:00+0200",
                  "end_time": "2018-06-30T01:00:00+0200"
                },
                {
                  "id": "1123735534445951",
                  "start_time": "2018-06-22T16:00:00+0200",
                  "end_time": "2018-06-23T01:00:00+0200"
                },
                {
                  "id": "1123735541112617",
                  "start_time": "2018-06-15T16:00:00+0200",
                  "end_time": "2018-06-16T01:00:00+0200"
                },
                {
                  "id": "1123735544445950",
                  "start_time": "2018-06-08T16:00:00+0200",
                  "end_time": "2018-06-09T01:00:00+0200"
                },
                {
                  "id": "1123735551112616",
                  "start_time": "2018-06-01T16:00:00+0200",
                  "end_time": "2018-06-02T01:00:00+0200"
                },
                {
                  "id": "1123735554445949",
                  "start_time": "2018-05-25T16:00:00+0200",
                  "end_time": "2018-05-26T01:00:00+0200"
                },
                {
                  "id": "1123735561112615",
                  "start_time": "2018-05-18T16:00:00+0200",
                  "end_time": "2018-05-19T01:00:00+0200"
                }
              ],
              "id": "1123735487779289"
            },
            {
              "cover": {
                "offset_x": 0,
                "offset_y": 50,
                "source": "https://scontent.xx.fbcdn.net/v/t1.0-9/p720x720/33203935_857522741110433_6498988205562396672_o.jpg?_nc_cat=0&oh=c68bac04ca93d0c51f747166cd8ffa51&oe=5B7763EC",
                "id": "857522734443767"
              },
              "description": "Here we go!! Op donderdag 17 mei gaan we van start met onze Summer Club. Bar à côté zit een nieuw jasje en graag verwelkomen we jullie vanaf 18.00h. \'Exclusive Copperhead Gin bar\' aanwezig met een TOP promo!! Ook krijgen de eerste 100 bezoekers een gratis Sol\' Cerveza aangeboden door de aanwezige hostessen. De focus ligt op \'Allround music\' dus hebben we voor jullie The Foxybrothers, DJ Mario & Dj John B op het programma staan. Mis de \'GRAND OPENING NIGHT\' niet! Wees er bij, vertel het verder en blijf ons volgen want er staan veel leuke dingen te gebeuren deze zomer!! Your Summerclub 2018 xx",
              "end_time": "2018-05-18T01:00:00+0200",
              "name": "Grand opening Bar à Côté-Summerclub",
              "place": {
                "name": "Bar à Côté - Summer Club",
                "location": {
                  "city": "Waregem",
                  "country": "Belgium",
                  "latitude": 50.884043629659,
                  "longitude": 3.4650278091431,
                  "street": "Krakeelhoek 51",
                  "zip": "8790"
                },
                "id": "674998012696241"
              },
              "start_time": "2018-05-17T18:00:00+0200",
              "id": "2030372003888424"
            }
          ],
          "paging": {
            "cursors": {
              "before": "QVFIUlZAtck5idkVaakY0aG9sd1otVUlxZAm5QOGszcDl3dllKbFBRd1FlM2xQWTc5ZADRRUElHN19qQmdURU5LWV9LdmlvNFc3cjEzcVN0ZAS0wQkduaUlyUlln",
              "after": "QVFIUnBjUVNEM1R4dU9ITE9xQzNWSnpUdE1JbEltekFnbzg2SlFfaGttdUY5bDZA6QTlwb09nTXJibVhUTVZAhWkdmZADU5Wk1ZASHJPblMxQjNyTFpyZA3RmTnZA3"
            }
          }
        }', true)['data'];
    }
}
