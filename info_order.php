<?php
session_start();
require 'config_mysql.php';
$arList = [];

$arData =[];
$result = doQuerySelectOrder($db);
while($row = mysqli_fetch_assoc($result))
{
    $arData[] = $row;
}

$result = doQuerySelectBasketInfo($db);
while($row = mysqli_fetch_assoc($result))
{
    $arBasket[] = $row;
}

foreach($arBasket as $key => $val){
    $arData[] = $val;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Информация о заказах</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 13px; 
        }
        .container {
            width: 1170px;
            margin: 0 auto;
        }
        .form {
            display: flex;
            flex-direction: column;
        }
        .form__picture {
            display: flex;
            justify-content: space-around;
            margin-top: 10px;
        }
        .form__data {
            display: flex;
            justify-content: space-around;
            margin-top: 10px;
        }
        .form__submit {
            margin: 20px 0;
            align-self: center; 
            width: 10%;
        }
        .wrap {
            border: 1px solid #000;
            border-radius: 5px;
            margin: 5px 0;
            padding: 5px;
        }
        .btn_basket {
            padding: 20px 30px;
            display: inline-block;
            background: #807777;
            text-decoration: none;
            color: #000;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Заказы покупателей</h1>
        <a class="btn_basket" href="auth.php">В личный кабинет</a>
        <?php foreach($arData as $key => $order):?>
            <div class="wrap">
                <h4>Адрес</h4>
                <div>Город: <span><?=$order['order_city']?></span></div>
                <div>Улица: <span><?=$order['order_street']?></span></div>
                <div>Дом: <span><?=$order['order_home']?></span></div>
                <h4>Контактные данные</h4>
                <div>Фамилия: <span><?=$order['order_surname']?></span></div>
                <div>Имя: <span><?=$order['order_name']?></span></div>
                <div>Телефон: <span><?=$order['order_phone']?></span></div>
                <h4>Товары корзины</h4>
                <div>Название: <span><?=$order['goods_name']?></span></div>
                <div>Цена: <span><?=$order['price']?></span><span><?=$order['currencies']?></span></div>
            </div>
        <?php endforeach;?>    
    </div>    
</body>
</html>