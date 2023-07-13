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
			<h2>Yorum Cevapla</h2>

			<div class="right-wrapper pull-right">
				<ol class="breadcrumbs">
					<li>
						<a href="index.php">
							<i class="fa fa-home"></i>
						</a>
					</li>
					<li><span>Yorumlar</span></li>
					<li><span>Yorum Cevapla</span></li>
				</ol>
				<br>
				<br>
			</div>
		</header>

		<!-- start: page -->
		
		<section class="panel">
			<header class="panel-heading">
				<h2 class="panel-title">Yorum Cevapla</h2>
			</header>
			<div class="panel-body">
				<form class="form-horizontal form-bordered" action="islem.php?yorum_id=<?php echo $yorum_id; ?>" method="POST" enctype="multipart/form-data">
					
					<input type="hidden" name="yorum_yazi_id" value="<?php echo $yorum_cek["yorum_yazi_id"]; ?>">
					<input type="hidden" name="yorum_ekleyen" class="form-control" value="admin" readonly>

					<input type="hidden" name="yorum_eposta" class="form-control" value="mstfkrtll61@gmail.com" readonly>
					<input type="hidden" name="yorum_ekleyen_website" class="form-control" value="https://www.mstfkrtll.com" readonly>

					<div class="form-group">
						<label class="col-md-2 control-label" for="inputDefault">Ekleyen</label>
						<div class="col-md-9">
							<input type="text" class="form-control" value="<?php echo $yorum_cek["yorum_ekleyen"]; ?>" readonly>
						</div>
					</div>
					
						<div class="form-group">
						<label class="col-sm-2 control-label">Yapılan Yorum</label>
						<div class="col-sm-9">
							<textarea name="yorum_icerik" class="form-control" required><?php echo $yorum_cek["yorum_icerik"]; ?></textarea>
						</div>
					</div>


					<div class="form-group">
						<label class="col-sm-2 control-label">İçerik</label>
						<div class="col-sm-9">
							<textarea rows="10" name="yorum_icerik" class="form-control" required></textarea>
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-12">
							<button name="yorum_cevapla" class="btn btn-primary btn-sm btn-block">Cevapla!</button>
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