<?php
$basedir = "/emlak/";
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <base href="http://localhost/emlak/">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="view/site/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</head>
<body>

<div class="main-container">
    <nav class="nav">
        <div class="menu">
            <ul>
                <li><a href="<?php echo $basedir; ?>anasayfa">Anasayfa</a></li>
                <li><a href="<?php echo $basedir; ?>hakkinda">hakkımızda</a></li>
                <li><a href="<?php echo $basedir; ?>blog">Blog</a></li>
                <li><a href="<?php echo $basedir; ?>iletisim">İletisim</a></li>
                <li><a href="<?php echo $basedir; ?>ev">Evler</a></li>
                <li><a href="<?php echo $basedir; ?>kullanicilar">Çalışanlar</a></li>
                <?php if(isset($_SESSION["kullanici"])){ ?>
                    <li><a href="<?php echo $basedir; ?>login"><?php echo $_SESSION["kullanici"]["ad"]." ".$_SESSION["kullanici"]["soyad"]; ?></a></li>
                <?php }else{?>
                    <li><a href="<?php echo $basedir; ?>login">Yönetim</a></li>
                <?php }?>
            </ul>

        </div>
    </nav>