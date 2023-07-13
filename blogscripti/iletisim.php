<!-- <header> -->
<?php require_once 'header.php'; ?>
<!-- </header> -->

<div id="columns" class="container">

	<!-- Column 1 -->
	<div id="column-1">
		<!-- <div class="page-subject"></div> -->
		<div class="page-cont box-shadow">
		<div id="page">
		<form action="" method="post" id="mesajForm" onsubmit="return false;">
			<p class="cont">Lütfen aşağıdaki alanları eksiksiz doldurunuz.</p>
			<div class="fieldset">
				<input type="text" name="isim" placeholder="Adınız Soyadınız"/>
			</div>
			<div class="fieldset">
				<input type="text" name="mail" placeholder="Email Adresiniz"/>
			</div>
			<div class="fieldset">
				<input type="text" name="konu" placeholder="Mesaj Konusu"/>
			</div>
			<div style="clear:both;"></div>
			<div class="fieldset-textarea">
				<textarea name="mesaj" rows="10" placeholder="Mesajınız..."></textarea>
			</div>
			<button type="submit" class="submit" onclick="mesajGonder();" style="float:right; margin-right:3%; margin-top:3%; margin-bottom:5%;">Gönder</button>
		</form>
		</div>
		</div>
		<div style="clear:both;"></div>
	</div>
	<!-- Column 1 END -->

	<script>
                    function mesajGonder() {
                        var degerler = $("#mesajForm").serialize();

                        $.ajax({
                            type : "POST",
                            url  : "mesajgonder.php",
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

	<!-- Column 2 -->
	<?php require_once 'sag.php'; ?>
	<!-- Column 2 END -->

	<div style="clear:both;"></div>
</div>

<!--<footer> -->
<?php require_once "footer.php"; ?>
<!--</footer>  -->
