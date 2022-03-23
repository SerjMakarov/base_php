<?php
    // var_dump($_REQUEST);
    // var_dump($_FILES);
    // var_dump($_SERVER);
    $uploadDir = './upload/';
    $existsDir = file_exists($uploadDir);
    $message_error_upload = null;

    if(@$_REQUEST['doDelete']){
        $arFiles = scandir($uploadDir);
        foreach($arFiles as $namePhoto){
           $id = sscanf($namePhoto, '%d_');
           if($id[0] == $_POST['id']){
              $del = unlink($uploadDir.$namePhoto);
           }
        }
        
    }

    if(@$_REQUEST['doPush'])
    {
        if(!$existsDir)
        {
            mkdir($uploadDir, 0777);
        }

        $tmpFile = $_FILES['files']['tmp_name'];
        $id = filemtime($tmpFile);
        $nameFile = $_FILES['files']['name'];
        $checkFiles = is_uploaded_file($tmpFile);

        if($checkFiles)
        {
            $mime_type = mime_content_type($tmpFile);
            if($mime_type === 'image/jpeg'){
                move_uploaded_file($tmpFile, $uploadDir.$id.'_'.$nameFile);
            } else {
                $message_error_upload = 'Тип загружаемого файла неправельный, допустимы только jpeg файлы';
            }
        }
    }

    $arPhotos = getArPhotos($uploadDir);

    function getArPhotos($path)
    {
        $arPhotos = [];
        $arFiles = [];
        $arFiles = glob("$path*");
        foreach($arFiles as $path)
        {
            $sz = getimagesize($path);
            $tm = filemtime($path);
            $arPhotos[$tm] = [
                'time' => $tm,
                'name' => basename($path),
                'url' => $path,
                'w'=> $sz[0],
                'h'=> $sz[1],
                'wh'=> $sz[3],
            ];
        }
        return $arPhotos;
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
        <?if($arPhotos){?>
            <div class="gallery">
                <?foreach($arPhotos as $key => $photo){?>
                    <div class="pic">
                        <a href="<?=$photo['url']?>" target="_blank">
                            <img class="picture" src="<?=$photo['url']?>" alt="<?=$photo['name']?>" width="auto" height="100">
                        </a>
                        <form class="form" action="<?=$_SERVER['SCRIPT_NAME']?>" method="POST">
                            <input type="submit" value="Удалить" name="doDelete">
                            <input type="hidden" name="id" value="<?=$key?>">
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
        <div class="request"><?=$message_error_upload?></div>
    </div>
</body>
</html>
