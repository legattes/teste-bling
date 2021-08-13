<?php

//arrayOrder2([1,4,6,7,3,2,0,9]);
echo "<pre>";
//print_r(arrayRotation([1,2,3,4,5,6], 5));

echo daysBetweenDates('13/08/2021', '03/01/1993');
echo "\n\n\n";
echo daysBetweenDates('03/01/1993', '13/08/2021');
//print_r(arrayEvenOrderSorter([1,-2,-4,-3,-7,5,8,9,6,4]));

function arrayEvenOrderSorter(Array $array){
    $pares = [];
    $impares = [];

    foreach($array as $arr){
        if($arr % 2 == 0){
            array_push($pares, $arr);
        } else {
            array_push($impares, $arr);
        }
    }


    for ($i = 0; $i < count($pares); $i++) {
        for ($k = $i + 1; $k < count($pares); $k++) {
            if ($pares[$i] > $pares[$k]) {
                $temp = $pares[$i];
                $pares[$i] = $pares[$k];
                $pares[$k] = $temp;
            }
        }
    }

    for ($i = 0; $i < count($impares); $i++) {
        for ($k = $i + 1; $k < count($impares); $k++) {
            if ($impares[$i] < $impares[$k]) {
                $temp = $impares[$i];
                $impares[$i] = $impares[$k];
                $impares[$k] = $temp;
            }
        }
    }

    return array_merge($pares, $impares);    
}

//[1,2,3,4,5,6] == [3,4,5,6,1,2]
function arrayRotation(Array $array, int $rotations){
    for($i = 1; $i <= $rotations; $i++){
        array_push($array, array_shift($array));
    }

    return $array;
}

function daysBetweenDates(string $date1, string $date2)
{
    $d1 = explode("/", $date1);    
    $d2 = explode("/", $date2);

    if($d1[2] > $d2[2]){
        $temp = $d1;
        $d1 = $d2;
        $d2 = $temp;
    } else if($d1[2] == $d2[2]){
        if($d1[1] > $d2[1]){
            $temp = $d1;
            $d1 = $d2;
            $d2 = $temp;
        } else if ($d1[1] == $d2[1]){
            if($d1[0] > $d2[0]){
                $temp = $d1;
                $d1 = $d2;
                $d2 = $temp;
            }
        }
    }

    $d3[0] = ($d2[0] >= $d1[0]) ? ($d2[0] - $d1[0]) : ($d1[0] - $d2[0]);
    
    if($d2[1] < $d1[1]){
        $d2[2]--;
        $d2[1] += 12;
    }

    $d3[1] = $d2[1] - $d1[1];

    $d3[2] = $d2[2] - $d1[2];

    return $d3[2] . " anos, " . $d3[1] . " meses, " . $d3[0] . " dias de diferença";
}


?>