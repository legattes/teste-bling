<?php

arrayOrder2([1,4,6,7,3,2,0,9]);

function arrayOrder(Array $array){
    $pares = [];
    $impares = [];
    $ordenado = [];

    foreach($array as $key => $arr){
        if($arr % 2 == 0){
            $pares[] = $arr;
        } else {
            $impares[] = $arr;
        }
    }
}

function arrayOrder2(Array $array){
    $order = [];

    echo "<pre>";

    foreach($array as $arr){
        if(empty($order)){            
            $order[0] = $arr;
            continue;
        }

        if($arr % 2 == 0){
            echo 'a'."\n";
            for($i = 0; $i < count($order); $i++){
                echo "i = " . $i;
                echo "arr = " . $arr;
                echo "\n\n";
                if($arr < $order[$i]){
                    $order[$i +1] = $order[$i];
                    $order[$i] = $arr;
                    break;
                }                
                $order[$i +1] = $arr;
            }         
        } else {            
            echo 'b'."\n";
            for($i = (count($order)); $i = 0; $i--){
                echo "i = " . $i;
                echo "arr = " . $arr;
                echo "\n\n";
                if($arr > $order[$i]){    
                    $order[$i -1] = $order[$i];   
                    $order[$i] = $arr;
                    break;
                }
                $order[$i -1] = $arr;                
            }  
        }
    }

    return print_r($order);
}



?>