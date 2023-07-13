<!-- header -->
<?php include 'header.php'; ?>
<!-- end: header -->

<div class="inner-wrapper">

	<!-- start: sidebar -->
	<?php include 'sidebar.php'; ?>
	<!-- end: sidebar -->

	<section role="main" class="content-body">
		<header class="page-header">
			<h2>Yorumlar</h2>

			<div class="right-wrapper pull-right">
				<ol class="breadcrumbs">
					<li>
						<a href="index.php">
							<i class="fa fa-home"></i>
						</a>
					</li>
					<li><span>Yorumlar</span></li>
				</ol>
				<br>
				<br>
			</div>
		</header>

		<!-- start: page -->
		<!-- GERİ DÖNÜŞ UYARILARI -->
		<?php
		if ($_GET["yorum_guncelle"]=="bos"){
			?>
			<div class="alert alert-warning">
				<strong>Dikkat!</strong>  Lütfen boş alan bırakmayınız...
			</div>
			<?php
		}else if($_GET["yorum_guncelle"]=="yes"){
			?>
			<div class="alert alert-success">
				<strong>Tebrikler!</strong> Güncelleme işleminiz başarıyla gerçekleştirildi...
			</div>
			<?php
		}else if($_GET["yorum_guncelle"]=="no"){
			?>
			<div class="alert alert-danger">
				<!-- Demo modda değişiklik yapamazsınız. -->
				<strong>Hata!</strong>  Güncelleme işleminiz gerçekleştirilirken bir hata oluştu...
			</div>
			<?php
		}elseif($_GET["yorum_cevapla"]=="bos"){
			?>
			<div class="alert alert-warning">
				<strong>Dikkat!</strong>  Lütfen boş alan bırakmayınız...
			</div>
			<?php
		}elseif($_GET["yorum_cevapla"]=="yes"){
			?>
			<div class="alert alert-success">
				<strong>Tebrikler!</strong> Ekleme işleminiz başarıyla gerçekleştirildi...
			</div>
			<?php
		}elseif($_GET["yorum_cevapla"]=="no"){
			?>
			<div class="alert alert-danger">
				<!-- Demo modda değişiklik yapamazsınız. -->
				<strong>Hata!</strong>  Ekleme işleminiz gerçekleştirilirken bir hata oluştu...
			</div>
			<?php
		}elseif($_GET["yorum_sil"]=="yes"){
			?>
			<div class="alert alert-success">
				<strong>Tebrikler!</strong> Silme şleminiz başarıyla gerçekleştirildi...
			</div>
			<?php
		}elseif($_GET["yorum_sil"]=="no"){
			?>
			<div class="alert alert-danger">
				<!-- Demo modda değişiklik yapamazsınız. -->
				<strong>Hata!</strong>  Silme işleminiz gerçekleştirilirken bir hata oluştu...
			</div>
			<?php } ?>
			<!-- END GERİ DÖNÜŞ UYARILARI -->

			<section class="panel" style="margin: 0;">
				<header class="panel-heading">
					<h2 class="panel-title">Yorumlar</h2>
				</header>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-bordered table-striped mb-none" id="datatable-details">
							<thead>
								<tr>
									<th class="center">#</th>
									<th class="center" width="150">Başlık</th>
									<th class="center">Konu</th>
									<th class="center">Tarih</th>
									<th class="center">Durum</th>
									<th class="center">İşlemler</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$yorumlar = $db->prepare("SELECT * FROM yorumlar 
									INNER JOIN yazilar ON yazilar.yazi_id = yorumlar.yorum_yazi_id
									WHERE yorum_ust=? ORDER BY yorum_id DESC");
								$yorumlar->execute(array(0));
								$yorum_cek = $yorumlar->fetchAll(PDO::FETCH_ASSOC);
								$say = $yorumlar->rowCount();

								if($say){
									foreach ($yorum_cek as $row){ ?>
									<tr class="gradeX">
										<td class="center"><?php echo $row["yorum_id"]; ?></td>
										<td class="center"><?php echo $row["yorum_ekleyen"]; ?></td>
										<td class="center"><?php echo $row["yazi_baslik"]; ?></td>
										<td class="center"><?php echo Tarih($row["yorum_tarih"]); ?></td>
										<td class="center">
											<?php if ($row["yorum_durum"]==1) {
												echo "<span class='fa fa-check-circle text-success'></span>";
											}else{
												echo "<span class='fa fa-times-circle text-danger'></span>";
											} ?>
										</td>
										<td class="center">
											
												<?php 
												if ($row["yorum_cevap"]==0) {
													echo '<a class="btn btn-success btn-sm" href="yorum-cevapla.php?yorum_id='.$row["yorum_id"].'"><span class="fa fa-edit"></span> Cevapla</a>';
												}else{
													echo '<span class="btn btn-danger btn-sm">Cevaplandı</span>';
												}
												?>
												
											
											<a class="btn btn-primary btn-sm" href="yorum-duzenle.php?yorum_id=<?php echo $row["yorum_id"]; ?>"><span class="fa fa-edit"></span> Düzenle</a>
											<!-- Modal Primary -->
											<a class="btn btn-danger btn-sm" href="islem.php?yorumsil_id=<?php echo $row["yorum_id"]; ?>"><span class="fa fa-trash"></span> Sil</a>

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