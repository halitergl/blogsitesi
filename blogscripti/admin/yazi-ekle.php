<!-- header -->
<?php include 'header.php'; ?>
<!-- end: header -->


<div class="inner-wrapper">

	<!-- start: sidebar -->
	<?php include 'sidebar.php'; ?>
	<!-- end: sidebar -->

	<section role="main" class="content-body">
		<header class="page-header">
			<h2>Yazı Ekle</h2>

			<div class="right-wrapper pull-right">
				<ol class="breadcrumbs">
					<li>
						<a href="index.php">
							<i class="fa fa-home"></i>
						</a>
					</li>
					<li><span>Yazılar</span></li>
					<li><span>Yazı Ekle</span></li>
				</ol>
				<br>
				<br>
			</div>
		</header>

		<!-- start: page -->
		
		<section class="panel">
			<header class="panel-heading">
				<h2 class="panel-title">Yazı Ekle</h2>
			</header>
			<div class="panel-body">
				<form class="form-horizontal form-bordered" action="islem.php" method="POST" enctype="multipart/form-data">

					<div class="form-group">
						<label class="col-md-2 control-label" for="inputDefault">Resim Seç</label>
						<div class="col-md-9">
							<input type="file" name="yazi_foto" class="form-control" id="inputDefault">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-2 control-label" for="inputDefault">Başlık</label>
						<div class="col-md-9">
							<input type="text" name="yazi_baslik" class="form-control" placeholder="Web Sitesi Nasıl Kurulur?">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-2 control-label" for="inputDefault">Kategori</label>
						<div class="col-md-9">
							<select name="yazi_kategori_id" class="form-control">
								<option>Bir kategori seç...</option>
								<?php
								$kategoriler = $db->prepare("SELECT * FROM kategoriler ORDER BY kategori_id DESC");
								$kategoriler->execute();
								$kategori_cek = $kategoriler->fetchAll(PDO::FETCH_ASSOC);

								foreach ($kategori_cek as $row){ ?>
								<option value="<?php echo $row["kategori_id"]; ?>"><?php echo $row["kategori_baslik"]; ?></option>
								<?php } ?>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-2 control-label">Yazı İçerik</label>
						<div class="col-md-9">
							<textarea name="yazi_icerik" class="ckeditor"></textarea>
						</div>
					</div>


					<div class="form-group">
						<div class="col-md-12">
							<button name="yazi_ekle" class="btn btn-primary btn-sm btn-block">Ekle!</button>
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