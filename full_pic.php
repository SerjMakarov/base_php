<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$_REQUEST['name']?></title>
    <style>
        .container {
            width: 1170px;
            margin: 0 auto;
        }
        .gallery {
            display: flex;
            justify-content: center;
            margin: 50px 0;
        }
        .picture {
            padding: 20px;
            border: solid 1px #000;
            margin: 10px;
        }
        .btn {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="gallery">
            <div class="pic">
                <a href="index.php">
                    <img class="picture" src="<?=$_REQUEST['url']?>" alt="<?=$_REQUEST['name']?>">
                </a>
            </div>
        </div>
        <!-- <div class="btn">
            <a href="index.php">Назад</a>
        </div> -->
    </div>
</body>
</html>