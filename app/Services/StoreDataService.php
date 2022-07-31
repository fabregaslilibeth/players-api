<?php

namespace App\Services;

use App\Models\Player;

class StoreDataService
{
    public function storeNewData($file)
    {
        $csv = file_get_contents($file);

        //convert the contents into an array
        $array = array_map('str_getcsv', explode(PHP_EOL, $csv));

        foreach ($array as $key => $item) {

            //exclude the header
            if ($key > 0) {

                //check if the player already exists
                Player::query()->updateOrCreate(
                    [
                        'first_name' => $item[0],
                        'second_name' => $item[1],
                    ],
                    [
                        'first_name' => $item[0],
                        'second_name' => $item[1],
                        'form' => $item[2],
                        'total_points' => $item[3],
                        'influence' => $item[4],
                        'creativity' => $item[5],
                        'threat' => $item[6],
                        'ict_index' => $item[7],
                    ]
                );
            }
        }
    }
}
