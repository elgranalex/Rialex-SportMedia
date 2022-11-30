<?php

    $array1 = [3,5,1,6,8,4];
    $array2 = [1,6,3,7,2,6];

    if (count($array1) == count($array2)) {
        for ($i = 0;$i < count($array1);$i++){
            $array3[$i] = $array1[$i] + $array2[$i];
        }
    }

    print_r($array3);
    
?>