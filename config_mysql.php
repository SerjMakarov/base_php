<?php
$db = @mysqli_connect("localhost", "test", "JF*OfD:%8CR;qY)Q", "gallery");

if($db == false)
{
    die('Ошибка подключения к БД '. mysqli_connect_error());
}

function doQueryInsert($arParams, $db)
{
    @[
        'size' => $size, 
        'name' => $name, 
        'path' => $path, 
        'product_name' => $product_name, 
        'product_desc' => $product_desc, 
        'product_price' => $product_price, 
        'product_currencies' => $product_currencies,
        'id_img' => $id_img,
        'id' => $id,
        'basket_id' => $basket_id,
        'order_city' => $order_city,
        'order_street' => $order_street,
        'order_home' => $order_home,
        'order_surname' => $order_surname,
        'order_name' => $order_name,
        'order_phone' => $order_phone,
    ] = $arParams;
    
    if(!empty($size) && !empty($name) && !empty($path)){
        $sql = "INSERT INTO `small_img`(`id_img` ,`url`, `size`, `name`) VALUES (null , '$path', $size, '$name')";
        $result = mysqli_query($db, $sql);
    }

    $sql = "SELECT `id_img` FROM `small_img`";
    $result = mysqli_query($db, $sql);

    while($row = mysqli_fetch_assoc($result))
    {
        $arId = $row;
    }

    foreach($arId as $id_img){
        if(!empty($product_name) && !empty($product_desc) && !empty($product_price) && !empty($product_currencies) && !empty($id_img)){
            $sql = "INSERT INTO `goods`(`id` ,`goods_name`, `description`, `price`, `currencies`, `id_img`) VALUES (null , '$product_name', '$product_desc', $product_price, '$product_currencies', $id_img)";
            $result = mysqli_query($db, $sql);
        }
    }

    if(!empty($id)){
        $sql = "INSERT INTO `basket`(`id_item`, `basket_id`, `id` ) VALUES (null , '$basket_id', $id)";
        $result = mysqli_query($db, $sql);
    }

    if(!empty($order_city) && !empty($order_street) && !empty($order_home) && !empty($order_surname) && !empty($order_name) && !empty($order_phone) && !empty($basket_id)){
        $sql = "INSERT INTO `order`(`order_id`, `order_city`, `order_street`, `order_home`, `order_surname`, `order_name`, `order_phone`, `orderid` ) VALUES (null , '$order_city', '$order_street', '$order_home', '$order_surname', '$order_name', '$order_phone', '$basket_id')";
        $result = mysqli_query($db, $sql);
        return $result;
    }
}

function doQuerySelect($db)
{
    $sql = "SELECT * FROM small_img INNER JOIN goods ON goods.id_img = small_img.id_img";
    $result = mysqli_query($db, $sql);
    return $result; 
}

function doQuerySelectBasket($db)
{
    $sql = "SELECT * FROM basket INNER JOIN goods ON goods.id_img = basket.id JOIN small_img ON basket.id = small_img.id_img"; 
    $result = mysqli_query($db, $sql);
    return $result; 
}

function doQuerySelectBasketInfo($db)
{
    $sql = "SELECT `goods_name`, `price`, `currencies` FROM basket INNER JOIN goods ON goods.id_img = basket.id JOIN small_img ON basket.id = small_img.id_img"; 
    $result = mysqli_query($db, $sql);
    return $result; 
}


function doQuerySelectAuth($db)
{
    $sql = "SELECT `login`, `pass`, `user_auth_id` FROM user"; 
    $result = mysqli_query($db, $sql);
    return $result; 
}

function doQuerySelectOrder($db)
{
    $sql = "SELECT `order_city`, `order_street`, `order_home`, `order_surname`, `order_name`, `order_phone` FROM `order`"; 
    $result = mysqli_query($db, $sql);
    return $result; 
}

function doQueryDelete($id, $db)
{
    $sql = "DELETE FROM `basket` WHERE `id` = $id";
    $result = mysqli_query($db, $sql);
}