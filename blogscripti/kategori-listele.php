<!-- <header> -->
	<?php require_once 'header.php'; ?>
	<!-- </header> -->
	<?php
	$kategori_url = $_GET["kategori_url"];
	$kategoriler = $db->prepare("SELECT * FROM kategoriler WHERE kategori_url=?");
	$kategoriler->execute(array($kategori_url));
	$kategoricek = $kategoriler->fetch(PDO::FETCH_ASSOC);
	?>

	<div id="columns" class="container">
		<!-- Column 1 -->
		<div id="column-1">
			<div class="page-subject" style="margin-bottom: 10px;">
				<?php echo $kategoricek["kategori_baslik"]; ?>
			</div>

			<?php

			$sayfa = intval($_GET["sayfa"]); if (!$sayfa || $sayfa < 1) {$sayfa=1;}
			$say   = $db->query("SELECT * FROM yazilar WHERE yazi_kategori_id=".$kategoricek["kategori_id"]);
			$ToplamVeri = $say->rowCount();
			$limit = 2;
			$sayfasayisi = ceil($ToplamVeri/$limit); if ($sayfa > $sayfasayisi) {$sayfa = $sayfasayisi;}
			$goster = $sayfa * $limit - $limit;
			$gorunensayfa = 2;


			$yazilar = $db->prepare("SELECT * FROM yazilar
				INNER JOIN kategoriler ON kategoriler.kategori_id = yazilar.yazi_kategori_id
				WHERE yazi_kategori_id=? ORDER BY yazi_id DESC LIMIT $goster,$limit");
			$yazilar->execute(array($kategoricek["kategori_id"]));
			$yazicek = $yazilar->fetchALL(PDO::FETCH_ASSOC);
			$say = $yazilar->rowCount();

			if ($say) {
				foreach ($yazicek as $row) {
	  	// yorumlar
					$yorumlar = $db->prepare("SELECT * FROM yorumlar WHERE yorum_yazi_id=? AND yorum_durum=?");
					$yorumlar->execute(array($row["yazi_id"],1));
					$yorumlar->fetchALL(PDO::FETCH_ASSOC);
					$yorum_say = $yorumlar->rowCount();
					?>
					<div class="post-column">
						<a href="yazilar/<?php echo $row['yazi_seflink']; ?>" title="<?php echo $row["yazi_baslik"]; ?>">
							<img src="img/yazilar/<?php echo $row["yazi_foto"]; ?>" alt="<?php echo $row["yazi_baslik"]; ?>"/>
						</a>
						<div class="post-column-bottom">
							<h1><a href="yazilar/<?php echo $row['yazi_seflink']; ?>" title="<?php echo $row["yazi_baslik"]; ?>"><?php echo $row["yazi_baslik"]; ?></a></h1>
							<div class="post-column-meta">
								<span><a href="kategori/<?php echo seoLink($row['kategori_baslik'])."/".$row['kategori_id']; ?>" title="<?php echo $row["kategori_baslik"]; ?>"><i class="mdi mdi-pound-box"></i> <?php echo $row["kategori_baslik"]; ?></a></span>
								<span><i class="mdi mdi-calendar-clock"></i> <?php echo SaatliTarih($row["yazi_tarih"]); ?></span>
								<span><i class="mdi mdi-comment"></i> <?php echo $yorum_say; ?> Yorum </span>
								<span style="border:0;"><i class="mdi mdi-eye"></i> <?php echo K($row["yazi_okunma"]); ?> kez okundu!</span>
							</div>
						</div>
					</div>


				<?php } }else{
					echo "<hr style='width: 900px;'><span class='mdi mdi-alert'></span> <i> Bu kategoride yazı bulunmamaktadır! </i><br><br>";
				} ?>
				<div style="clear:both;"></div>
				<?php
				$yazilar = $db->prepare("SELECT * FROM yazilar WHERE yazi_kategori_id=?");
				$yazilar->execute(array($kategoricek["kategori_id"]));
				$yazicek = $yazilar->fetchALL(PDO::FETCH_ASSOC);
				$say = $yazilar->rowCount();
				if ($say > 0) { ?>
					<div id="page-numbers" class="box-shadow">
						<ul>
							<?php if ($sayfa > 1) { ?>
								<li><a href="kategori/<?php echo $kategori_url ?>/sayfa/1">İlk</a></li>
								<li><a href="kategori/<?php echo $kategori_url ?>/sayfa/<?php echo $sayfa - 1 ?>">Önceki</a></li>
							<?php } ?>

							<?php
							for ($i=$sayfa - $gorunensayfa; $i < $sayfa + $gorunensayfa +1; $i++) {
								if ($i > 0 and $i <= $sayfasayisi) {
									if ($i == $sayfa) {
										echo '<li><a style="background-color: #42ade7; color: white;">'.$i.'</a></li>';
									}else{
										echo '<li><a href="kategori/'.$kategori_url.'/sayfa/'.$i.'">'.$i.'</a></li>';
									}
								}
							}
							?>

							<?php if ($sayfa != $sayfasayisi) { ?>
								<li><a href="kategori/<?php echo $kategori_url ?>/sayfa/<?php echo $sayfa + 1 ?>">Sonraki ></a></li>
								<li><a href="kategori/<?php echo $kategori_url ?>/sayfa/<?php echo $sayfasayisi ?>">Son >></a></li>
							<?php } ?>

						</ul>
						<div style="clear:both;"></div>
					</div>
				<?php }else{ null; } ?>
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
