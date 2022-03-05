<?php

$num = 0;

while($num <= 100){
    $res = $num % 2;
    if($res == 0){
        $result .= ' '.$num;
    }

    $num++;
}


function getNumbers($number){
    $zeroString = 'ноль';
    $oddString = 'нечетное число';
    $evenString = 'четное число';
    do {
        $res = 1;
        $number++;
    } while ($number);
}



$arData = ["result" => $result, "res" => $res, "sum" => $sum, "min" => $min, "mul" => $mul, "div" => $div, "resOperation" => $resOperation, "pow" => $pow];
$menu = renderTemplate('menu', $arData);
$content = renderTemplate('content', $arData);
$arTemplate = ['menu' => $menu , 'content' => $content];


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
    $content = $arData['content'];
    $menu = $arData['menu'];

    ob_start();
    include $template.'.php';
    return ob_get_clean();
}

echo renderTemplate('template', $arTemplate);