<!-- header -->
<?php include 'header.php'; ?>
<!-- end: header -->

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
			<div class="content-with-menu-container" data-mailbox="" data-mailbox-view="folder">
				<div class="inner-menu-toggle">
					<a href="#" class="inner-menu-expand" data-open="inner-menu">
						Show Menu <i class="fa fa-chevron-right"></i>
					</a>
				</div>

				<div class="inner-body mailbox-folder">
					<!-- START: .mailbox-header -->
					<header class="mailbox-header">
						<div class="row">
							<?php
							if($_GET["mesaj_sil"]=="yes"){
								?>
								<div class="alert alert-success">
									<strong>Tebrikler!</strong> Silme şleminiz başarıyla gerçekleştirildi...
								</div>
								<?php
							}elseif($_GET["mesaj_sil"]=="no"){
								?>
								<div class="alert alert-danger">
									<!-- Demo modda değişiklik yapamazsınız. -->
									<strong>Hata!</strong>  Silme işleminiz gerçekleştirilirken bir hata oluştu...
								</div>
								<?php } ?>
								<!-- END GERİ DÖNÜŞ UYARILARI -->
								<div class="col-sm-12">
									<h1 class="mailbox-title text-weight-light m-none">
										<a id="mailboxToggleSidebar" class="sidebar-toggle-btn trigger-toggle-sidebar">
											<span class="line"></span>
											<span class="line"></span>
											<span class="line"></span>
											<span class="line line-angle1"></span>
											<span class="line line-angle2"></span>
										</a>

										GELEN KUTUSU
									</h1>
								</div>
							</div>
						</header>
						<!-- END: .mailbox-header -->

						<!-- START: .mailbox-actions -->
								<!-- <div class="mailbox-actions">
									<ul class="list-unstyled m-none pt-lg pb-lg">
										<li class="ib mr-sm">
											<a class="item-action fa fa-refresh" href="mesajlar.php"></a>
										</li>
									</ul>
								</div> -->
								<!-- END: .mailbox-actions -->

								<div id="mailbox-email-list" class="mailbox-email-list">
									<div class="nano has-scrollbar">
										<div class="nano-content" tabindex="0" style="right: -17px;">
											<ul id="" class="list-unstyled">
												<?php
												$mesajlar = $db->prepare("SELECT * FROM mesajlar ORDER BY mesaj_id DESC");
												$mesajlar->execute();
												$mesaj_cek = $mesajlar->fetchAll(PDO::FETCH_ASSOC);
												$say = $mesajlar->rowCount();

												if($say){
													foreach ($mesaj_cek as $row){ ?>
														<li class="unread">
															
																<div class="col-sender">
																	<a href="islem.php?mesajsil_id=<?php echo $row["mesaj_id"]; ?>" class="btn btn-danger btn-sm">
																		<i class="fa fa-trash" style="color: white;"></i>
																	</a>
																	<a href="mesaj-oku.php?mesaj_id=<?php echo $row["mesaj_id"]; ?>"><p class="m-none ib"><?php echo $row["mesaj_gonderenisim"]; ?></p></a>
																</div>
																<div class="col-mail">
																	<p class="m-none mail-content">
																		<span class="subject"><?php echo $row["mesaj_konu"]; ?> - </span>
																		<?php if ($row["mesaj_okunma"]==1) { ?>
																			<span class="subject" style="color: lightgreen;">Okundu!</span>
																			<?php }else{ ?>
																				<span class="subject" style="color: darkred;">okunmadı!</span>
																				<?php } ?>
																			</p>
																			<p class="m-none mail-date" style="padding-left: 0;"><?php echo SaatliTarih($row["mesaj_tarih"]); ?></p>
																		</div>
																		
																</li>
																<?php } } ?>
															</ul>
														</div>
														<div class="nano-pane" style="opacity: 1; visibility: visible;"><div class="nano-slider" style="height: 20px; transform: translate(0px, 0px);"></div></div></div>
													</div>
												</div>
											</div>
										</section>
										<!-- end: page -->
									</section>
								</div>



								<!-- footer -->
								<?php include 'footer.php'; ?>