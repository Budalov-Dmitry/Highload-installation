<?php

namespace App\Services;

use App\Contracts\Sort;
use Illuminate\Support\Facades\Log;

class SortService implements Sort
{
    public function  sort(array $array)
    {

        $start = memory_get_usage();
        Log::info('Начало сортировки '.$start);
        for($i=0; $i<count($array); $i++){
            $count = count($array);
            for($j=$i+1; $j<$count; $j++){
                if($array[$i]>$array[$j]){

                    $temp = $array[$j];
                    $array[$j] = $array[$i];
                    $array[$i] = $temp;
                }
            }
        }

        $result = implode( ',' , $array);

        $end = memory_get_usage();
        Log::info('Конец сортировки '. $end);

        return $result;
    }
}
