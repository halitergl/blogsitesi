<!-- <header> -->
	<?php require_once 'header.php'; ?>
	<!-- </header> -->

	<?php
	$hakkimizda_id = 1;
	$hakkimizda = $db->prepare("SELECT * FROM hakkimizda WHERE hakkimizda_id=?");
	$hakkimizda->execute(array($hakkimizda_id));
	$hakkimizda_cek = $hakkimizda->fetch(PDO::FETCH_ASSOC);

	?>

	<div id="columns" class="container">

		<!-- Column 1 -->
		<div id="column-1">
			<!-- <div class="page-subject"> HAKKIMDA </div> -->
			<div class="page-cont box-shadow">
				<div id="hakkimda" style="text-align:center;">
					<img src="img/<?php echo $hakkimizda_cek["hakkimizda_fotograf"]; ?>" alt="musty" width="100%" height="400px"/>
					<br>
					<br>
					<?php echo $hakkimizda_cek["hakkimizda_aciklama"]; ?>
					<ul style="margin-top: 20px;">

						<a style="text-decoration:none; color: white;" href="<?php echo $ayarcek["site_facebook"]; ?>" target="_blank">
							<li style="border: 1px solid #4267b2; padding: 10px; background-color: #4267b2; margin-top: 10px;">Facebook</li>
						</a>

						<a style="text-decoration:none; color: white;;" href="<?php echo $ayarcek["site_google"]; ?>" target="_blank">
							<li style="border: 1px solid darkorange; padding: 10px; background-color: darkorange;  margin-top: 10px;">Google</li>
						</a>

						<a style="text-decoration:none; color: white;" href="<?php echo $ayarcek["site_facebook"]; ?>" target="_blank">
							<li style="border: 1px solid #ff0019; padding: 10px; background-color: #ff0019; margin-top: 10px;">Youtube</li>
						</a>

						<a style="text-decoration:none; color: white;;" href="<?php echo $ayarcek["site_instagram"]; ?>" target="_blank">
							<li style="border: 1px solid #d10869; padding: 10px; background-color: #d10869;  margin-top: 10px;">Instagram</li>
						</a>

					</ul>
				</div>
			</div>
			<div style="clear:both;"></div>
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
