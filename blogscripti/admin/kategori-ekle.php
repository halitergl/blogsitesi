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
			<h2>Kategori Ekle</h2>

			<div class="right-wrapper pull-right">
				<ol class="breadcrumbs">
					<li>
						<a href="index.php">
							<i class="fa fa-home"></i>
						</a>
					</li>
					<li><span>Kategoriler</span></li>
					<li><span>Kategori Ekle</span></li>
				</ol>
				<br>
				<br>
			</div>
		</header>

		<!-- start: page -->
		
		<section class="panel">
			<header class="panel-heading">
				<h2 class="panel-title">Kategori Ekle</h2>
			</header>
			<div class="panel-body">
				<form class="form-horizontal form-bordered" action="islem.php" method="POST" enctype="multipart/form-data">

					<div class="form-group">
						<label class="col-md-2 control-label" for="inputDefault">Başlık</label>
						<div class="col-md-9">
							<input type="text" name="kategori_baslik" class="form-control" placeholder="php">
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-12">
							<button name="kategori_ekle" class="btn btn-primary btn-sm btn-block">Ekle!</button>
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