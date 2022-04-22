<?php
session_start();
if(!empty($_POST['login']) && !empty($_POST['pass'])){
    require 'config_mysql.php';
    $result = doQuerySelectAuth($db);
    while($row = mysqli_fetch_assoc($result))
    {
        $arData[] = $row;
    }

    foreach($arData as $key => $user)
    {
        $login = $user['login'];
        $pass = $user['pass'];
        $user_auth_id = $user['user_auth_id'];
    }

    if($login == $_POST['login'] && $pass == $_POST['pass'])
    {
        unset($_SESSION['userUnknownIDBasket']);
        unset($_SESSION['userUnknownID']);
        $_SESSION['isAuth'] = true;
        $_SESSION['userID'] = $user_auth_id;
    } 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
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
        <?php if(@!$_SESSION['isAuth']):?>
        <h1>Вход в личный кабинет</h1>
        <a class="btn_basket" href="index.php">Каталог</a>
        <form class="form" action="<?=$_SERVER['SCRIPT_NAME']?>" method="POST" enctype="multipart/form-data">
            <fieldset class="form__data">
                <legend>Авторизация</legend>
                <label>Логин<input type="text" name="login" required></label>
                <label>Пароль<input type="password" name="pass" required></label>
                <input type="submit" value="Войти" name="doAuth">
            </fieldset>
        </form>
        <?php else:?>
        <h1>Вы авторизованы</h1>
        <a class="btn_basket" href="info_order.php">Просмотреть заказы</a>
        <a class="btn_basket" href="index.php">Каталог</a>
        <a class="btn_basket" href="<?='index.php'.'?exit='.$_SESSION['isAuth']?>">Выйти</a>
        <?php endif;?>    
    </div>    
</body>
</html>