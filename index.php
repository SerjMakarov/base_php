<?php
session_start();

if(empty($_SESSION['userUnknownID']) && !isset($_SESSION['userUnknownID'])){
    $_SESSION['userUnknownID']  = getUserUnknownID();
    $_SESSION['userUnknownIDBasket'] = $_SESSION['userUnknownID'];
}

if(empty($_SESSION['isAuth']) && !isset($_SESSION['isAuth']))
{
    $_SESSION['isAuth'] = false;
}

if(@$_REQUEST['nextPurchase'])
{
    unset($_SESSION['purchase']);
    unset($_SESSION['userUnknownIDBasket']);
    unset($_SESSION['userUnknownID']);
}

if(@$_GET['exit'] == 1)
{
    $_SESSION['isAuth'] = false;
    session_unset();
}

require 'config_mysql.php';

$notPush = false;
$errorMsg = '';

$arData =[];
$result = doQuerySelect($db);

while($row = mysqli_fetch_assoc($result))
{
    $arData[] = $row;
}

$arPhotos = false;
$message_error_upload = null;

if(@$_REQUEST['doPush'])
{
    $uploadDir = './upload/';
    $existsDir = file_exists($uploadDir);

    if(!$existsDir)
    {
        mkdir($uploadDir, 0777);
    }

    if($_FILES['files']['tmp_name'] === '')
    {
        $notPush = true;
        $errorMsg = 'Выберите файл';
    }

    $tmpFile = $_FILES['files']['tmp_name'];
    $id = filemtime($tmpFile);
    $nameFile = $_FILES['files']['name'];
    $checkFiles = is_uploaded_file($tmpFile);

    if($checkFiles)
    {
        $mime_type = mime_content_type($tmpFile);
        if($mime_type === 'image/jpeg')
        {
            move_uploaded_file($tmpFile, $uploadDir.$id.'_'.$nameFile);
            $arParams = getFileInfo($uploadDir);
            doQueryInsert($arParams, $db);
            header("Location: /");
            exit();
        } 
        else
        {
            $message_error_upload = 'Тип загружаемого файла неправельный, допустимы только jpeg файлы';
        }
    }
}

function getFileInfo($path)
{
    $arFiles = glob("$path*");
    foreach($arFiles as $value)
    {
        $arParams = array
        (
            'size' => filesize($value),
            'name' => basename($value),
            'path' => $value,
            'product_name' => $_POST['product_name'],
            'product_desc' => $_POST['product_desc'],
            'product_price' => (int) $_POST['product_price'],
            'product_currencies' => $_POST['product_currencies'],
            'id_img' => $_POST['product_currencies'],  
         );
    }
    return $arParams;
}

function getUserUnknownID(){
    $userUnknownID = uniqid('id', true);
    return $userUnknownID;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Каталог</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 13px; 
        }
        .container {
            width: 1170px;
            margin: 0 auto;
        }
        .gallery {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin: 50px 0;
        }
        .form {
            display: flex;
            flex-direction: column;
        }
        .form__picture {
            display: flex;
            justify-content: center;
            margin-top: 10px;
        }
        .form__data {
            display: flex;
            justify-content: center;
            margin-top: 10px;
        }
        .form__submit {
            margin: 20px 0;
            align-self: center; 
            width: 10%;
        }
        .picture {
            padding: 20px;
            border: solid 1px #000;
            margin: 10px;
        }

        .request {
            text-align: center;
            margin: 20px 0 20px 0;
            color: red;
        }
        .catalog {
            display: flex;
            flex-wrap: wrap;
        }
        .catalog__elem{
            flex-basis: 10%;
        }
        .catalog__picture{
            border: 1px solid #000;
            margin: 1px;
        }
        .catalog__picture img{
            display: block;
            object-fit: cover;
            width: 288px;
            height: 288px;
        }
        .catalog__title{
            font-size: 18px;
            margin: 5px 0;
        }
        .catalog__desc {
            font-size: 14px;
        }
        .btn_basket {
            background: #807777;
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
        <a class="btn_basket" href="basket.php">Корзина</a>
        <?php if(@!$_SESSION['isAuth']):?>
            <a class="btn_basket" href="auth.php">Авторизоваться</a>
        <?php else:?>
            <a class="btn_basket" href="auth.php">В личный кабинет</a>
            <a class="btn_basket" href="<?=$_SERVER['SCRIPT_NAME'].'?exit='.$_SESSION['isAuth']?>">Выйти</a>
        <?php endif;?>
        <?php if($arData):?>
            <div class="catalog">
                <?php foreach($arData as $key => $photo):?>
                    <div class="catalog__elem">
                        <div class="catalog__picture">
                            <a href="full_pic.php?id_img=<?=$photo['id_img']?>">
                                <img src="<?=$photo['url']?>" alt="<?=$photo['name']?>">
                            </a>
                        </div>
                        <h5 class="catalog__title"><?=$photo['goods_name']?></h5>
                        <div class="catalog__price"><?=$photo['price']?><span> <?=$photo['currencies']?></span></div>
                    </div>
                <?php endforeach;?>
            </div>
        <?php else:?>
            <div class="gallery">
                <p>Загрузите фото и описание товара</p>
            </div>
        <?php endif;?>
        <?php if(@$_SESSION['isAuth']):?>    
        <form class="form" action="<?=$_SERVER['SCRIPT_NAME']?>" method="POST" enctype="multipart/form-data">
            <fieldset class="form__data">
                <legend>Информация о товаре</legend>
                <label>Название товара<input type="text" name="product_name" required></label>
                <label>Стоимость товара<input type="text" name="product_price" required></label>
                <label>Вид валюты<input type="text" name="product_currencies" required></label>
                <label>Описание товара<textarea rows="20" cols="40" name="product_desc" required></textarea></label>
            </fieldset>
            <fieldset class="form__picture">
                <input type="file" name="files">
                <input type="submit" value="Загрузить" name="doPush">
            </fieldset>
        </form>
        <?php endif;?>
        <div class="request"><?= $notPush ? $errorMsg : $message_error_upload?></div>
    </div>
</body>
</html>
