<?php
renderTemplate();

$a = -20;
$b = -15;

if($a >= 0 && $b >= 0){
    $result = "Значение положительные \$a = $a, \$b = $b";
}else if($a >= 0 && $b <= 0 || $a <= 0 && $b >= 0){
    $result = "Значение имеют разные знаки \$a = $a, \$b = $b";
}else{
    $result = "Значение отрицательные \$a = $a, \$b = $b";
}

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

$div = getDiv(30, 0);

function getDiv($operandFirst = 0, $operandSecond = 0) 
{
    if($operandSecond === 0){
        ini_set('display_errors', 'Off');
        $resDiv = $operandFirst / $operandSecond;
        $errorMessage = error_get_last();
        return $errorMessage['message'];
    }

    return $operandFirst / $operandSecond;
}


$resOperation = mathOperation(50, 2, '+');

function mathOperation($arg1 = 0, $arg2 = 0, $operation = null)
{

    switch($operation){
        case '+':
            $res = $arg1 + $arg2;
            return $res;
            break;
        case '-':
            $res = $arg1 - $arg2;
            return $res;
            break;
        case '*':
            $res = $arg1 * $arg2;
            return $res;
            break;
        case '/':
            if($arg2 === 0){
                ini_set('display_errors', 'Off');
                $res = $arg1 / $arg2;
                $errorMessage = error_get_last();
                return $errorMessage['message'];
            }
            $res = $arg1 / $arg2;
            return $res;
            break;
        default:
            $res = 'Отсутсвует сигнатура операции';
            return $res;
            break;
    }
}

function renderTemplate()
{
    $menu = include 'menu.php';
    $content = include 'content.php';
}