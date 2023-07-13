<?php
require_once 'sistem/veritabani-baglantisi.php';
require_once 'sistem/fonksiyon.php';
require_once 'sistem/seourl.php';
?>
<?php

$ayarlar = $db->prepare("SELECT * FROM ayarlar");
$ayarlar->execute(array());
$ayarcek = $ayarlar->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<base href="<?php echo $ayarcek["site_url"]; ?>">
	<meta charset="UTF-8">
	<title><?php echo $ayarcek["site_title"]; ?></title>
	<meta name="description" content="<?php echo $ayarcek["site_desc"]; ?>">
	<meta name="keywords" content="<?php echo $ayarcek["site_keyw"]; ?>">
	<meta name="author" content="Mustafa Kartal">
	
	<link rel="Shortcut Icon"  href="img/socials/google.png"  type="image/x-icon">
	<!-- CSS  -->
	<link rel="stylesheet" type="text/css" href="<?php $ayarcek["site_url"]; ?>css/style.css" media="all"/>
	<link rel="stylesheet" type="text/css" href="<?php $ayarcek["site_url"]; ?>css/main.css" media="all"/>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
	<link href="<?php $ayarcek["site_url"]; ?>mdi-font/css/materialdesignicons.min.css" media="all" rel="stylesheet" type="text/css" />
	<link href="<?php $ayarcek["site_url"]; ?>css/swal.css" media="all" rel="stylesheet" type="text/css" />

	<!--[if lt IE 9]><script src="js/html5shiv.js"></script><![endif]-->
	<link rel="stylesheet" id="extra-fonts-css" href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;subset=latin,latin-ext" type="text/css" media="all">
	<script type="text/javascript" src="<?php $ayarcek["site_url"]; ?>js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="<?php $ayarcek["site_url"]; ?>js/swal.min.js"></script>
	<script>
		$(function(){
			$(".footer-nav ul.footer li:last").css({border:"0"});
			$("#pop ul.footer li:last").css({border:"0"});
		});
	</script>
</head>
<body>
<header>
	<div class="container">
		<div id="logo">
			<a href="anasayfa"><img src="img/<?php echo $ayarcek["site_logo"]; ?>" alt="Mustafa Kartal Logosu" width="352px" height="68px"/></a>
		</div>
		<nav>
			<ul>
				<li><a href="anasayfa" class="mdi mdi-home-circle" title="Anasayfa"> anasayfa</a></li>
				<li><a href="hakkimda" class="mdi mdi-account-circle" title="Hakkımda"> hakkımda</a></li>
				<li><a href="iletisim" class="mdi mdi-email" title="İletişim"> iletisim</a></li>
			</ul>
		</nav>
		<div style="clear:both;"></div>
	</div>
</header>
