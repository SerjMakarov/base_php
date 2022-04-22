<?php
session_start();
require 'config_mysql.php';

if(@$_REQUEST['doPurchase']){
    $arParams = [
        'order_city' => $_POST['order_city'], 
        'order_street' => $_POST['order_street'],
        'order_home' => $_POST['order_home'],
        'order_surname' => $_POST['order_surname'],
        'order_name' => $_POST['order_name'],
        'order_phone' => $_POST['order_phone'],
        'basket_id' => $_SESSION['userUnknownIDBasket'],
    ];
    $_SESSION['purchase'] = doQueryInsert($arParams, $db);
    header("Location:".$_SERVER['REQUEST_URI']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Оформление заказа</title>
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
        .btn {
            padding: 20px 80px;
            margin: 10px 0;
            background: #c40a0a;
            border: none;
        }

    </style>
</head>
<body>
    <div class="container">
        <?php if(!isset($_SESSION['purchase'])):?>
        <h1>Оформление заказа</h1>
        <form class="form" action="<?=$_SERVER['SCRIPT_NAME']?>" method="POST" enctype="multipart/form-data">
            <fieldset class="form__data">
                <legend>Укажите адрес</legend>
                <label>Город<input type="text" name="order_city" required></label>
                <label>Улица<input type="text" name="order_street" required></label>
                <label>Дом<input type="text" name="order_home" required></label>
            </fieldset>
            <fieldset class="form__data">
                <legend>Укажите свои данные</legend>
                <label>Фамилия<input type="text" name="order_surname" required></label>
                <label>Имя<input type="text" name="order_name" required></label>
                <label>Телефон<input type="text" name="order_phone" required></label>
            </fieldset>
            <input class="btn" type="submit" value="Купить" name="doPurchase">
        </form>
        <?php else:?>
            <h1>Ваш заказ оформлен, спасибо за покупку!</h1>
            <form class="form" action="index.php" method="POST" enctype="multipart/form-data">
                <input class="btn" type="submit" value="Продолжить покупки" name="nextPurchase">
            </form>        
        <?php endif;?>    
    </div>    
</body>
</html>