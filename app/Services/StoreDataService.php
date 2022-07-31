<?php

namespace App\Services;

use App\Models\Player;

class StoreDataService
{
    public function storeNewData($file)
    {
        $fileType = $file->getMimeType();

        if ($fileType === "text/plain") {
            $csv = file_get_contents($file);

            $array = array_map('str_getcsv', explode(PHP_EOL, $csv));

            foreach ($array as $key => $item) {
                if ($key > 0) {
                    Player::create([
                        'first_name' => $item[0],
                        'second_name' => $item[1],
                        'form' => $item[2],
                        'total_points' => $item[3],
                        'influence' => $item[4],
                        'creativity' => $item[5],
                        'threat' => $item[6],
                        'ict_index' => $item[7],
                    ]);
                }
            }


//            $json = json_encode($array);
//            return collect($json);

            //return $collection->implode('product', ', ');

        }

    }
}
