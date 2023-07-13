<!-- header -->
<?php include 'header.php'; ?>
<!-- end: header -->
<?php
$hakkimizda_id = 1;
$hakkimizda = $db->prepare("SELECT * FROM hakkimizda WHERE hakkimizda_id=?");
$hakkimizda->execute(array($hakkimizda_id));
$hakkimizda_cek = $hakkimizda->fetch(PDO::FETCH_ASSOC);

?>

<div class="inner-wrapper">

	<!-- start: sidebar -->
	<?php include 'sidebar.php'; ?>
	<!-- end: sidebar -->

	<section role="main" class="content-body">
		<header class="page-header">
			<h2>Hakkımda</h2>

			<div class="right-wrapper pull-right">
				<ol class="breadcrumbs">
					<li>
						<a href="index.php">
							<i class="fa fa-home"></i>
						</a>
					</li>
					<li><span>Sayfalar</span></li>
					<li><span>Hakkımda</span></li>
				</ol>
				<br>
				<br>
			</div>
		</header>

		<!-- start: page -->

		<?php
		if($_GET["hakkimizda_guncelle"]=="yes"){
			?>
			<div class="alert alert-success">
				<strong>Tebrikler!</strong> Güncelleme işleminiz başarıyla gerçekleştirildi...
			</div>
			<?php
		}elseif($_GET["hakkimizda_guncelle"]=="no"){
			?>
			<div class="alert alert-danger">
				<!-- Demo modda değişiklik yapamazsınız. -->
				<strong>Hata!</strong>  Güncelleme işleminiz gerçekleştirilirken bir hata oluştu...
			</div>
			<?php }elseif($_GET["hakkimizda_guncelle"]=="bos"){?>
				<div class="alert alert-warning">
					<!-- Demo modda değişiklik yapamazsınız. -->
					<strong>Dikkat!</strong>  Lütfen boş alan bırakmayınız!
				</div>
				<?php } ?>
				<!-- END GERİ DÖNÜŞ UYARILARI -->

				<section class="panel">
					<header class="panel-heading">
						<h2 class="panel-title">Hakkımda</h2>
					</header>
					<div class="panel-body">
						<form class="form-horizontal form-bordered" action="islem.php?hakkimizda_id=<?php echo $hakkimizda_cek["hakkimizda_id"]; ?>" method="POST" enctype="multipart/form-data">

							<div class="form-group">
								<label class="col-md-2 control-label" for="inputDefault">Yüklü Resim</label>
								<div class="col-md-9">
									<img width="250" height="150" src="../img/<?php echo $hakkimizda_cek["hakkimizda_fotograf"]; ?>" alt="Musty">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-2 control-label" for="inputDefault">Resim Seç</label>
								<div class="col-md-9">
									<input type="file" name="hakkimizda_fotograf" class="form-control" id="inputDefault">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-2 control-label">Hakkımda İçerik</label>
								<div class="col-md-9">
									<textarea name="hakkimizda_aciklama" class="ckeditor"><?php echo $hakkimizda_cek["hakkimizda_aciklama"]; ?></textarea>
								</div>
							</div>


							<div class="form-group">
								<div class="col-md-12">
									<button name="hakkimizda_duzenle" class="btn btn-primary btn-sm btn-block">Güncelle!</button>
								</div>
							</div>


						</form>
					</div>
				</section>
				<!-- end: page -->
			</section>
		</div>


		<!-- <footer>-->
			<?php include 'footer.php'; ?>
<!--</footer>  -->