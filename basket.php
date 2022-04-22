<?php
session_start();
require 'config_mysql.php';
$arList = [];

if(@$_REQUEST['doDelete'])
{
    doQueryDelete($_POST['id_item'], $db);
}

$arData =[];
$result = doQuerySelectBasket($db);
while($row = mysqli_fetch_assoc($result))
{
    $arData[] = $row;
}


foreach($arData as $key => $item)
{
    if(@$_SESSION['userUnknownIDBasket'] == $item['basket_id'])
    {
        $arList[] = $item;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Корзина</title>
</head>
<style>
    body {
        font-family: sans-serif;
        font-size: 13px; 
    }
    .container {
        width: 1170px;
        margin: 0 auto;
    }
    .basket {

    }
    .basket__picture{
            border: 1px solid #000;
            margin: 1px;
    }
    .basket__picture img{
        display: block;
        object-fit: cover;
        width: 288px;
        height: 288px;
    }
    .btn {
        padding: 20px 80px;
        margin: 10px 0;
        background: #c40a0a;
        border: none;
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
<body>
    <div class="container">
    <a class="btn_basket" href="index.php">Каталог</a>
        <?php if($arList):?>
            <div class="basket">
                <?php foreach($arList as $item):?>
                    <div class="basket__list">
                        <div class="basket__item">
                            <div class="basket__picture">
                                <a href="full_pic.php?id_img=<?=$item['id_img']?>">
                                    <img src="<?=$item['url']?>" alt="<?=$item['name']?>">
                                </a>
                            </div>
                            <h5 class="basket__title"><?=$item['goods_name']?></h5>
                            <div class="basket__price"><?=$item['price']?><span> <?=$item['currencies']?></span></div>
                        </div>
                    </div>
                    <form action="" method="POST">
                        <input type="hidden" name="id_item" value="<?=$item['id_img']?>">
                        <input class="btn" type="submit" value="Удалить" name="doDelete">
                    </form>
                <?php endforeach?>    
                <div class="basket__order_info">

                </div>
                <a class="btn_basket" href="order.php?">Оформить заказ</a>
            </div>
        <?php else:?>
            <div class="basket__clear">
                <p>Корзина пуста</p>
            </div>
        <?php endif?>        
    </div>    
</body>
</html>