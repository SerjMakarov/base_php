<?php
    // var_dump($_REQUEST);
    // var_dump($_FILES);
    // var_dump($_SERVER);
    $uploadDir = './upload/';
    $existsDir = file_exists($uploadDir);

    if(@$_REQUEST['doPush'])
    {
        if(!$existsDir)
        {
            mkdir($uploadDir, 0777);
        }

        $tmpFile = $_FILES['files']['tmp_name'];
        $nameFile = $_FILES['files']['name'];
        $checkFiles = is_uploaded_file($tmpFile);

        if($checkFiles)
        {
            move_uploaded_file($tmpFile, $uploadDir.$nameFile);
            // echo "Файл $nameFile успешно загружен";
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
    </style>
</head>
<body>
    <div class="container">
        <?if($arPhotos){?>
            <div class="gallery">
                <?foreach($arPhotos as $key => $photo){?>
                    <a href="<?=$photo['url']?>" target="_blank">
                        <img class="picture" src="<?=$photo['url']?>" alt="<?=$photo['name']?>" width="100" height="100">
                    </a>
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
    </div>
</body>
</html>
