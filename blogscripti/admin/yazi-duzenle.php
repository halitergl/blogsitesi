<!-- header -->
<?php include 'header.php'; ?>
<!-- end: header -->

<?php
$yazi_id = $_GET["yazi_id"];
$yazilar = $db->prepare("SELECT * FROM yazilar WHERE yazi_id=?");
$yazilar->execute(array($yazi_id));
$yazi_cek = $yazilar->fetch(PDO::FETCH_ASSOC);

?>

<div class="inner-wrapper">

	<!-- start: sidebar -->
	<?php include 'sidebar.php'; ?>
	<!-- end: sidebar -->

	<section role="main" class="content-body">
		<header class="page-header">
			<h2>Yazı Düzenle</h2>

			<div class="right-wrapper pull-right">
				<ol class="breadcrumbs">
					<li>
						<a href="index.php">
							<i class="fa fa-home"></i>
						</a>
					</li>
					<li><span>Yazılar</span></li>
					<li><span>Yazı Düzenle</span></li>
				</ol>
				<br>
				<br>
			</div>
		</header>

		<!-- start: page -->
		
		<section class="panel">
			<header class="panel-heading">
				<h2 class="panel-title">Yazı Düzenle</h2>
			</header>
			<div class="panel-body">
				<form class="form-horizontal form-bordered" action="islem.php?yazi_id=<?php echo $yazi_cek["yazi_id"]; ?>" method="POST" enctype="multipart/form-data">

					<div class="form-group">
						<label class="col-md-2 control-label" for="inputDefault">Yüklü Olan Resim</label>
						<div class="col-md-6">
							<img width="200" src="../img/yazilar/<?php echo $yazi_cek["yazi_foto"]; ?>" alt="">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-2 control-label" for="inputDefault">Resim Seç</label>
						<div class="col-md-9">
							<input type="file" name="yazi_foto" class="form-control" id="inputDefault">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-2 control-label" for="inputDefault">Başlık</label>
						<div class="col-md-9">
							<input type="text" name="yazi_baslik" class="form-control" value="<?php echo $yazi_cek["yazi_baslik"]; ?>">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-2 control-label" for="inputDefault">Kategori</label>
						<div class="col-md-9">
							<select name="yazi_kategori_id" class="form-control">
								<?php
								$kategoriler = $db->prepare("SELECT * FROM kategoriler ORDER BY kategori_id DESC");
								$kategoriler->execute();
								$kategori_cek = $kategoriler->fetchAll(PDO::FETCH_ASSOC);

								foreach ($kategori_cek as $row){ ?>
								<option value="<?php echo $row["kategori_id"]; ?>" <?php echo $yazi_cek["yazi_kategori_id"]==$row["kategori_id"] ? "selected" : null; ?>><?php echo $row["kategori_baslik"]; ?></option>
								<?php } ?>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-2 control-label" for="inputDefault">Okunma</label>
						<div class="col-md-9">
							<input type="text" class="form-control" value="<?php echo $yazi_cek["yazi_okunma"]; ?>" disabled>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-2 control-label" for="inputDefault">Tarih</label>
						<div class="col-md-9">
							<input type="text" class="form-control" value="<?php echo Tarih($yazi_cek["yazi_tarih"]); ?>" disabled>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-2 control-label">Yazı İçerik</label>
						<div class="col-md-9">
							<textarea name="yazi_icerik" class="ckeditor"><?php echo $yazi_cek["yazi_icerik"]; ?></textarea>
						</div>
					</div>


					<div class="form-group">
						<div class="col-md-12">
							<button name="yazi_duzenle" class="btn btn-primary btn-sm btn-block">Değişiklikleri Kaydet!</button>
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