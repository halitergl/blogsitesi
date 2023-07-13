<?php
if ($_POST){

    $adsoyad    = strip_tags($_POST["gonderen"]);
    $eposta     = strip_tags($_POST["gonderilenmail"]);
    $mesaj      = strip_tags($_POST["mesaj"]);

    if(!$adsoyad || !$eposta || !$mesaj){
        echo "bos";
    }else{

        date_default_timezone_set('Europe/Istanbul');
        require("class.phpmailer.php");
        $mail = new PHPMailer();
        $mail->IsSMTP();
                    $mail->SMTPDebug = 1; // Hata ayıklama değişkeni: 1 = hata ve mesaj gösterir, 2 = sadece mesaj gösterir
                    $mail->SMTPAuth = true; //SMTP doğrulama olmalı ve bu değer değişmemeli
                    $mail->SMTPSecure = 'tls'; // Normal bağlantı için tls , güvenli bağlantı için ssl yazın
                    $mail->Host = "smtp.yandex.com"; // Mail sunucusunun adresi (IP de olabilir)
                    $mail->Port = 587; // Normal bağlantı için 587, güvenli bağlantı için 465 yazın
                    $mail->IsHTML(true);
                    $mail->SetLanguage("tr","phpmailer/language");
                    $mail->CharSet  ="utf-8";
                    $mail->Username = "kartalmustafaa@yandex.com"; // Gönderici adresinizin sunucudaki kullanıcı adı (e-posta adresiniz)
                    $mail->Password = "kartal61"; // Mail adresimizin sifresi
                    $mail->SetFrom("kartalmustafaa@yandex.com", $adsoyad); // Mail atıldığında gorulecek isim ve email (genelde yukarıdaki username kullanılır)
                    $mail->AddAddress($eposta); // Mailin gönderileceği alıcı adres
                    $mail->Subject = $adsoyad."'dan Mesaj"; // Email konu başlığı
                    $mail->Body = "<div>
                    <p><b>Gönderen İsim : </b>".$adsoyad."</p>
                    <p><b>Mesaj İçerği : </b><br>".$mesaj."</p>
                    <hr>
                    <small>Not = Bu maile geri dönüş yapmayınız! Cevap verilmeyecektir.</small>
                    </div>"; // Mailin içeriği
                    if(!$mail->Send()){
                        echo "Email Gönderim Hatasi: ".$mail->ErrorInfo;
                    } else {
                        //echo "Email Gonderildi";
                    }

                    echo "yes";
                }
            }
