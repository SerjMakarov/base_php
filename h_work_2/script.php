<?php

$a = -20;
$b = -15;

if($a >= 0 && $b >= 0){
    $result = "Значение положительные \$a = $a, \$b = $b";
}else if($a >= 0 && $b <= 0 || $a <= 0 && $b >= 0){
    $result = "Значение имеют разные знаки \$a = $a, \$b = $b";
}else{
    $result = "Значение отрицательные \$a = $a, \$b = $b";
}

// echo $result;

/**
 * Тот же код поместил в фунцию
 */

// echo getNum(30, -15); 

// function getNum($a = 0, $b =0 ){
//     if($a >= 0 && $b >= 0){
//         $result = "Значение положительные \$a = $a, \$b = $b";
//     }else if($a >= 0 && $b <= 0 || $a <= 0 && $b >= 0){
//         $result = "Значение имеют разные знаки \$a = $a, \$b = $b";
//     }else{
//         $result = "Значение отрицательные \$a = $a, \$b = $b";
//     }
//     return $result;
// }

$a = [];

for($i = 0; $i <= 15; $i++){
    $a[] = $i;
}

$elemCount = count($a);
$i = 0;

switch($elemCount){
    case !$a[$i]:
        $res = $a[$i];
        $i++;
    case !$a[$i]:
        $res .= $a[$i];
        $i++;
    case !$a[$i]:
        $res .= $a[$i];
        $i++;
    case !$a[$i]:
        $res .= $a[$i];
        $i++;
    case !$a[$i]:
        $res .= $a[$i];
        $i++;    
    case !$a[$i]:
        $res .= $a[$i];
        $i++;
    case !$a[$i]:
        $res .= $a[$i];
        $i++;
    case !$a[$i]:
        $res .= $a[$i];
        $i++;
    case !$a[$i]:
        $res .= $a[$i];
        $i++;
    case !$a[$i]:
        $res .= $a[$i];
        $i++;
    case !$a[$i]:
        $res .= $a[$i];
        $i++;
    case !$a[$i]:
        $res .= $a[$i];
        $i++;
    case !$a[$i]:
        $res .= $a[$i];
        $i++;
    case !$a[$i]:
        $res .= $a[$i];
        $i++;
    case !$a[$i]:
        $res .= $a[$i];
        $i++;
    case !$a[$i]:
        $res .= $a[$i];
}


$sum = getSum(10, 10);

function getSum($operandFirst = 0, $operandSecond = 0) 
{
    return $operandFirst + $operandSecond;
}

$min = getMin(10, 10);

function getMin($operandFirst = 0, $operandSecond = 0) 
{
    return $operandFirst - $operandSecond;
}

$mul = getMul(10, 10);

function getMul($operandFirst = 0, $operandSecond = 0) 
{
    return $operandFirst * $operandSecond;
}

$div = getDiv(0, 0);

function getDiv($operandFirst = 0, $operandSecond = 0) 
{
    if($operandFirst === 0 || $operandSecond === 0){
        return $operandFirst / $operandSecond;
    }

    return $operandFirst / $operandSecond;
}