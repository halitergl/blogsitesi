<!-- header -->
<?php include 'header.php'; ?>
<!-- end: header -->

<div class="inner-wrapper">

	<!-- start: sidebar -->
	<?php include 'sidebar.php'; ?>
	<!-- end: sidebar -->

	<section role="main" class="content-body">
		<header class="page-header">
			<h2>Sponsorlar</h2>

			<div class="right-wrapper pull-right">
				<ol class="breadcrumbs">
					<li>
						<a href="index.php">
							<i class="fa fa-home"></i>
						</a>
					</li>
					<li><span>Sponsorlar</span></li>
					<li><span>Sponsorları Listele</span></li>
				</ol>
				<br>
				<br>
			</div>
		</header>

		<!-- start: page -->
		<!-- GERİ DÖNÜŞ UYARILARI -->
		<?php
		if ($_GET["sponsor_guncelle"]=="bos"){
			?>
			<div class="alert alert-warning">
				<strong>Dikkat!</strong>  Lütfen boş alan bırakmayınız...
			</div>
			<?php
		}else if($_GET["sponsor_guncelle"]=="reskiresimyok"){
			?>
			<div class="alert alert-warning">
				<strong>Dikkat!</strong>  Eski resim klasörde bulunmamaktadır!
			</div>
			<?php
		}else if($_GET["sponsor_guncelle"]=="buyuk"){
			?>
			<div class="alert alert-warning">
				<strong>Dikkat!</strong>  En fazla 1 MB'lık fotoğraf yükleyebilirsiniz.
			</div>
			<?php
		}else if($_GET["sponsor_guncelle"]=="yes"){
			?>
			<div class="alert alert-success">
				<strong>Tebrikler!</strong> Güncelleme işleminiz başarıyla gerçekleştirildi...
			</div>
			<?php
		}else if($_GET["sponsor_guncelle"]=="no"){
			?>
			<div class="alert alert-danger">
				<!-- Demo modda değişiklik yapamazsınız. -->
				<strong>Hata!</strong>  Güncelleme işleminiz gerçekleştirilirken bir hata oluştu...
			</div>
			<?php
		}elseif($_GET["sponsor_ekle"]=="bos"){
			?>
			<div class="alert alert-warning">
				<strong>Dikkat!</strong>  Lütfen boş alan bırakmayınız...
			</div>
			<?php
		}elseif($_GET["sponsor_ekle"]=="yes"){
			?>
			<div class="alert alert-success">
				<strong>Tebrikler!</strong> Ekleme işleminiz başarıyla gerçekleştirildi...
			</div>
			<?php
		}elseif($_GET["sponsor_ekle"]=="no"){
			?>
			<div class="alert alert-danger">
				<!-- Demo modda değişiklik yapamazsınız. -->
				<strong>Hata!</strong>  Ekleme işleminiz gerçekleştirilirken bir hata oluştu...
			</div>
			<?php
		}elseif($_GET["sponsor_ekle"]=="gecersizuzanti"){
			?>
			<div class="alert alert-warning">
				<strong>Dikkat!</strong>  Sadece JPG, JPEG, PNG dosyalarını yükleyebilirsiniz.
			</div>
			<?php
		}elseif($_GET["sponsor_ekle"]=="buyuk"){
			?>
			<div class="alert alert-warning">
				<strong>Dikkat!</strong>  En fazla 5 MB'lık fotoğraf yükleyebilirsiniz.
			</div>
			<?php
		}elseif($_GET["sponsor_sil"]=="yes"){
			?>
			<div class="alert alert-success">
				<strong>Tebrikler!</strong> Silme şleminiz başarıyla gerçekleştirildi...
			</div>
			<?php
		}elseif($_GET["sponsor_sil"]=="no"){
			?>
			<div class="alert alert-danger">
				<!-- Demo modda değişiklik yapamazsınız. -->
				<strong>Hata!</strong>  Silme işleminiz gerçekleştirilirken bir hata oluştu...
			</div>
			<?php } ?>
			<!-- END GERİ DÖNÜŞ UYARILARI -->

			<section class="panel" style="margin: 0;">
				<header class="panel-heading">
					<h2 class="panel-title">Sponsorlar</h2>
				</header>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-bordered table-striped mb-none" id="datatable-details">
							<thead>
								<tr>
									<th class="center">#</th>
									<th class="center">Resim</th>
									<th class="center" width="200">Link</th>
									<th class="center">Tarih</th>
									<th class="center">İşlemler</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$sponsorlar = $db->prepare("SELECT * FROM sponsorlar ORDER BY sponsor_id DESC");
								$sponsorlar->execute();
								$sponsor_cek = $sponsorlar->fetchAll(PDO::FETCH_ASSOC);
								$say = $sponsorlar->rowCount();

								if($say){
									foreach ($sponsor_cek as $row){ ?>

									<tr class="gradeX">
										<td class="center"><?php echo $row["sponsor_id"]; ?></td>
										<td class="center"><img width="80" height="50" src="../img/sponsorlar/<?php echo $row["sponsor_resim"]; ?>" alt=""></td>
										<td class="center"><?php echo $row["sponsor_link"]; ?></td>
										<td class="center"><?php echo Tarih($row["sponsor_tarih"]); ?></td>
										<td class="center">
											<a href="sponsor-duzenle.php?sponsor_id=<?php echo $row["sponsor_id"]; ?>" class="btn btn-primary btn-sm"><span class="fa fa-edit"></span> Düzenle</a>
											<!-- <a href="islem.php?yazi_id=<?php echo $row["yazi_id"]; ?>" class="btn btn-danger btn-sm"><span class="fa fa-trash"></span> Sil</a> -->
											<!-- Modal Primary -->
											<button class="btn-sm modal-basic btn btn-danger" onclick="id(<?php echo $row["sponsor_id"]; ?>);" href="#modalHeaderColorDanger"><span class="fa fa-trash"></span> Sil</button>

											<div id="modalHeaderColorDanger" class="modal-block modal-header-color modal-block-danger mfp-hide">
												<section class="panel">
													<header class="panel-heading">
														<h2 class="panel-title">Sponsor silinsin mi?</h2>
													</header>
													<div class="panel-body">
														<div class="modal-wrapper">
															<div class="modal-icon">
																<i class="fa fa-question-circle"></i>
															</div>
															<div class="modal-text">
																<h4>Dikkat!</h4>
																<p>Sponsoru silmek istediğinize emin misiniz?</p>
															</div>
														</div>
													</div>
													<footer class="panel-footer">
														<div class="row">
															<div class="col-md-12 text-right">
																<a href="id();" class="btn btn-danger">Evet!</a>
																<button class="btn btn-default modal-dismiss">İptal!</button>
															</div>
														</div>
													</footer>
												</section>
											</div>
										</td>
									</tr>
									<?php } }else{
										echo "<td colspan='7'> ☺ Hiç sponsor eklenmemiş!</td>";
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