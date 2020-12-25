<?php

class renderarray
{
    public function assocarray()
    {
        $array = [
            "student" => [
                "name" => [
                    "first name" => "John",
                    "last name" => "Peter",
                ],
                "courses" => [
                    "name2" => "BE",
                    "subjects" => [
                        "physics" => [
                            "practicals" => [
                                "week1" => [
                                    "day1" => "mon",
                                    "day2" => "tue",
                                ],
                            ],
                            "duration" => "2hours",
                        ],
                    ],
                ],
            ],
        ];
        echo "<pre>";
        print_r($array);
        foreach ($array as $key => $val) {

            // print_r($val['courses']['subjects']);

            foreach ($val['courses']['subjects'] as $key5 => $val5) {
                $first = $val['name']['first name'] . "<br>";
                $last = $val['name']['last name'] . "<br>";
                $cname = $val['courses']['name2'] . "<br>";
                foreach ($val5['practicals']['week1'] as $val7) {
                    $day1 = $val7['day1'] . "<br>";
                    $duration = $val5['duration'] . "<br>";

                }

                echo "<pre>";

                echo "student=>name=>first name=>" . $first;
                echo "student=>name=>first name=>" . $last;
                echo "student=>name=>first name=>" . $cname;
                echo "student=>name=>first name=>" . $day1;
                echo "student=>name=>first name=>" . $duration;

            }
        }

    }

}
$obj = new renderarray();
$obj->assocarray();
