<!-- header -->
<?php include 'header.php'; ?>
<!-- end: header -->

<?php
$mesaj_id=$_GET["mesaj_id"];
$mesajlar = $db->prepare("SELECT * FROM mesajlar WHERE mesaj_id=?");
$mesajlar->execute(array($mesaj_id));
$mesaj_cek = $mesajlar->fetch(PDO::FETCH_ASSOC);

$say = $mesajlar->rowCount();

if ($say) {
	$mesajlar = $db->prepare("UPDATE mesajlar SET mesaj_okunma=? WHERE mesaj_id=?");
	$mesajlar->execute(array(1,$mesaj_id));
}



?>

<head>
	
	<link href="../css/swal.css" media="all" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="../js/swal.min.js"></script>
</head>

<div class="inner-wrapper">
	<!-- start: sidebar -->
	<?php include 'sidebar.php'; ?>
	<!-- end: sidebar -->

	<section role="main" class="content-body">
		<header class="page-header">
			<h2>Mesajlar</h2>

			<div class="right-wrapper pull-right">
				<ol class="breadcrumbs">
					<li>
						<a href="index.html">
							<i class="fa fa-home"></i>
						</a>
					</li>
					<li><span>Mesajlar</span></li>
					<li><span>Mesajları Listele &nbsp; </span></li>
				</ol>

			</div>
		</header>

		<!-- start: page -->
		<section class="content-with-menu mailbox">
			<div class="content-with-menu-container" data-mailbox="" data-mailbox-view="email">
				<div class="inner-menu-toggle">
					<a href="#" class="inner-menu-expand" data-open="inner-menu">
						Show Menu <i class="fa fa-chevron-right"></i>
					</a>
				</div>

				<div class="inner-body mailbox-email">
					<div class="mailbox-email-header mb-lg">
						<h3 class="mailbox-email-subject m-none text-weight-light">
							<?php echo $mesaj_cek["mesaj_gonderenisim"]; ?>
						</h3>

						<p class="mt-lg mb-none text-md">E-Mail : <a href="#"><?php echo $mesaj_cek["mesaj_gonderenmail"]; ?></a> , Tarih : <?php echo SaatliTarih($mesaj_cek["mesaj_tarih"]); ?></p>
					</div>
					<div class="mailbox-email-container">
						<div class="mailbox-email-screen">

							<div class="panel">
								<div class="panel-body">
									<p><?php echo $mesaj_cek["mesaj_aciklama"]; ?></p>
								</div>
							</div>



							<div class="compose">
								<h3>Cevapla (<?php echo $mesaj_cek["mesaj_gonderenmail"]; ?>)</h3>
								<form action="" method="POST" id="mesajForm" onsubmit="return false;">
									<input type="hidden" name="gonderen" value="MustafaKartal.com Admin">
									<input type="hidden" name="gonderilenmail" value="<?php echo $mesaj_cek["mesaj_gonderenmail"]; ?>">
									<textarea name="mesaj" class="ckeditor"></textarea>

									<div class="text-right mt-md">
										<button type="submit" onclick="mesajCevapla();" class="btn btn-primary">
											<i class="fa fa-send mr-xs"></i>
											Gönder
										</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- end: page -->
		</section>
	</div>

</section>



<script>
	function mesajCevapla() {
		var degerler = $("#mesajForm").serialize();

		$.ajax({
			type : "POST",
			url  : "mesajcevapla.php",
			data : degerler,
			success: function (sonuc) {
				if(sonuc == "bos"){
					swal("Dikkat!","Lütfen boş alan bırakmayınız!","warning");
				}else if(sonuc == "no"){
					swal("Hata!","Mesaj gönderilirken bir hata oluştu!","error");
				}else if(sonuc == "yes"){
					swal({
						title : "Tebrikler!",
						text  : "Mesajınız başarıyla gönderildi!",
						type  : "success",
						html  : true,
						timer : 2000},
						function () {
							location.reload();
						});
				}
			}
		});
	}
</script>


<!-- footer -->
<?php include 'footer.php'; ?>