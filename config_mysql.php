<?php
$db = @mysqli_connect("localhost", "test", "JF*OfD:%8CR;qY)Q", "gallery");

if($db == false)
{
    die('Ошибка подключения к БД '. mysqli_connect_error());
}

function doQueryInsert($arParams, $db)
{
    ['size' => $size, 'name' => $name, 'path' => $path] = $arParams;
    $sql = "INSERT INTO `small_img`(`id` ,`url`, `size`, `name`) VALUES (null , '$path', $size, '$name')";
    $result = mysqli_query($db, $sql);
}

function doQuerySelect($db)
{
    $sql = "SELECT * FROM `small_img`";
    $result = mysqli_query($db, $sql);
    return $result; 
}

function doQueryDelete($id, $db)
{
    $sql = "DELETE FROM `small_img` WHERE `id` = $id";
    $result = mysqli_query($db, $sql);
}
