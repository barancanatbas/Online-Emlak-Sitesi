<?php
$basedir = "/emlak/";
?>
<!DOCTYPE html>
<html lang="tr">

<head>
    <base href="http://localhost/emlak/yonetim" />
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Dashboard</title>

    <!-- Fontfaces CSS-->
    <link href="view/adminpanel/css/font-face.css" rel="stylesheet" media="all">
    <link href="view/adminpanel/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="view/adminpanel/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="view/adminpanel/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="view/adminpanel/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="view/adminpanel/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="view/adminpanel/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="view/adminpanel/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="view/adminpanel/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="view/adminpanel/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="view/adminpanel/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="view/adminpanel/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
    <link href="view/adminpanel/vendor/vector-map/jqvmap.min.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="view/adminpanel/css/theme.css" rel="stylesheet" media="all">
    <script src="lib/ckeditor/ckeditor.js"></script>
    <link rel="stylesheet" href="view/adminpanel/css/custom.css">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <aside class="menu-sidebar2">
            <div class="logo">
                <a href="#">
                    <img src="view/adminpanel/images/icon/logo-white.png" alt="Cool Admin" />
                </a>
            </div>
            <!-- ana menuler -->
            <div class="menu-sidebar2__content js-scrollbar1">
                <div class="account2">
                    <div class="image img-cir img-120">
                        <img src='<?php echo $_SESSION["kullanici"]["resim"];?>' alt="John Doe" />
                    </div>
                    <h4 class="name"><?php echo $_SESSION["kullanici"]["ad"]." ".$_SESSION["kullanici"]["soyad"] ?></h4>
                    <a href="<?php echo $basedir ?>login/logout">Çıkış Yap</a>
                </div>
                <nav class="navbar-sidebar2">
                    <ul class="list-unstyled navbar__list">
                        <!-- menuler -->
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-user"></i>Kullanıcı İşlemleri</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="<?php echo $basedir; ?>kullanicilar/newUser"><i class="fas fa-plus"></i>Yeni</a>
                                </li>
                                <li>
                                    <a href="<?php echo $basedir; ?>kullanicilar/Aindex"><i class="fas fa-edit"></i>Düzenle</a>
                                </li>
                                <li>
                                    <a href="<?php echo $basedir; ?>kullanicilar/users"><i class="fas fa-user"></i>Tüm Kullanıcılar</a>
                                </li>
                                <li>
                                    <a href="<?php echo $basedir; ?>kidem"><i class="fas fa-user"></i>Kıdem</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?php echo $basedir; ?>ev/Aindex">
                                <i class="fas fa-home"></i>Konutlar
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo $basedir; ?>blog/Aindex">
                                <i class="fas fa-sticky-note"></i>Blog
                            </a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-envelope"></i>İletişim
                            </a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="<?php echo $basedir; ?>iletisim/AindexOkunan"><i class="fas fa-check-square"></i>Okunanlar</a>
                                </li>
                                <li>
                                    <a href="<?php echo $basedir; ?>iletisim/AindexOkunmayan"><i class="fas fa-square"></i>Okunmayanlar</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?php echo $basedir; ?>hakkinda/Aindex">
                                <i class="fas fa-address-card"></i>Hakkımızda
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo $basedir; ?>yapilacaklar">
                                <i class="fas fa-list-ul"></i>Yapılacaklar
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        <div class="page-container2">
            <header class="header-desktop2">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap2">
                            <div class="logo d-block d-lg-none">
                                <a href="#">
                                    <img src="view/adminpanel/images/icon/logo-white.png" alt="CoolAdmin" />
                                </a>
                            </div>
                            <div class="header-button2">
                                <div class="header-button-item mr-0 js-sidebar-btn">
                                    <i class="zmdi zmdi-menu"></i>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <aside class="menu-sidebar2 js-right-sidebar d-block d-lg-none">
                <div class="logo">
                    <a href="#">
                        <img src="view/adminpanel/images/icon/logo-white.png" alt="Cool Admin" />
                    </a>
                </div>
                <div class="menu-sidebar2__content js-scrollbar2">
                    <div class="account2">
                        <div class="image img-cir img-120">
                            <img src='<?php echo $_SESSION["kullanici"]["resim"];?>' alt="John Doe" />
                        </div>
                        <h4 class="name"><?php echo $_SESSION["kullanici"]["ad"]." ".$_SESSION["kullanici"]["soyad"] ?></h4>
                        <a href="logout">Çıkış Yap</a>
                    </div>
                    <nav class="navbar-sidebar2">
                        <ul class="list-unstyled navbar__list">
                            <!-- menuler -->
                            <li class="has-sub">
                                <a class="js-arrow" href="#">
                                    <i class="fas fa-user"></i>Kullanıcı İşlemleri</a>
                                <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                    <li>
                                        <a href="kullanici-yeni"><i class="fas fa-plus"></i>Yeni</a>
                                    </li>
                                    <li>
                                        <a href="kullanici-ayar"><i class="fas fa-edit"></i>Düzenle</a>
                                    </li>
                                    <li>
                                        <a href="kullanicilar"><i class="fas fa-user"></i>Tüm Kullanıcılar</a>
                                    </li>
                                    <li>
                                        <a href="kidemler"><i class="fas fa-user"></i>Kıdem</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="yonetim-evler">
                                    <i class="fas fa-home"></i>Konutlar
                                </a>
                            </li>
                            <li>
                                <a href="yonetim-bloglar">
                                    <i class="fas fa-sticky-note"></i>Blog
                                </a>
                            </li>
                            <li class="has-sub">
                                <a class="js-arrow" href="#">
                                    <i class="fas fa-envelope"></i>İletişim
                                </a>
                                <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                    <li>
                                        <a href="yonetim-iletisim-okunanlar"><i class="fas fa-check-square"></i>Okunanlar</a>
                                    </li>
                                    <li>
                                        <a href="yonetim-iletisim-okunmayanlar"><i class="fas fa-square"></i>Okunmayanlar</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="yonetim-hakkimizda">
                                    <i class="fas fa-address-card"></i>Hakkımızda
                                </a>
                            </li>
                            <li>
                                <a href="yonetim-yapilacaklar">
                                    <i class="fas fa-list-ul"></i>Yapılacaklar
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </aside>

            <section class="m-t-90">