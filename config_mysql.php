<?php
$db = @mysqli_connect("localhost", "test", "JF*OfD:%8CR;qY)Q", "gallery");

if($db == false)
{
    die('Ошибка подключения к БД '. mysqli_connect_error());
}

function doQueryInsert($arParams, $db)
{
    // ['size' => $size, 'name' => $name, 'path' => $path] = $arParams;
    // $sql = "INSERT INTO `small_img`(`id` ,`url`, `size`, `name`) VALUES (null , '$path', $size, '$name')";
    // $result = mysqli_query($db, $sql);

    [
        'size' => $size, 
        'name' => $name, 
        'path' => $path, 
        'product_name' => $product_name, 
        'product_desc' => $product_desc, 
        'product_price' => $product_price, 
        'product_currencies' => $product_currencies,
        'id_img' => $id_img
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
}

function doQuerySelect($db)
{
    $sql = "SELECT * FROM small_img INNER JOIN goods ON goods.id_img = small_img.id_img";
    $result = mysqli_query($db, $sql);
    return $result; 
}

function doQueryDelete($id, $db)
{
    $sql = "DELETE FROM `small_img` WHERE `id` = $id";
    $result = mysqli_query($db, $sql);
}