<!-- <header> -->
	<?php require_once 'header.php';

	$ara = strip_tags($_GET["ara"]); ?>
	<!-- </header> -->



	<div id="columns" class="container">
		<!-- Column 1 -->
		<div id="column-1">
			<div class="page-subject" style="margin-bottom: 0;">
				<i style="color: #42ade7;"><?php echo $ara; ?></i> ile ilgili sonuçlar...

			</div>
			<br>
			<?php

			$sayfa = intval($_GET["sayfa"]); if (!$sayfa || $sayfa < 1) {$sayfa=1;}
  $say   = $db->query("SELECT * FROM yazilar WHERE yazi_baslik LIKE '%{$ara}%'");
  $ToplamVeri = $say->rowCount();
  $limit = 2;
  $sayfasayisi = ceil($ToplamVeri/$limit); if ($sayfa > $sayfasayisi) {$sayfa = $sayfasayisi;}
  $goster = $sayfa * $limit - $limit;
  $gorunensayfa = 5;

			$yazilar = $db->prepare("SELECT * FROM yazilar
				INNER JOIN kategoriler ON kategoriler.kategori_id = yazilar.yazi_kategori_id
				WHERE yazi_baslik LIKE ? ORDER BY yazi_id DESC LIMIT $goster,$limit");
			$yazilar->execute(array('%'.$ara.'%'));
			$yazi_cek = $yazilar->fetchALL(PDO::FETCH_ASSOC);
			$say = $yazilar->rowCount();
			
			if ($say) {
				foreach ($yazi_cek as $row) { 
					// yorumlar
					$yorumlar = $db->prepare("SELECT * FROM yorumlar WHERE yorum_yazi_id=? AND yorum_durum=?");
					$yorumlar->execute(array($row["yazi_id"],1));
					$yorumlar->fetchALL(PDO::FETCH_ASSOC);
					$yorum_say = $yorumlar->rowCount();
					?>
					<div class="post-column">
						<a href="detay.php?yazi_id=<?php echo $row["yazi_id"]; ?>" title="<?php echo $row["yazi_baslik"]; ?>">
							<img src="img/yazilar/<?php echo $row["yazi_foto"]; ?>" alt="<?php echo $row["yazi_baslik"]; ?>"/>
						</a>
						<div class="post-column-bottom">
							<h1><a href="detay.php?yazi_id=<?php echo $row["yazi_id"]; ?>" title="<?php echo $row["yazi_baslik"]; ?>"><?php echo $row["yazi_baslik"]; ?></a></h1>
							<div class="post-column-meta">
								<span><a href="kategori-listele.php?kategori_id=<?php echo $row["kategori_id"]; ?>" title="<?php echo $row["kategori_baslik"]; ?>"><i class="mdi mdi-pound-box"></i> <?php echo $row["kategori_baslik"]; ?></a></span>
								<span><i class="mdi mdi-calendar-clock"></i> <?php echo SaatliTarih($row["yazi_tarih"]); ?></span>
								<span><i class="mdi mdi-comment"></i> <?php echo $yorum_say; ?> Yorum </span>
								<span style="border:0;"><i class="mdi mdi-eye"></i> <?php echo K($row["yazi_okunma"]); ?> </span>
							</div>
						</div>
					</div>


				<?php }
			}else{
				echo "<hr style='width: 900px;'><span class='mdi mdi-alert'></span> <i> Aradığınız kelime ilgili bir veri bulunamadı! Lütfen tekrar deneyiniz... </i><br><br>";
			}?>
			<div style="clear:both;"></div>
			<div id="page-numbers" class="box-shadow">
				<ul>
					<?php if ($sayfa > 1) { ?>
						<li><a href="arama/<?php echo $ara ?>/sayfa/<?php echo $ara; ?>&sayfa=1">İlk</a></li>
						<li><a href="arama/<?php echo $ara ?>/sayfa/<?php echo $sayfa - 1 ?>">Önceki</a></li>
					<?php } ?>

					<?php
					for ($i=$sayfa - $gorunensayfa; $i < $sayfa + $gorunensayfa +1; $i++) {
						if ($i > 0 and $i <= $sayfasayisi) {
							if ($i == $sayfa) {
								echo '<li><a style="background-color: #42ade7; color: white;">'.$i.'</a></li>';
							}else{
								echo '<li><a href="arama/'.$ara.'/sayfa/'.$i.'">'.$i.'</a></li>';
							}
						}
					}
					?>

					<?php if ($sayfa != $sayfasayisi) { ?>
						<li><a href="arama/<?php echo $ara ?>/sayfa/<?php echo $sayfa + 1 ?>">Sonraki</a></li>
						<li><a href="arama/<?php echo $ara ?>/sayfa/<?php echo $sayfasayisi ?>">Son</a></li>
					<?php } ?>

				</ul>
				<div style="clear:both;"></div>
			</div>
		</div>
		<!-- Column 1 END -->

		<!-- Column 2 -->
		<?php require_once 'sag.php'; ?>
		<!-- Column 2 END -->

		<div style="clear:both;"></div>
	</div>

	<!--<footer> -->
		<?php require_once "footer.php"; ?>
		<!--</footer>  -->
