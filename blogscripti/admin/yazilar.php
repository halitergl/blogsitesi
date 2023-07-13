<!-- header -->
<?php include 'header.php'; ?>
<!-- end: header -->

<div class="inner-wrapper">

	<!-- start: sidebar -->
	<?php include 'sidebar.php'; ?>
	<!-- end: sidebar -->

	<section role="main" class="content-body">
		<header class="page-header">
			<h2>Yazılar</h2>

			<div class="right-wrapper pull-right">
				<ol class="breadcrumbs">
					<li>
						<a href="index.php">
							<i class="fa fa-home"></i>
						</a>
					</li>
					<li><span>Yazılar</span></li>
					<li><span>Yazıları Listele</span></li>
				</ol>
				<br>
				<br>
			</div>
		</header>

		<!-- start: page -->
		<!-- GERİ DÖNÜŞ UYARILARI -->
		<?php
		if ($_GET["yazi_guncelle"]=="bos"){
			?>
			<div class="alert alert-warning">
				<strong>Dikkat!</strong>  Lütfen boş alan bırakmayınız...
			</div>
			<?php
		}else if($_GET["yazi_guncelle"]=="reskiresimyok"){
			?>
			<div class="alert alert-warning">
				<strong>Dikkat!</strong>  Eski resim klasörde bulunmamaktadır!
			</div>
			<?php
		}else if($_GET["yazi_guncelle"]=="buyuk"){
			?>
			<div class="alert alert-warning">
				<strong>Dikkat!</strong>  En fazla 1 MB'lık fotoğraf yükleyebilirsiniz.
			</div>
			<?php
		}else if($_GET["yazi_guncelle"]=="yes"){
			?>
			<div class="alert alert-success">
				<strong>Tebrikler!</strong> Güncelleme işleminiz başarıyla gerçekleştirildi...
			</div>
			<?php
		}else if($_GET["yazi_guncelle"]=="no"){
			?>
			<div class="alert alert-danger">
				<!-- Demo modda değişiklik yapamazsınız. -->
				<strong>Hata!</strong>  Güncelleme işleminiz gerçekleştirilirken bir hata oluştu...
			</div>
			<?php
		}elseif($_GET["yazi_ekle"]=="bos"){
			?>
			<div class="alert alert-warning">
				<strong>Dikkat!</strong>  Lütfen boş alan bırakmayınız...
			</div>
			<?php
		}elseif($_GET["yazi_ekle"]=="yes"){
			?>
			<div class="alert alert-success">
				<strong>Tebrikler!</strong> Ekleme işleminiz başarıyla gerçekleştirildi...
			</div>
			<?php
		}elseif($_GET["yazi_ekle"]=="no"){
			?>
			<div class="alert alert-danger">
				<!-- Demo modda değişiklik yapamazsınız. -->
				<strong>Hata!</strong>  Ekleme işleminiz gerçekleştirilirken bir hata oluştu...
			</div>
			<?php
		}elseif($_GET["yazi_ekle"]=="gecersizuzanti"){
			?>
			<div class="alert alert-warning">
				<strong>Dikkat!</strong>  Sadece JPG, JPEG, PNG dosyalarını yükleyebilirsiniz.
			</div>
			<?php
		}elseif($_GET["yazi_ekle"]=="buyuk"){
			?>
			<div class="alert alert-warning">
				<strong>Dikkat!</strong>  En fazla 5 MB'lık fotoğraf yükleyebilirsiniz.
			</div>
			<?php
		}elseif($_GET["yazi_sil"]=="yes"){
			?>
			<div class="alert alert-success">
				<strong>Tebrikler!</strong> Silme şleminiz başarıyla gerçekleştirildi...
			</div>
			<?php
		}elseif($_GET["yazi_sil"]=="no"){
			?>
			<div class="alert alert-danger">
				<!-- Demo modda değişiklik yapamazsınız. -->
				<strong>Hata!</strong>  Silme işleminiz gerçekleştirilirken bir hata oluştu...
			</div>
			<?php } ?>
			<!-- END GERİ DÖNÜŞ UYARILARI -->

			<section class="panel" style="margin: 0;">
				<header class="panel-heading">
					<h2 class="panel-title">Yazılar</h2>
				</header>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-bordered table-striped mb-none" id="datatable-details">
							<thead>
								<tr>
									<th class="center">#</th>
									<th class="center">Resim</th>
									<th class="center" width="200">Başlık</th>
									<th class="center">Kategori</th>
									<th class="center">Okunma</th>
									<th class="center">Tarih</th>
									<th class="center">İşlemler</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$yazilar = $db->prepare("SELECT * FROM yazilar
									INNER JOIN kategoriler ON kategoriler.kategori_id = yazilar.yazi_kategori_id
									ORDER BY yazi_id DESC");
								$yazilar->execute();
								$yazi_cek = $yazilar->fetchAll(PDO::FETCH_ASSOC);
								$say = $yazilar->rowCount();

								if($say){
									foreach ($yazi_cek as $row){ ?>

									<tr class="gradeX">
										<td class="center"><?php echo $row["yazi_id"]; ?></td>
										<td class="center"><img width="80" height="50" src="../img/yazilar/<?php echo $row["yazi_foto"]; ?>" alt=""></td>
										<td class="center"><?php echo mb_strimwidth($row["yazi_baslik"], 0, 90); ?>...</td>
										<td class="center"><?php echo $row["kategori_baslik"]; ?></td>
										<td class="center"><?php echo $row["yazi_okunma"]; ?></td>
										<td class="center"><?php echo Tarih($row["yazi_tarih"]); ?></td>
										<td class="center">
											<a href="yazi-duzenle.php?yazi_id=<?php echo $row["yazi_id"]; ?>" class="btn btn-primary btn-sm"><span class="fa fa-edit"></span> Düzenle</a>
											<!-- <a href="islem.php?yazi_id=<?php echo $row["yazi_id"]; ?>" class="btn btn-danger btn-sm"><span class="fa fa-trash"></span> Sil</a> -->
											<!-- Modal Primary -->
											<a class="btn-sm modal-basic btn btn-danger" href="#modalHeaderColorDanger"><span class="fa fa-trash"></span> Sil</a>

											<div id="modalHeaderColorDanger" class="modal-block modal-header-color modal-block-danger mfp-hide">
												<section class="panel">
													<header class="panel-heading">
														<h2 class="panel-title">Yazı silinsin mi?</h2>
													</header>
													<div class="panel-body">
														<div class="modal-wrapper">
															<div class="modal-icon">
																<i class="fa fa-question-circle"></i>
															</div>
															<div class="modal-text">
																<h4>Dikkat!</h4>
																<p>Yazıyı silmek istediğinize emin misiniz?</p>
															</div>
														</div>
													</div>
													<footer class="panel-footer">
														<div class="row">
															<div class="col-md-12 text-right">
																<a href="islem.php?yazisil_id=<?php echo $row["yazi_id"]; ?>" class="btn btn-danger">Evet!</a>
																<button class="btn btn-default modal-dismiss">İptal!</button>
															</div>
														</div>
													</footer>
												</section>
											</div>
										</td>
									</tr>
									<?php } }else{
										echo "<td colspan='7'> ☺ Hiç yazı eklenmemiş!</td>";
									} ?>
								</tbody>
							</table>
						</div>
					</div>
				</section>

				<!-- end: page -->
			</section>
		</div>


		<!-- <footer>-->
			<?php include 'footer.php'; ?>
<!--</footer> 