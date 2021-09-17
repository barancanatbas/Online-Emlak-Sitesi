<?php
$basedir = "/emlak/";
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<base href="http://localhost/emlak/login" />
	<!-- Required meta tags-->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="au theme template">
	<meta name="author" content="Hau Nguyen">
	<meta name="keywords" content="au theme template">

	<!-- Title Page-->
	<title>Login</title>

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

</head>

<body class="animsition">
	<div class="page-wrapper">
		<div class="page-content--bge5">
			<div class="container">
				<?php if (isset($_GET["durum"])) {
					if ($_GET["durum"] == "no") {
						?>
						<div class="alert alert-danger alert-dismissible fade show col-md-5" style="margin:5px auto;" role="alert">
							<strong>Hata !</strong> Lütfen Bilgilerinizi Kontrol Ediniz.
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					<?php }} ?>

					<div class="login-wrap">
						<div class="login-content">
							<div class="login-logo">
								<a href="#">
									<img src="view/adminpanel/images/icon/logo.png" alt="CoolAdmin">
								</a>
							</div>
							<div class="login-form">
								<form action="<?php echo $basedir; ?>login/login" method="post">
									<div class="form-group">
										<label>Kullanıcı Adı</label>
										<input class="au-input au-input--full" type="text" name="kuladi" placeholder="Kullanıcı Adı">
									</div>
									<div class="form-group">
										<label>Şifre</label>
										<input class="au-input au-input--full" type="password" name="sifre" placeholder="Şifre">
									</div>
                                <!--<div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" name="remember">Remember Me
                                    </label>
                                    <label>
                                        <a href="#">Forgotten Password?</a>
                                    </label>
                                </div>-->
                                <button class="au-btn au-btn--block au-btn--green m-b-20" name="btn" type="submit">Giriş Yap</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="view/adminpanel/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="view/adminpanel/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="view/adminpanel/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="view/adminpanel/vendor/slick/slick.min.js">
    </script>
    <script src="view/adminpanel/vendor/wow/wow.min.js"></script>
    <script src="view/adminpanel/vendor/animsition/animsition.min.js"></script>
    <script src="view/adminpanel/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="view/adminpanel/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="view/adminpanel/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="view/adminpanel/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="view/adminpanel/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="view/adminpanel/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="view/adminpanel/vendor/select2/select2.min.js">
    </script>
    <script src="view/adminpanel/vendor/vector-map/jquery.vmap.js"></script>
    <script src="view/adminpanel/vendor/vector-map/jquery.vmap.min.js"></script>
    <script src="view/adminpanel/vendor/vector-map/jquery.vmap.sampledata.js"></script>
    <script src="view/adminpanel/vendor/vector-map/jquery.vmap.world.js"></script>

    <!-- Main JS-->
    <script src="view/adminpanel/js/main.js"></script>

</body>

</html>
<!-- end document-->