<?php
session_start();
$id = intval($_GET['id_img']);
$check = false;
$dataRequst = (boolean) $id;

if($dataRequst){
    require 'config_mysql.php';
    $arData =[];
    $result = doQuerySelect($db);
    while($row = mysqli_fetch_assoc($result))
    {
        $arData[] = $row;
    }

    foreach($arData as $key => $photo)
    {
        if($photo['id_img'] == $_GET['id_img'])
        {
            $arResult = $photo;
            $check = true;      
        }
    }

    if(!$check)
    {
        $dataRequst = false;
        $requst_error = '404 ошибка, указанный адрес не существует';
    }
} else {
    $requst_error = '404 ошибка, указанный адрес не существует';
}

if(@$_POST['add_item'] === 'Y'){
    $arParams = ['id' => $_POST['id_item'], 'basket_id' => $_SESSION['userUnknownID']];
    doQueryInsert($arParams, $db);
    header("Location:".$_SERVER['REQUEST_URI']);
    $_POST['add_item'] = 'N';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Картинка</title>
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
            justify-content: flex-start;
            margin-top: 50px;
        }
        .picture {
            padding: 20px;
            border: solid 1px #000;
            margin: 10px;
        }
        .btn {
            padding: 20px 80px;
            margin: 10px;
            background: #0f9406;
            border: none;
        }
        .pic img{
            object-fit: cover;
            width: 400px;
            height: 400px;
        }
        .btn_basket {
            padding: 20px 30px;
            display: inline-block;
            background: #807777;
            text-decoration: none;
            color: #000;
            margin: 10px 0;
        }
        .btn_group {
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>
<body>
    <?php if($dataRequst):?>
    <div class="container">
        <div class="btn_group">
            <a class="btn_basket" href="index.php">Каталог</a>
            <a class="btn_basket" href="basket.php">Корзина</a>
        </div>
        <div class="gallery">
            <div class="pic">
                <a href="index.php">
                    <img class="picture" src="<?=$arResult['url']?>" alt="<?=$arResult['name']?>">
                </a>
            </div>
            <div>
                <p><?=$arResult['description']?></p>
            </div>
        </div>
        <form action="" method="POST">
            <input type="hidden" name="id_item" value="<?=$id?>">
            <input type="hidden" name="add_item" value="Y">
            <input class="btn" type="submit" value="Купить" name="doBuy">
        </form>
    </div>
    <?php else:?>
    <div class="container">
        <div class="gallery">
            <?=$requst_error?>
        </div>
    </div>
    <?php endif?>
</body>
</html>