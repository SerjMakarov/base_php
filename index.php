<?php

$num = 0;
$result = null;

while($num <= 100){
    $res = $num % 3;
    if($res == 0){
        $result .= ' '.$num;
    }

    $num++;
}

$res = getNumbers(0);

function getNumbers($number){
    $zeroString = 'ноль';
    $oddString = 'нечетное число';
    $evenString = 'четное число';
    $res = null;
    do {
        if($number == 0){
            $res .= $number . " - $zeroString </br>";
        } else {
            $res .= $number % 2 ? $number . " - $oddString </br>" : $number . " - $evenString </br>";
        }
        $number++;
    } while ($number <= 10);
    return $res;
}

$arCity = [
    'Московская область' => ['Москва', 'Зеленоград', 'Клин'],
    'Ленинградская область' => ['Санкт-Петербург', 'Всеволожск', 'Павловск', 'Кронштадт'],
    'Рязанская область' => ['Рязань', 'Касимов', 'Сасово', 'Михайлов'],
    'Костромская область' => ['Кострома', 'Сусанино', 'Буй', 'Чухлома']
];

$city = getCity($arCity);

function getCity($array){
    $res = null;
    $region = array_keys($array);
    for($i = 0; $i < count($array); $i++ ){
        $res .= $region[$i] . ': <br>' . implode($array[$region[$i]], ', '). '.'. '<br>';
    }
    return $res;
}

$arMenu = ['Главная', 'Контент', 'Новости', 'Клиентам'];

$menuList = getMenu($arMenu);

function getMenu($array){
    $res = null;
    for($i = 0; $i < count($array); $i++ ){
        $res .= '<ul>' . '<li>' . $array[$i] . '</li>' . '</ul>';
    }
    return $res;
}

$arData = ['result' => $result, 'res' => $res, 'city' => $city, 'menuList' => $menuList];

$menu = renderTemplate('menu', $arData);
$content = renderTemplate('content', $arData);

$arTemplate = ['menu' => $menu , 'content' => $content];

$template = renderTemplate('template', $arTemplate);

function renderTemplate($template = '', $arParams = [])
{
    extract($arParams);
    ob_start();
    include $template.'.php';
    return ob_get_clean();
}

echo $template;
