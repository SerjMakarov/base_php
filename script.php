<?php
$a = 20;
$b = 15;

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

function getSum($operandFirst = 0, $operandSecond = 0) 
{
    return $operandFirst + $operandSecond;
}

function getMin($operandFirst = 0, $operandSecond = 0) 
{
    return $operandFirst - $operandSecond;
}

function getMul($operandFirst = 0, $operandSecond = 0) 
{
    return $operandFirst * $operandSecond;
}

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

function power($val, $pow)
{
    if($pow == 0){
        return 1;
    }
    return $val * power($val, --$pow);
}

$pow = power(4, 4);
$sum = getSum(10, 10);
$min = getMin(10, 10);
$mul = getMul(10, 10);
$div = getDiv(30, 0);
$resOperation = mathOperation(50, 2, '+');

$arData = ["result" => $result, "res" => $res, "sum" => $sum, "min" => $min, "mul" => $mul, "div" => $div, "resOperation" => $resOperation, "pow" => $pow];

$menu = renderTemplate('menu', $arData);
$content = renderTemplate('content', $arData);

function renderTemplate($template, $arData)
{
    $result = $arData["result"];
    $res = $arData["res"];
    $sum = $arData["sum"];
    $min = $arData["min"];
    $mul = $arData["mul"];
    $div = $arData["div"];
    $resOperation = $arData["resOperation"];
    $pow = $arData["pow"];

    ob_start();
    include $template.'.php';
    $content = ob_get_contents();
    ob_end_clean();
    return $content;
}