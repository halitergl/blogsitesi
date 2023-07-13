<!-- header -->
<?php include 'header.php'; ?>
<!-- end: header -->

<div class="inner-wrapper">

	<!-- start: sidebar -->
	<?php include 'sidebar.php'; ?>
	<!-- end: sidebar -->

	<section role="main" class="content-body">
		<header class="page-header">
			<h2>Kategoriler</h2>

			<div class="right-wrapper pull-right">
				<ol class="breadcrumbs">
					<li>
						<a href="index.php">
							<i class="fa fa-home"></i>
						</a>
					</li>
					<li><span>Kategoriler</span></li>
					<li><span>Kategorileri Listele</span></li>
				</ol>
				<br>
				<br>
			</div>
		</header>

		<!-- start: page -->
		<!-- GERİ DÖNÜŞ UYARILARI -->
		<?php
		if ($_GET["kategori_guncelle"]=="bos"){
			?>
			<div class="alert alert-warning">
				<strong>Dikkat!</strong>  Lütfen boş alan bırakmayınız...
			</div>
			<?php
		}else if($_GET["kategori_guncelle"]=="yes"){
			?>
			<div class="alert alert-success">
				<strong>Tebrikler!</strong> Güncelleme işleminiz başarıyla gerçekleştirildi...
			</div>
			<?php
		}else if($_GET["kategori_guncelle"]=="no"){
			?>
			<div class="alert alert-danger">
				<!-- Demo modda değişiklik yapamazsınız. -->
				<strong>Hata!</strong>  Güncelleme işleminiz gerçekleştirilirken bir hata oluştu...
			</div>
			<?php
		}elseif($_GET["kategori_ekle"]=="bos"){
			?>
			<div class="alert alert-warning">
				<strong>Dikkat!</strong>  Lütfen boş alan bırakmayınız...
			</div>
			<?php
		}elseif($_GET["kategori_ekle"]=="yes"){
			?>
			<div class="alert alert-success">
				<strong>Tebrikler!</strong> Ekleme işleminiz başarıyla gerçekleştirildi...
			</div>
			<?php
		}elseif($_GET["kategori_ekle"]=="no"){
			?>
			<div class="alert alert-danger">
				<!-- Demo modda değişiklik yapamazsınız. -->
				<strong>Hata!</strong>  Ekleme işleminiz gerçekleştirilirken bir hata oluştu...
			</div>
			<?php
		}elseif($_GET["kategori_sil"]=="yes"){
			?>
			<div class="alert alert-success">
				<strong>Tebrikler!</strong> Silme şleminiz başarıyla gerçekleştirildi...
			</div>
			<?php
		}elseif($_GET["kategori_sil"]=="no"){
			?>
			<div class="alert alert-danger">
				<!-- Demo modda değişiklik yapamazsınız. -->
				<strong>Hata!</strong>  Silme işleminiz gerçekleştirilirken bir hata oluştu...
			</div>
			<?php } ?>
			<!-- END GERİ DÖNÜŞ UYARILARI -->

			<section class="panel" style="margin: 0;">
				<header class="panel-heading">
					<h2 class="panel-title">Kategoriler</h2>
				</header>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-bordered table-striped mb-none" id="datatable-details">
							<thead>
								<tr>
									<th class="center">#</th>
									<th class="center" width="200">Başlık</th>
									<th class="center">Yazi Sayisi</th>
									<th class="center">İşlemler</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$kategoriler = $db->prepare("SELECT * FROM kategoriler ORDER BY kategori_id DESC");
								$kategoriler->execute();
								$kategori_cek = $kategoriler->fetchAll(PDO::FETCH_ASSOC);
								$say = $kategoriler->rowCount();

								if($say){
									foreach ($kategori_cek as $row){

										$yazilar = $db->prepare("SELECT * FROM yazilar WHERE yazi_kategori_id=?");
										$yazilar->execute(array($row["kategori_id"]));
										$yazi_cek = $yazilar->fetchAll(PDO::FETCH_ASSOC);
										$say = $yazilar->rowCount();
										?>
										<tr class="gradeX">
											<td class="center"><?php echo $row["kategori_id"]; ?></td>
											<td class="center"><?php echo $row["kategori_baslik"]; ?></td>
											<td class="center"><?php echo $say; ?></td>
											<td class="center">
												<a href="kategori-duzenle.php?kategori_id=<?php echo $row["kategori_id"]; ?>" class="btn btn-primary btn-sm"><span class="fa fa-edit"></span> Düzenle</a>
												<!-- Modal Primary -->
												<a class="btn-sm modal-basic btn btn-danger" href="#modalHeaderColorDanger"><span class="fa fa-trash"></span> Sil</a>

												<div id="modalHeaderColorDanger" class="modal-block modal-header-color modal-block-danger mfp-hide">
													<section class="panel">
														<header class="panel-heading">
															<h2 class="panel-title">Kategori silinsin mi?</h2>
														</header>
														<div class="panel-body">
															<div class="modal-wrapper">
																<div class="modal-icon">
																	<i class="fa fa-question-circle"></i>
																</div>
																<div class="modal-text">
																	<h4>Dikkat!</h4>
																	<p>Kategoriyi silmek istediğinize emin misiniz?</p>
																</div>
															</div>
														</div>
														<footer class="panel-footer">
															<div class="row">
																<div class="col-md-12 text-right">
																	<a href="islem.php?kategorisil_id=<?php echo $row["kategori_id"]; ?>" class="btn btn-danger">Evet!</a>
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
