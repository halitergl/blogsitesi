<!-- header -->
<?php include 'header.php'; ?>
<!-- end: header -->

<?php
$yorum_id = $_GET["yorum_id"];
$yorumlar = $db->prepare("SELECT * FROM yorumlar WHERE yorum_id=?");
$yorumlar->execute(array($yorum_id));
$yorum_cek = $yorumlar->fetch(PDO::FETCH_ASSOC);

?>

<div class="inner-wrapper">

	<!-- start: sidebar -->
	<?php include 'sidebar.php'; ?>
	<!-- end: sidebar -->

	<section role="main" class="content-body">
		<header class="page-header">
			<h2>Yorum Düzenle</h2>

			<div class="right-wrapper pull-right">
				<ol class="breadcrumbs">
					<li>
						<a href="index.php">
							<i class="fa fa-home"></i>
						</a>
					</li>
					<li><span>Yorumlar</span></li>
					<li><span>Yorum Düzenle</span></li>
				</ol>
				<br>
				<br>
			</div>
		</header>

		<!-- start: page -->
		
		<section class="panel">
			<header class="panel-heading">
				<h2 class="panel-title">Yorum Düzenle</h2>
			</header>
			<div class="panel-body">
				<form class="form-horizontal form-bordered" action="islem.php?yorum_id=<?php echo $yorum_cek["yorum_id"]; ?>" method="POST" enctype="multipart/form-data">

					<div class="form-group">
						<label class="col-md-2 control-label" for="inputDefault">Ekleyen</label>
						<div class="col-md-9">
							<input type="text" class="form-control" value="<?php echo $yorum_cek["yorum_ekleyen"]; ?>" disabled>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-2 control-label" for="inputDefault">Website Link</label>
						<div class="col-md-9">
							<input type="text" class="form-control" value="<?php echo $yorum_cek["yorum_ekleyen_website"]; ?>" disabled>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-2 control-label" for="inputDefault">Tarih</label>
						<div class="col-md-9">
							<input type="text" class="form-control" value="<?php echo Tarih($yorum_cek["yorum_tarih"]); ?>" disabled>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label">Durum</label>
						<div class="col-sm-9">
							<select data-plugin-selectTwo class="form-control populate" name="yorum_durum">
								<option value="1" <?php echo $yorum_cek["yorum_durum"]==1 ? "selected" : null; ?>>Onaylı</option>
								<option value="0" <?php echo $yorum_cek["yorum_durum"]==0 ? "selected" : null; ?>>Onaylı Değil</option>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label">İçerik</label>
						<div class="col-sm-9">
							<textarea rows="10" name="yorum_icerik" class="form-control" required><?php echo $yorum_cek["yorum_icerik"]; ?></textarea>
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-12">
							<button name="yorum_duzenle" class="btn btn-primary btn-sm btn-block">Değişiklikleri Kaydet!</button>
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