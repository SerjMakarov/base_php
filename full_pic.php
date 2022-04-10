<?php
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Картинка</title>
    <style>
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
        }
        .pic img{
            object-fit: cover;
            width: 400px;
            height: 400px;
        }
    </style>
</head>
<body>
    <?php if($dataRequst):?>
    <div class="container">
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
        <form action="">
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