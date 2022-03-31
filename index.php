<?php
    require 'entrypoint.php';
    
    $notPush = false;
    $errorMsg = '';

    if(@$_REQUEST['doDelete'])
    {
        doQueryDelete($_POST['id'], $db);
        header("Location: http://cms.loc/");
        exit();
    }

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
                header("Location: http://cms.loc/");
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
        $arFiles = [];
        $arFiles = glob("$path*");
        foreach($arFiles as $value)
        {
            $arParams = array
            (
                'size' => filesize($value),
                'name' => basename($value),
                'path' => $value, 
            );
        }
        return $arParams;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Галерея</title>
    <style>
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
            justify-content: center;
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
    </style>
</head>
<body>
    <div class="container">
        <?if($arData){?>
            <div class="gallery">
                <?foreach($arData as $key => $photo){?>
                    <div class="pic">
                        <a href="full_pic.php?url=<?=$photo['url']?>&id=<?=$photo['id']?>&name=<?=$photo['name']?>">
                            <img class="picture" src="<?=$photo['url']?>" alt="<?=$photo['name']?>" width="auto" height="100">
                        </a>
                        <form class="form" action="<?=$_SERVER['SCRIPT_NAME']?>" method="POST">
                            <input type="submit" value="Удалить" name="doDelete">
                            <input type="hidden" name="id" value="<?=$photo['id']?>">
                        </form>
                    </div>
                <?}?>
            </div>
        <?}else{?>
            <div class="gallery">
                <p>Галерея пуста, загрузите фото</p>
            </div>
        <?}?>    
        <form class="form" action="<?=$_SERVER['SCRIPT_NAME']?>" method="POST" enctype="multipart/form-data">
            <input type="file" name="files">
            <input type="submit" value="Загрузить" name="doPush">
        </form>
        <div class="request"><?=$notPush ? $errorMsg : $message_error_upload?></div>
    </div>
</body>
</html>
