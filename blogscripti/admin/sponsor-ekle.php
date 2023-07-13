<!-- header -->
<?php include 'header.php'; ?>
<!-- end: header -->


<div class="inner-wrapper">

	<!-- start: sidebar -->
	<?php include 'sidebar.php'; ?>
	<!-- end: sidebar -->

	<section role="main" class="content-body">
		<header class="page-header">
			<h2>Sponsor Ekle</h2>

			<div class="right-wrapper pull-right">
				<ol class="breadcrumbs">
					<li>
						<a href="index.php">
							<i class="fa fa-home"></i>
						</a>
					</li>
					<li><span>Sponsorlar</span></li>
					<li><span>Sponsor Ekle</span></li>
				</ol>
				<br>
				<br>
			</div>
		</header>

		<!-- start: page -->
		
		<section class="panel">
			<header class="panel-heading">
				<h2 class="panel-title">Sponsor Ekle</h2>
			</header>
			<div class="panel-body">
				<form class="form-horizontal form-bordered" action="islem.php" method="POST" enctype="multipart/form-data">

					<div class="form-group">
						<label class="col-md-2 control-label" for="inputDefault">Resim Seç</label>
						<div class="col-md-9">
							<input type="file" name="sponsor_foto" class="form-control" id="inputDefault">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-2 control-label" for="inputDefault">link</label>
						<div class="col-md-9">
							<input type="text" name="sponsor_link" class="form-control" placeholder="Sponsor linki">
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-12">
							<button name="sponsor_ekle" class="btn btn-primary btn-sm btn-block">Ekle!</button>
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