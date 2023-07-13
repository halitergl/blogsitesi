<?php
date_default_timezone_set('Europe/Istanbul');
setlocale(LC_TIME,"turkish");


//SAATSİZ TURKCE TARİH FONKSIYONU
function Tarih($deger) {
 echo iconv('latin5','utf-8',strftime(' %d %B %Y',strtotime($deger)));
}

//SAATLİ TURKCE TARİH FONKSIYONU
function SaatliTarih($deger) {
 echo iconv('latin5','utf-8',strftime(' %d %B %Y %H:%M',strtotime($deger)));
}

//K lı Yazdırma Fonksiyonu
function K($sayi){
	if($sayi<=999){
		return $sayi;
	}elseif($sayi>=1000 and $sayi<=9999){
    return substr($sayi,0,1) . "k";
  } elseif($sayi>9999 and $sayi < 99999){
    return substr($sayi,0,2) . "k";
  } elseif($sayi>99999){
    return substr($sayi,0,3) . "k";
  }
}


function kategoriIDGetir($kateogri_url){
    Global $db;
    $veri = $db->prepare("SELECT * FROM kategoriler WHERE kategori_url='$kateogri_url'");
    $veri->execute(array());
    $v = $veri->fetch(PDO::FETCH_ASSOC);
    return $v['kategori_id'];
}
