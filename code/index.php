<?php

include __DIR__ . '/vendor/autoload.php';

//use API\Tickets;
//
//phpinfo();
//
//$test = new Tickets();
//$result = $test->test();

$array = [1,2,2,3,4,4,5,6,7,8,9];

//$sum = array_sum($array) / count($array);
//echo $sum;

//for ($i = 0; $i < count($array); $i++) {
//    $isQniq = $array[$i];
//    for ($j = $i+1; $j < count($array); $j++) {
//        if ($array[$j] == $isQniq) {
//            unset($array[$j]);
//            $array = array_values($array);
//        }
//    }
//}
//echo $array;

$array_2=[2,2,2,2,5,1,5,220,1221];
function joinArray(array $array_1, array $array_2)
{
    $new_array=array_unique(array_merge($array_1, $array_2));
    return $new_array;
}

 $new_array = joinArray($array, $array_2);

$test = '';



