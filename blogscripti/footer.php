<footer>
	<div class="container" id="footer-top">
		<div class="footer-nav">
			<h4>Sponsorlar</h4>
			<?php
			$sponsorlar = $db->prepare("SELECT * FROM sponsorlar ORDER BY sponsor_id DESC LIMIT 4");
			$sponsorlar->execute(array(1));
			$sponsorcek = $sponsorlar->fetchALL(PDO::FETCH_ASSOC);

			foreach ($sponsorcek as $row) { ?>
			<div class="footer-sponsor">
				<img src="img/sponsorlar/<?php echo $row["sponsor_resim"]; ?>" title="<?php echo $row["sponsor_adi"]; ?>" width="125px" height="125px" alt="<?php echo $row["sponsor_adi"]; ?>"/>
			</div>
			<?php } ?>
		</div>

		<div class="footer-nav" id="pop">
			<h4>En Popüler Yazılar</h4>
			<ul class="footer">
				<?php
				$yazilar = $db->prepare("SELECT * FROM yazilar ORDER BY yazi_okunma DESC LIMIT 4");
			  $yazilar->execute(array());
			  $yazicek = $yazilar->fetchALL(PDO::FETCH_ASSOC);

			  foreach ($yazicek as $row) { ?>
				<li>
					<a href="#" class="left"><img src="img/yazilar/<?php echo $row["yazi_foto"]; ?>" alt="Fashion"></a>
					<div class="footer-nav-item">
						<a href="#"><?php echo $row["yazi_baslik"]; ?></a>
						<p><?php echo Tarih($row["yazi_tarih"]); ?></p>
					</div>
					<div style="clear:both;"></div>
				</li>
			<?php } ?>
			</ul>
		</div>

		<div class="footer-nav">
			<h4>Son Eklenen Yazılar</h4>
						<ul class="footer">
							<?php

							$yazilar = $db->prepare("SELECT * FROM yazilar ORDER BY yazi_id DESC LIMIT 4");
						  $yazilar->execute(array());
						  $yazicek = $yazilar->fetchALL(PDO::FETCH_ASSOC);

						  foreach ($yazicek as $row) { ?>
							<li>
								<a href="#" class="left"><img src="img/yazilar/<?php echo $row["yazi_foto"]; ?>" alt="Fashion"></a>
								<div class="footer-nav-item">
									<a href="#"><?php echo $row["yazi_baslik"]; ?></a>
									<p><?php echo Tarih($row["yazi_tarih"]); ?></p>
								</div>
								<div style="clear:both;"></div>
							</li>
						<?php } ?>

			</ul>
		</div>
	</div>
</footer>
<!-- Footer  END -->
<!-- Copyright -->
<div id="copyright">
<div class="container">
	<div id="design">
		Tasarım & Kodlama : <a href="index.php">Mustafa Kartal</a> | Tüm hakları saklıdır.
	</div>
	<nav>
		<ul>
			<li><a href="anasayfa" title="Anasayfa">anasayfa</a></li>
			<li><a href="hakkimda" title="Hakkımda">hakkımda</a></li>
			<li><a href="iletisim" title="İletişim">iletisim</a></li>
		</ul>
	</nav>
</div>
</div>
<!-- Copyright End -->
</body>
</html>
