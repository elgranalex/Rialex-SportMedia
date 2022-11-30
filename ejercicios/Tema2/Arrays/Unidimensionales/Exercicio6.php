<?php

    function sumarVector($array1, $array2){
        if (count($array1) == count($array2)) {
            for ($i = 0;$i < count($array1);$i++){
                $array3[$i] = $array1[$i] + $array2[$i];
            }
            return $array3;
        }
    }

    $x = [3,5,1,6,8,4];
    $y = [1,6,3,7,2,6];

    print_r(sumarVector($x,$y));
    
?>