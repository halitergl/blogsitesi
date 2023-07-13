<!-- header -->
<?php include 'header.php'; ?>
<!-- end: header -->

<?php
$kategori_id = $_GET["kategori_id"];
$kategoriler = $db->prepare("SELECT * FROM kategoriler WHERE kategori_id=?");
$kategoriler->execute(array($kategori_id));
$kategori_cek = $kategoriler->fetch(PDO::FETCH_ASSOC);

?>

<div class="inner-wrapper">

	<!-- start: sidebar -->
	<?php include 'sidebar.php'; ?>
	<!-- end: sidebar -->

	<section role="main" class="content-body">
		<header class="page-header">
			<h2>Kategori Düzenle</h2>

			<div class="right-wrapper pull-right">
				<ol class="breadcrumbs">
					<li>
						<a href="index.php">
							<i class="fa fa-home"></i>
						</a>
					</li>
					<li><span>Kategoriler</span></li>
					<li><span>Kategori Düzenle</span></li>
				</ol>
				<br>
				<br>
			</div>
		</header>

		<!-- start: page -->
		
		<section class="panel">
			<header class="panel-heading">
				<h2 class="panel-title">Kategori Düzenle</h2>
			</header>
			<div class="panel-body">
				<form class="form-horizontal form-bordered" action="islem.php?kategori_id=<?php echo $kategori_cek["kategori_id"]; ?>" method="POST" enctype="multipart/form-data">

					<div class="form-group">
						<label class="col-md-2 control-label" for="inputDefault">Başlık</label>
						<div class="col-md-9">
							<input type="text" name="kategori_baslik" class="form-control" value="<?php echo $kategori_cek["kategori_baslik"]; ?>">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-2 control-label" for="inputDefault">Sef Link</label>
						<div class="col-md-9">
							<input type="text" class="form-control" value="<?php echo $kategori_cek["kategori_url"]; ?>" disabled>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-2 control-label" for="inputDefault">Tarih</label>
						<div class="col-md-9">
							<input type="text" class="form-control" value="<?php echo Tarih($kategori_cek["kategori_tarih"]); ?>" disabled>
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-12">
							<button name="kategori_duzenle" class="btn btn-primary btn-sm btn-block">Değişiklikleri Kaydet!</button>
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