<?php
require_once '../sistem/veritabani-baglantisi.php';
require_once '../sistem/fonksiyon.php';
require_once '../sistem/seourl.php';
?>
<!doctype html>
<html class="fixed">
<head>

	<!-- Basic -->
	<meta charset="UTF-8">
	<title>Admin Giriş Sayfası _ Mstfkrtll.com / Kişisel Web Blogu</title>
	<meta name="keywords" content="HTML5 Admin Template" />
	<meta name="description" content="Porto Admin - Responsive HTML5 Template">
	<meta name="author" content="okler.net">

	<!-- Mobile Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

	<!-- Web Fonts  -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

	<!-- Vendor CSS -->
	<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css" />

	<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.css" />
	<link rel="stylesheet" href="assets/vendor/magnific-popup/magnific-popup.css" />
	<link rel="stylesheet" href="assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

	<!-- Theme CSS -->
	<link rel="stylesheet" href="assets/stylesheets/theme.css" />

	<!-- Skin CSS -->
	<link rel="stylesheet" href="assets/stylesheets/skins/default.css" />

	<!-- Theme Custom CSS -->
	<link rel="stylesheet" href="assets/stylesheets/theme-custom.css">

	<!-- Head Libs -->
	<script src="assets/vendor/modernizr/modernizr.js"></script>
</head>
<body>
	<!-- start: page -->
	<section class="body-sign">
		<div class="center-sign">
			<a href="login.php" class="logo pull-left">
				<img src="../img/mstfkrtll.png" height="54" alt="Porto Admin" style="background-color: #333;"/>
			</a>

			<div class="panel panel-sign">
				<div class="panel-title-sign mt-xl text-right">
					<h2 class="title text-uppercase text-weight-bold m-none"><i class="fa fa-user mr-xs"></i> Admin Giriş</h2>
				</div>
				<div class="panel-body">
					<form action="islem.php" method="post">
						<div class="form-group mb-lg">
							<label>Kullanıcı Adı</label>
							<div class="input-group input-group-icon">
								<input name="admin_kadi" type="text" class="form-control input-lg" placeholder="mstfkrtll" />
								<span class="input-group-addon">
									<span class="icon icon-lg">
										<i class="fa fa-user"></i>
									</span>
								</span>
							</div>
						</div>

						<div class="form-group mb-lg">
							<div class="clearfix">
								<label class="pull-left">Şifre</label>
							</div>
							<div class="input-group input-group-icon">
								<input name="admin_sifre" type="password" class="form-control input-lg" placeholder="***********" />
								<span class="input-group-addon">
									<span class="icon icon-lg">
										<i class="fa fa-lock"></i>
									</span>
								</span>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-12">
								<?php if(@$_GET["giris"]=="no"){ ?>
								<div class="alert alert-danger" style="border: 2px solid #bd362f!important; color: #bd362f!important; text-align: center;"><span class="fa fa-times-circle"></span> Sisteme girerken bir hata oluştu!</div> 
								<?php }elseif(@$_GET["giris"]=="bos"){ ?>
								<div class="alert alert-warning" style="border: 2px solid orange!important; color: orange!important; text-align: center;"><span class="fa fa-warning"></span> Lütfen boş alan bırakmayınız!</div> 
								<?php } ?>
								<button type="submit" name="loggin" class="btn btn-block btn-primary">Gririş Yap</button>
							</div>
						</div>

					</form>
				</div>
			</div>

			<p class="text-center text-muted mt-md mb-md">&copy; Copyright 2018. All Rights Reserved.</p>
		</div>
	</section>
	<!-- end: page -->

	<!-- Vendor -->
	<script src="assets/vendor/jquery/jquery.js"></script>
	<script src="assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.js"></script>
	<script src="assets/vendor/nanoscroller/nanoscroller.js"></script>
	<script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script src="assets/vendor/magnific-popup/magnific-popup.js"></script>
	<script src="assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>

	<!-- Theme Base, Components and Settings -->
	<script src="assets/javascripts/theme.js"></script>

	<!-- Theme Custom -->
	<script src="assets/javascripts/theme.custom.js"></script>

	<!-- Theme Initialization Files -->
	<script src="assets/javascripts/theme.init.js"></script>

</body>
</html>