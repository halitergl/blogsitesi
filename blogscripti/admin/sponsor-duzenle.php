<!-- header -->
<?php include 'header.php'; ?>
<!-- end: header -->
<?php
$sponsor_id = $_GET["sponsor_id"];
$sponsorlar = $db->prepare("SELECT * FROM sponsorlar WHERE sponsor_id=?");
$sponsorlar->execute(array($sponsor_id));
$sponsor_cek = $sponsorlar->fetch(PDO::FETCH_ASSOC);

?>

<div class="inner-wrapper">

	<!-- start: sidebar -->
	<?php include 'sidebar.php'; ?>
	<!-- end: sidebar -->

	<section role="main" class="content-body">
		<header class="page-header">
			<h2>Sponsor Düzenle</h2>

			<div class="right-wrapper pull-right">
				<ol class="breadcrumbs">
					<li>
						<a href="index.php">
							<i class="fa fa-home"></i>
						</a>
					</li>
					<li><span>Sponsorlar</span></li>
					<li><span>Sponsor Düzenle</span></li>
				</ol>
				<br>
				<br>
			</div>
		</header>

		<!-- start: page -->
		
		<section class="panel">
			<header class="panel-heading">
				<h2 class="panel-title">Sponsor Düzenle</h2>
			</header>
			<div class="panel-body">
				<form class="form-horizontal form-bordered" action="islem.php?sponsor_id=<?php echo $sponsor_cek["sponsor_id"]; ?>" method="POST" enctype="multipart/form-data">

					<div class="form-group">
						<label class="col-md-2 control-label" for="inputDefault">Yüklü Olan Resim</label>
						<div class="col-md-6">
							<img width="200" src="../img/sponsorlar/<?php echo $sponsor_cek["sponsor_resim"]; ?>" alt="">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-2 control-label" for="inputDefault">Resim Seç</label>
						<div class="col-md-9">
							<input type="file" name="sponsor_foto" class="form-control" id="inputDefault">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-2 control-label" for="inputDefault">Link</label>
						<div class="col-md-9">
							<input type="text" name="sponsor_link" class="form-control" value="<?php echo $sponsor_cek["sponsor_link"]; ?>">
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-12">
							<button name="sponsor_duzenle" class="btn btn-primary btn-sm btn-block">Düzenle!</button>
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