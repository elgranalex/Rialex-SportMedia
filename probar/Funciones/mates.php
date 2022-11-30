<?php

function suma($sum1,$sum2) 
{
    $total = $sum1 + $sum2;
    echo "<p>Total de $sum1 + $sum2 es igual a $total</p>\n";
}

function resta($sum1,$sum2) 
{
    $total = $sum1 - $sum2;
    echo "<p>Total de $sum1 - $sum2 es igual a $total</p>\n";
}

function multi($sum1,$sum2) 
{
    $total = $sum1 * $sum2;
    echo "<p>Total de $sum1 * $sum2 es igual a $total</p>\n";
}

function div($sum1,$sum2) 
{
    if ($sum2 == 0) {
        echo "<p>No se puede dividir, el divisor es 0</p>";
    }else{
        $total = $sum1 / $sum2;
        echo "<p>Total de $sum1 / $sum2 es igual a $total</p>\n";
    }
}




function todo($op1,$op2,$operador = "+") 
#La + es la que está por defecto
{

    switch($operador) {
        case '+':
            $total = $op1 + $op2;
            echo "<p>Total de $op1 $operador $op2 es igual a $total</p>\n";
            break;
        
        case '-':
            $total = $op1 + $op2;
            echo "<p>Total de $op1 $operador $op2 es igual a $total</p>\n";
            break;

        case '*':
            $total = $op1 * $op2;
            echo "<p>Total de $op1 $operador $op2 es igual a $total</p>\n";
            break;
        
        case '/':
            if (($op2 == 0) && ($operador = '/')) {
                echo "<p>No se puede dividir, el divisor es 0</p>";
            }else{ 
                $total = $op1 / $op2;
                echo "<p>Total de $op1 $operador $op2 es igual a $total</p>\n";
                break;
            }
    }
        
}
?>