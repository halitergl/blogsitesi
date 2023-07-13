<!-- header -->
<?php include 'header.php'; ?>
<!-- end: header -->

<div class="inner-wrapper">

	<!-- start: sidebar -->
	<?php include 'sidebar.php'; ?>
	<!-- end: sidebar -->

	<section role="main" class="content-body">
		<header class="page-header">
			<h2>Cevaplar</h2>

			<div class="right-wrapper pull-right">
				<ol class="breadcrumbs">
					<li>
						<a href="index.php">
							<i class="fa fa-home"></i>
						</a>
					</li>
					<li><span>Cevaplar</span></li>
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
					<h2 class="panel-title">Cevaplar</h2>
				</header>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-bordered table-striped mb-none" id="datatable-details">
							<thead>
								<tr>
									<th class="center">#</th>
									<th class="center" width="150">Ekleyen</th>
									<th class="center">Konu</th>
									<th class="center">Tarih</th>
									<th class="center">İşlemler</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$yorumlar = $db->prepare("SELECT * FROM yorumlar
									INNER JOIN yazilar ON yazilar.yazi_id = yorumlar.yorum_yazi_id
									WHERE yorum_ust !=0 ORDER BY yorum_id DESC");
								$yorumlar->execute(array());
								$yorum_cek = $yorumlar->fetchAll(PDO::FETCH_ASSOC);
								$say = $yorumlar->rowCount();

								if($say){
									foreach ($yorum_cek as $row){ ?>
									<tr class="gradeX">
										<td class="center"><?php echo $row["yorum_id"]; ?></td>
										<td class="center"><?php echo $row["yorum_ekleyen"]; ?></td>
										<td class="center">
											<a href="../yazilar/<?php echo seoLink($row['yazi_baslik'])."/".$row['yazi_id']; ?>" target="_blank">
												<?php echo $row["yazi_baslik"]; ?>
											</a>
										</td>
										<td class="center"><?php echo Tarih($row["yorum_tarih"]); ?></td>
										<td class="center">

											<a class="btn btn-primary btn-sm" href="yorum-duzenle.php?yorum_id=<?php echo $row["yorum_id"]; ?>"><span class="fa fa-edit"></span> Düzenle</a>
											<!-- Modal Primary -->
											<a class="btn-sm modal-basic btn btn-danger" href="#modalHeaderColorDanger"><span class="fa fa-trash"></span> Sil</a>

											<div id="modalHeaderColorDanger" class="modal-block modal-header-color modal-block-danger mfp-hide">
												<section class="panel">
													<header class="panel-heading">
														<h2 class="panel-title">Yorum silinsin mi?</h2>
													</header>
													<div class="panel-body">
														<div class="modal-wrapper">
															<div class="modal-icon">
																<i class="fa fa-question-circle"></i>
															</div>
															<div class="modal-text">
																<h4>Dikkat!</h4>
																<p>Yorumu silmek istediğinize emin misiniz?</p>
															</div>
														</div>
													</div>
													<footer class="panel-footer">
														<div class="row">
															<div class="col-md-12 text-right">
																<a href="islem.php?yorumsil_id=<?php echo $row["yorum_id"]; ?>" class="btn btn-danger">Evet!</a>
																<button class="btn btn-default modal-dismiss">İptal!</button>
															</div>
														</div>
													</footer>
												</section>
											</div>
										</td>
									</tr>
									<?php } }else{
										echo "<td colspan='7'> ☺ Hiç yorum yapılmamış!</td>";
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
