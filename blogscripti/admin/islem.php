<?php
/**
 * Created by PhpStorm.
 * User: Musty
 * Date: 3.03.2018
 * Time: 09:05
 */

include "../sistem/veritabani-baglantisi.php";
include "../sistem/seourl.php";

// SITE AYARLARI
extract($_POST);
if(isset($ayarlar)){

    $site_id = $_GET["site_id"];

    if (!$site_title || !$site_url || !$site_desc || !$site_keyw || !$site_telefon || !$site_mail || !$site_saat || !$site_adres || !$site_footer || !$site_harita){
        header("Location: site-ayarlari.php?site-guncelle=bos");
    }else{
        $query = $db->prepare("UPDATE ayarla SET site_title=?, site_url=?, site_desc=?, site_keyw=?, site_telefon=?, site_mail=?, site_saat=?, site_adres=?, site_footer=?, site_harita=? WHERE site_id=?");
        $update = $query->execute(array($site_title,$site_url,$site_desc,$site_keyw,$site_telefon,$site_mail,$site_saat,$site_adres,$site_footer,$site_harita,$site_id));
        if($update){
            header("Location: site-ayarlari.php?site-guncelle=yes");
        }else{
            header("Location: site-ayarlari.php?site-guncelle=no");
        }
    }
}

// HAKKIMIZDA AYARLARI
extract($_POST);
if(isset($hakkimda_duzenle)){

    $hakkimda_id = $_GET["hakkimda_id"];

    if (!$hakkimda_foto || !$hakkimda_aciklama ){
        header("Location: hakkimizda.php?hakkimda_guncelle=bos");
    }else{
        $query = $db->prepare("UPDATE hakkimda SET hakkimda_foto=?, hakkimda_aciklama=? WHERE hakkimda_id=?");
        $update = $query->execute(array($hakkimda_foto,$hakkimda_aciklama,$hakkimda_id));
        if($update){
            header("Location: hakkimizda.php?hakkimda_guncelle=yes");
        }else{
            header("Location: hakkimizda.php?hakkimda_guncelle=no");
        }
    }
}

## HAKKIMIZDA DÜZENLE
$DosyaTuru = array("image/jpeg","image/jpg","image/png","image/x-png");
$DosyaUzanti = array("jpeg","jpg","png","x-png");
if (isset($_POST["hakkimizda_duzenle"])) {

    $hakkimizda_id = $_GET["hakkimizda_id"];

    $hakkimizda_fotograf    = $_POST["hakkimizda_fotograf"];
    $hakkimizda_aciklama    = $_POST["hakkimizda_aciklama"];

    if ($_FILES["hakkimizda_fotograf"]["size"] > 0){

        $kaynak = $_FILES["hakkimizda_fotograf"]["tmp_name"]; //fotoğrafın geçiçi olarak yüklendiği yer veya isim
        $isim = $_FILES["hakkimizda_fotograf"]["name"]; // fotoğrafın ismi
        $boyut = $_FILES["hakkimizda_fotograf"]["size"]; // fotoğrafın boyutu
        $turu = $_FILES["hakkimizda_fotograf"]["type"]; // fotoğrafın türü

        $uzanti = substr($isim,strpos($isim,".")+1); //noktadan sonraki harften okumaya başla
        $resimAd = substr(uniqid(rand()),0,11)."_".$isim; // Fotoğrafın yeni ismini belirledik
        $hedef = "../img/".$resimAd; // fotoğrafın nereye yukleneceğini belirttik


        if ($kaynak) {
            if (!in_array($turu, $DosyaTuru) && !in_array($uzanti, $DosyaUzanti)) {
                header("Location: hakkimizda.php?hakkimizda_guncelle=gecersizuzanti");
            } elseif ($boyut > 1024 * 1024 * 5) {
                header("Location: hakkimizda.php?hakkimizda_guncelle=buyuk");
            } else {

                // ÖNCEKİ RESMİMİZİ SİLELİM
                $sil = $db->prepare("SELECT * FROM hakkimizda WHERE hakkimizda_id=?");
                $sil->execute(array($hakkimizda_id));
                $eski_resim = $sil->fetch(PDO::FETCH_ASSOC);
                $eski_resim["hakkimizda_fotograf"]; //ESKİ RESMİMİ SİLMEMİZİN GEREKLİ OLAN KOD

                unlink("../img/".$eski_resim["hakkimizda_fotograf"]);


                if (move_uploaded_file($kaynak, $hedef)) {
                    $query = $db->prepare("UPDATE hakkimizda SET hakkimizda_fotograf=?, hakkimizda_aciklama=? WHERE hakkimizda_id=?");
                    $update = $query->execute(array($resimAd,$hakkimizda_aciklama,$hakkimizda_id));
                    if ($update) {
                      header("Location: hakkimizda.php?hakkimizda_guncelle=yes");
                  } else {
                      header("Location: hakkimizda.php?hakkimda_duzenle=no");
                  }
              }
          }
      }
  }else{
      $query = $db->prepare("UPDATE hakkimizda SET hakkimizda_aciklama=? WHERE hakkimizda_id=?");
      $update = $query->execute(array($hakkimizda_aciklama,$hakkimizda_id));
      if ($update) {
        header("Location: hakkimizda.php?hakkimizda_guncelle=yes");
    } else {
        header("Location: hakkimizda.php?hakkimizda_guncelle=no");
    }
}
}


// YORUM CEVAPLA
extract($_POST);
if (isset($_POST["yorum_cevapla"])){

    $yorum_id = $_GET["yorum_id"];

    $query = $db->query("UPDATE yorumlar SET yorum_cevap=1 WHERE yorum_id=".$yorum_id);

    if (!$yorum_ekleyen || !$yorum_eposta || !$yorum_icerik){
        header("Location: yorumlar.php?yorum_ekle=bos");
    }else{
        $query = $db->prepare("INSERT INTO yorumlar SET yorum_ekleyen=?, yorum_eposta=?, yorum_ekleyen_website=?, yorum_icerik=?, yorum_yazi_id=?, yorum_ust=?, yorum_durum=?");
        $insert = $query->execute(array($yorum_ekleyen,$yorum_eposta,$yorum_ekleyen_website,$yorum_icerik,$yorum_yazi_id,$yorum_id,1));

        if ($insert){
            header("Location: yorumlar.php?yorum_cevapla=yes");
        }else{
            header("Location: yorumlar.php?yorum_cevapla=no");
        }
    }

}

// YORUM GÜNCELLE
extract($_POST);
if(isset($yorum_duzenle)){

    $yorum_id = $_GET["yorum_id"];

    if (!$yorum_icerik){
        header("Location: yorumlar.php?yorum_guncelle=bos");
    }else{
        $query = $db->prepare("UPDATE yorumlar SET yorum_icerik=?, yorum_durum=? WHERE yorum_id=?");
        $update = $query->execute(array($yorum_icerik,$yorum_durum,$yorum_id));
        if($update){
            header("Location: yorumlar.php?yorum_guncelle=yes");
        }else{
            header("Location: yorumlar.php?yorum_guncelle=no");
        }
    }
}

//KATEGORİ SİLME İŞLEMİ
extract($_GET);
if(isset($yorumsil_id)){

    $query = $db->prepare("DELETE FROM yorumlar WHERE yorum_id=?");
    $delete = $query->execute(array($yorumsil_id));
    if ($delete) {
        header("Location: yorumlar.php?yorum_sil=yes");
    } else {
        header("Location: yorumlar.php?yorum_sil=no");
    }
}


//MESAJ SİLME İŞLEMİ
extract($_GET);
if(isset($mesajsil_id)){

    $query = $db->prepare("DELETE FROM mesajlar WHERE mesaj_id=?");
    $delete = $query->execute(array($mesajsil_id));
    if ($delete) {
        header("Location: mesajlar.php?mesaj_sil=yes");
    } else {
        header("Location: mesajlar.php?mesaj_sil=no");
    }
}


// SPONSOR EKLE
extract($_POST);
$DosyaTuru = array("image/jpeg","image/jpg","image/png","image/x-png");
$DosyaUzanti = array("jpeg","jpg","png","x-png");
if (isset($sponsor_ekle)){

        $kaynak = $_FILES["sponsor_foto"]["tmp_name"]; //fotoğrafın geçiçi olarak yüklendiği yer veya isim
        $isim = $_FILES["sponsor_foto"]["name"]; // fotoğrafın ismi
        $boyut = $_FILES["sponsor_foto"]["size"]; // fotoğrafın boyutu
        $turu = $_FILES["sponsor_foto"]["type"]; // fotoğrafın türü

        $uzanti = substr($isim,strpos($isim,".")+1); //noktadan sonraki harften okumaya başla
        $resimAd = substr(uniqid(rand()),0,11)."_".$isim; // Fotoğrafın yeni ismini belirledik
        $hedef = "../img/sponsorlar/".$resimAd; // fotoğrafın nereye yukleneceğini belirttik

        if (!$_FILES["sponsor_foto"]["size"] > 0 || !$sponsor_link){
            header("Location: sponsorlar.php?sponsor_ekle=bos");
        }else {
            if ($kaynak) {
                if (!in_array($turu, $DosyaTuru) && !in_array($uzanti, $DosyaUzanti)) {
                    header("Location: sponsorlar.php?sponsor_ekle=gecersizuzanti");
                } elseif ($boyut > 1024 * 1024) {
                    header("Location: sponsorlar.php?sponsor_ekle=buyuk");
                } else {
                    if (move_uploaded_file($kaynak, $hedef)) {
                        $query = $db->prepare("INSERT INTO sponsorlar SET sponsor_resim=?, sponsor_link=?");
                        $insert = $query->execute(array($resimAd, $sponsor_link));
                        if ($insert) {
                            header("Location: sponsorlar.php?sponsor_ekle=yes");
                        } else {
                            header("Location: sponsorlar.php?sponsor_ekle=no");
                        }
                    }
                }
            }
        }
    }



//SPONSOR GÜNCELLE
    extract($_POST);
    $DosyaTuru = array("image/jpeg","image/jpg","image/png","image/x-png");
    $DosyaUzanti = array("jpeg","jpg","png","x-png");
    if (isset($sponsor_duzenle)){
        $sponsor_id = $_GET["sponsor_id"];

        if ($_FILES["sponsor_foto"]["size"] > 0){

        $kaynak = $_FILES["sponsor_foto"]["tmp_name"]; //fotoğrafın geçiçi olarak yüklendiği yer veya isim
        $isim = $_FILES["sponsor_foto"]["name"]; // fotoğrafın ismi
        $boyut = $_FILES["sponsor_foto"]["size"]; // fotoğrafın boyutu
        $turu = $_FILES["sponsor_foto"]["type"]; // fotoğrafın türü

        $uzanti = substr($isim,strpos($isim,".")+1); //noktadan sonraki harften okumaya başla
        $resimAd = substr(uniqid(rand()),0,11)."_".$isim; // Fotoğrafın yeni ismini belirledik
        $hedef = "../img/sponsorlar/".$resimAd; // fotoğrafın nereye yukleneceğini belirttik


        if ($kaynak) {
            if (!in_array($turu, $DosyaTuru) && !in_array($uzanti, $DosyaUzanti)) {
                header("Location: sponsorlar.php?sponsor_duzenle=gecersizuzanti");
            } elseif ($boyut > 1024 * 1024) {
                header("Location: sponsorlar.php?sponsor_duzenle=buyuk");
            } else {

                    // ÖNCEKİ RESMİMİZİ SİLELİM
                $sil = $db->prepare("SELECT * FROM yazilar WHERE yazi_id=?");
                $sil->execute(array($yazi_id));
                $eski_resim = $sil->fetch(PDO::FETCH_ASSOC);
                    $eski_resim["sponsor_resim"]; //ESKİ RESMİMİ SİLMEMİZİN GEREKLİ OLAN KOD

                    unlink("../img/sponsorlar/".$eski_resim["sponsor_resim"]);


                    if (move_uploaded_file($kaynak, $hedef)) {
                        $query = $db->prepare("UPDATE sponsorlar SET sponsor_resim=?, sponsor_link=? WHERE sponsor_id=?");
                        $insert = $query->execute(array($resimAd, $sponsor_link,$sponsor_id));
                        if ($insert) {
                            header("Location: sponsorlar.php?sponsor_duzenle=yes");
                        } else {
                            header("Location: sponsorlar.php?sponsor_duzenle=no");
                        }
                    }
                }
            }
        }else{
            if (!$sponsor_link) {
                header("Location: sponsorlar.php?sponsor_duzenle=bos");
            }else{
                $query = $db->prepare("UPDATE sponsorlar SET sponsor_link=? WHERE sponsor_id=?");
                $insert = $query->execute(array($sponsor_link,$sponsor_id));
                if ($insert) {
                    header("Location: sponsorlar.php?sponsor_duzenle=yes");
                } else {
                    header("Location: sponsorlar.php?sponsor_duzenle=no");
                }
            }
        }
    }


    //YAZI SİLME İŞLEMİ
    extract($_GET);
    if(isset($sponsorsil_id)){
    // ÖNCEKİ RESMİMİZİ SİLELİM
        $sil = $db->prepare("SELECT * FROM sponsorlar WHERE sponsor_id=?");
        $sil->execute(array($sponsorsil_id));
        $eski_resim = $sil->fetch(PDO::FETCH_ASSOC);
    $eski_resim["sponsor_resim"]; //ESKİ RESMİMİ SİLMEMİZİN GEREKLİ OLAN KOD

    unlink("../img/sponsorlar/".$eski_resim["sponsor_resim"]);

    $query = $db->prepare("DELETE FROM sponsorlar WHERE sponsor_id=?");
    $delete = $query->execute(array($sponsorsil_id));
    if ($delete) {
        header("Location: sponsorlar.php?sponsor_sil=yes");
    } else {
        header("Location: sponsorlar.php?sponsor_sil=no");
    }
}



// YAZI EKLE
extract($_POST);
$DosyaTuru = array("image/jpeg","image/jpg","image/png","image/x-png");
$DosyaUzanti = array("jpeg","jpg","png","x-png");
if (isset($yazi_ekle)){

        $kaynak = $_FILES["yazi_foto"]["tmp_name"]; //fotoğrafın geçiçi olarak yüklendiği yer veya isim
        $isim = $_FILES["yazi_foto"]["name"]; // fotoğrafın ismi
        $boyut = $_FILES["yazi_foto"]["size"]; // fotoğrafın boyutu
        $turu = $_FILES["yazi_foto"]["type"]; // fotoğrafın türü

        $uzanti = substr($isim,strpos($isim,".")+1); //noktadan sonraki harften okumaya başla
        $resimAd = substr(uniqid(rand()),0,11)."_".$isim; // Fotoğrafın yeni ismini belirledik
        $hedef = "../img/yazilar/".$resimAd; // fotoğrafın nereye yukleneceğini belirttik

        if (!$_FILES["yazi_foto"]["size"] > 0 || !$yazi_baslik || !$yazi_icerik){
            header("Location: yazilar.php?yazi_ekle=bos");
        }else {
            if ($kaynak) {
                if (!in_array($turu, $DosyaTuru) && !in_array($uzanti, $DosyaUzanti)) {
                    header("Location: yazilar.php?yazi_ekle=gecersizuzanti");
                } elseif ($boyut > 1024 * 1024) {
                    header("Location: yazilar.php?yazi_ekle=buyuk");
                } else {
                    if (move_uploaded_file($kaynak, $hedef)) {
                        $query = $db->prepare("INSERT INTO yazilar SET yazi_foto=?, yazi_baslik=?, yazi_kategori_id=?, yazi_icerik=?, yazi_seflink=?");
                        $insert = $query->execute(array($resimAd, $yazi_baslik, $yazi_kategori_id, strip_tags($yazi_icerik), seoLink($yazi_baslik)));
                        if ($insert) {
                            header("Location: yazilar.php?yazi_ekle=yes");
                        } else {
                            header("Location: yazilar.php?yazi_ekle=no");
                        }
                    }
                }
            }
        }
    }

//YAZI GÜNCELLE
    extract($_POST);
    $DosyaTuru = array("image/jpeg","image/jpg","image/png","image/x-png");
    $DosyaUzanti = array("jpeg","jpg","png","x-png");
    if (isset($yazi_duzenle)){
        $yazi_id = $_GET["yazi_id"];

        if ($_FILES["yazi_foto"]["size"] > 0){

        $kaynak = $_FILES["yazi_foto"]["tmp_name"]; //fotoğrafın geçiçi olarak yüklendiği yer veya isim
        $isim = $_FILES["yazi_foto"]["name"]; // fotoğrafın ismi
        $boyut = $_FILES["yazi_foto"]["size"]; // fotoğrafın boyutu
        $turu = $_FILES["yazi_foto"]["type"]; // fotoğrafın türü

        $uzanti = substr($isim,strpos($isim,".")+1); //noktadan sonraki harften okumaya başla
        $resimAd = substr(uniqid(rand()),0,11)."_".$isim; // Fotoğrafın yeni ismini belirledik
        $hedef = "../img/yazilar/".$resimAd; // fotoğrafın nereye yukleneceğini belirttik


        if ($kaynak) {
            if (!in_array($turu, $DosyaTuru) && !in_array($uzanti, $DosyaUzanti)) {
                header("Location: yazilar.php?yazi_guncelle=gecersizuzanti");
            } elseif ($boyut > 1024 * 1024) {
                header("Location: yazilar.php?yazi_guncelle=buyuk");
            } else {

                    // ÖNCEKİ RESMİMİZİ SİLELİM
                $sil = $db->prepare("SELECT * FROM yazilar WHERE yazi_id=?");
                $sil->execute(array($yazi_id));
                $eski_resim = $sil->fetch(PDO::FETCH_ASSOC);
                    $eski_resim["yazi_foto"]; //ESKİ RESMİMİ SİLMEMİZİN GEREKLİ OLAN KOD

                    unlink("../img/yazilar/".$eski_resim["yazi_foto"]);


                    if (move_uploaded_file($kaynak, $hedef)) {
                        $query = $db->prepare("UPDATE yazilar SET yazi_foto=?, yazi_baslik=?, yazi_kategori_id=?, yazi_icerik=?, yazi_seflink=? WHERE yazi_id=?");
                        $insert = $query->execute(array($resimAd, $yazi_baslik,$yazi_kategori_id, strip_tags($yazi_icerik), seoLink($yazi_baslik), $yazi_id));
                        if ($insert) {
                            header("Location: yazilar.php?yazi_guncelle=yes");
                        } else {
                            header("Location: yazilar.php?yazi_guncelle=no");
                        }
                    }
                }
            }
        }else{
            if (!$yazi_baslik || !$yazi_icerik) {
                header("Location: yazilar.php?yazi_guncelle=bos");
            }else{
                $query = $db->prepare("UPDATE yazilar SET yazi_baslik=?, yazi_kategori_id=?, yazi_icerik=?, yazi_seflink=? WHERE yazi_id=?");
                $insert = $query->execute(array($yazi_baslik,$yazi_kategori_id, strip_tags($yazi_icerik), seoLink($yazi_baslik), $yazi_id));
                if ($insert) {
                    header("Location: yazilar.php?yazi_guncelle=yes");
                } else {
                    header("Location: yazilar.php?yazi_guncelle=no");
                }
            }
        }
    }

//YAZI SİLME İŞLEMİ
    extract($_GET);
    if(isset($yazisil_id)){
    // ÖNCEKİ RESMİMİZİ SİLELİM
        $sil = $db->prepare("SELECT * FROM yazilar WHERE yazi_id=?");
        $sil->execute(array($yazisil_id));
        $eski_resim = $sil->fetch(PDO::FETCH_ASSOC);
    $eski_resim["yazi_foto"]; //ESKİ RESMİMİ SİLMEMİZİN GEREKLİ OLAN KOD

    unlink("../img/yazilar/".$eski_resim["yazi_foto"]);

    $query = $db->prepare("DELETE FROM yazilar WHERE yazi_id=?");
    $delete = $query->execute(array($yazisil_id));
    if ($delete) {
        header("Location: yazilar.php?yazi_sil=yes");
    } else {
        header("Location: yazilar.php?yazi_sil=no");
    }
}

//KATEGORİ EKLE
extract($_POST);
if (isset($kategori_ekle)){
    if (!$kategori_baslik){
        header("Location: kategoriler.php?kategori_ekle=bos");
    }else{
        $query = $db->prepare("INSERT INTO kategoriler SET kategori_baslik=?, kategori_url=?");
        $insert = $query->execute(array($kategori_baslik,seoLink($kategori_baslik)));
        if ($insert){
            header("Location: kategoriler.php?kategori_ekle=yes");
        }else{
            header("Location: kategoriler.php?kategori_ekle=no");
        }
    }
}


// KATEGORİ GÜNCELLE
extract($_POST);
if(isset($kategori_duzenle)){

    $kategori_id = $_GET["kategori_id"];

    if (!$kategori_baslik){
        header("Location: kategoriler.php?kategori_guncelle=bos");
    }else{
        $query = $db->prepare("UPDATE kategoriler SET kategori_baslik=? WHERE kategori_id=?");
        $update = $query->execute(array($kategori_baslik,$kategori_id));
        if($update){
            header("Location: kategoriler.php?kategori_guncelle=yes");
        }else{
            header("Location: kategoriler.php?kategori_guncelle=no");
        }
    }
}

//KATEGORİ SİLME İŞLEMİ
extract($_GET);
if(isset($kategorisil_id)){

    $query = $db->prepare("DELETE FROM kategoriler WHERE kategori_id=?");
    $delete = $query->execute(array($kategorisil_id));
    if ($delete) {
        header("Location: kategoriler.php?kategori_sil=yes");
    } else {
        header("Location: kategoriler.php?kategori_sil=no");
    }
}



//LOGO GÜNCELLE
extract($_POST);
$DosyaTuru = array("image/jpeg","image/jpg","image/png","image/x-png");
$DosyaUzanti = array("jpeg","jpg","png","x-png");
if (isset($logo_duzenle)){
    $logo_id = $_GET["logo_id"];

    if ($_FILES["lf_logo"]["size"] > 0){

        $kaynak = $_FILES["lf_logo"]["tmp_name"]; //fotoğrafın geçiçi olarak yüklendiği yer veya isim
        $isim = $_FILES["lf_logo"]["name"]; // fotoğrafın ismi
        $boyut = $_FILES["lf_logo"]["size"]; // fotoğrafın boyutu
        $turu = $_FILES["lf_logo"]["type"]; // fotoğrafın türü

        $uzanti = substr($isim,strpos($isim,".")+1); //noktadan sonraki harften okumaya başla
        $resimAd = substr(uniqid(rand()),0,11)."_".$isim; // Fotoğrafın yeni ismini belirledik
        $hedef = "../images/logofavicon/".$resimAd; // fotoğrafın nereye yukleneceğini belirttik


        if ($kaynak) {
            if (!in_array($turu, $DosyaTuru) && !in_array($uzanti, $DosyaUzanti)) {
                header("Location: logo-favicon.php?logo-guncelle=gecersizuzanti");
            } elseif ($boyut > 1024 * 1024 * 5) {
                header("Location: logo-favicon.php?logo-guncelle=buyuk");
            } else {

                // ÖNCEKİ RESMİMİZİ SİLELİM
                $sil = $db->prepare("SELECT * FROM logofavico WHERE lf_id=?");
                $sil->execute(array($logo_id));
                $eski_resim = $sil->fetch(PDO::FETCH_ASSOC);
                $eski_resim["lf_logo"]; //ESKİ RESMİMİ SİLMEMİZİN GEREKLİ OLAN KOD

                unlink("../images/logofavicon/".$eski_resim["lf_logo"]);


                if (move_uploaded_file($kaynak, $hedef)) {
                    $query = $db->prepare("UPDATE logofavico SET lf_logo=? WHERE lf_id=?");
                    $update = $query->execute(array($resimAd,$logo_id));
                    if ($update) {
                        header("Location: logo-favicon.php?logo-guncelle=yes");
                    } else {
                        header("Location: logo-favicon.php?logo-guncelle=no");
                    }
                }
            }
        }
    }
}

//FAVICON GÜNCELLE
extract($_POST);
$DosyaTuru = array("image/jpeg","image/jpg","image/png","image/x-png");
$DosyaUzanti = array("jpeg","jpg","png","x-png");
if (isset($favicon_duzenle)){
    $favicon_id = $_GET["favicon_id"];

    if ($_FILES["lf_favicon"]["size"] > 0){

        $kaynak = $_FILES["lf_favicon"]["tmp_name"]; //fotoğrafın geçiçi olarak yüklendiği yer veya isim
        $isim = $_FILES["lf_favicon"]["name"]; // fotoğrafın ismi
        $boyut = $_FILES["lf_favicon"]["size"]; // fotoğrafın boyutu
        $turu = $_FILES["lf_favicon"]["type"]; // fotoğrafın türü

        $uzanti = substr($isim,strpos($isim,".")+1); //noktadan sonraki harften okumaya başla
        $resimAd = substr(uniqid(rand()),0,11)."_".$isim; // Fotoğrafın yeni ismini belirledik
        $hedef = "../images/logofavicon/".$resimAd; // fotoğrafın nereye yukleneceğini belirttik


        if ($kaynak) {
            if (!in_array($turu, $DosyaTuru) && !in_array($uzanti, $DosyaUzanti)) {
                header("Location: logo-favicon.php?favicon-guncelle=gecersizuzanti");
            } elseif ($boyut > 1024 * 1024 * 5) {
                header("Location: logo-favicon.php?favicon-guncelle=buyuk");
            } else {

                // ÖNCEKİ RESMİMİZİ SİLELİM
                $sil = $db->prepare("SELECT * FROM logofavico WHERE lf_id=?");
                $sil->execute(array($favicon_id));
                $eski_resim = $sil->fetch(PDO::FETCH_ASSOC);
                $eski_resim["lf_favicon"]; //ESKİ RESMİMİ SİLMEMİZİN GEREKLİ OLAN KOD

                unlink("../images/logofavicon/".$eski_resim["lf_favicon"]);


                if (move_uploaded_file($kaynak, $hedef)) {
                    $query = $db->prepare("UPDATE logofavico SET lf_favicon=? WHERE lf_id=?");
                    $update = $query->execute(array($resimAd,$favicon_id));
                    if ($update) {
                        header("Location: logo-favicon.php?favicon-guncelle=yes");
                    } else {
                        header("Location: logo-favicon.php?favicon-guncelle=no");
                    }
                }
            }
        }
    }
}


## ADMİN GUNCELLE DUZENLEME
extract($_POST);
if (isset($kadi_degistir)) {

    $admin_id = $_GET["admin_id"];

    if ($admin_kadi) {
        $adminguncelle = $db->prepare("UPDATE admi SET 
           admin_kadi=? WHERE admin_id=?");
        $adminupdate = $adminguncelle->execute(array($admin_kadi,$admin_id));

        if ($adminupdate) {
            header("Location: profil.php?update=yes");
        }else{
            header("Location: profil.php?update=no");
        }
    }else{
        header("Location: profil.php?update=bos");
    }

}

## ADMİN ŞİFRE DUZENLEME
if (isset($_POST["sifre_degistir"])) {

    $id = $_GET["admin_id"];

    $eski_sifre 	= md5($_POST["eski_sifre"]);
    $yeni_sifre 	= md5($_POST["yeni_sifre"]);


    $kullanicisor=$db->prepare("select * from admin where admin_sifre=:admin_sifre");
    $kullanicisor->execute(array(
        'admin_sifre' => $eski_sifre
    ));

    //dönen satır sayısını belirtir
    $say=$kullanicisor->rowCount();

    if ($say==0) {
        header("Location: profil.php?update=eskisifrehata");
    }else{
        $adminguncelle = $db->prepare("UPDATE admi SET 
           admin_sifre=?
           WHERE admin_id=?");
        $adminupdate = $adminguncelle->execute(array($yeni_sifre,$id));

        if ($adminupdate) {
            header("Location: profil.php?update=yes");
        }else{
            header("Location: profil.php?update=no");
        }
    }
}

// GİRİŞ İŞLEMİ
if (isset($_POST["loggin"])) {

    $admin_kadi = htmlspecialchars(trim($_POST["admin_kadi"]));
    $admin_sifre = htmlspecialchars(trim(md5($_POST["admin_sifre"])));

    if (!$admin_kadi || !$admin_sifre) {
        header("Location: login.php?giris=bos");
    }else{

        $query = $db->prepare("SELECT * FROM admin WHERE admin_kadi=? AND admin_sifre=?");
        $query->execute(array($admin_kadi,$admin_sifre));
        $admin_giris = $query->fetch(PDO::FETCH_ASSOC);

        if ($admin_giris) {

            $_SESSION["login"] = true;
            $_SESSION["admin_kadi"] = $admin_giris["admin_kadi"];
            $_SESSION["admin_id"]   = $admin_giris["admin_id"];

            header("Location: index.php");
        }else{
            header("Location: login.php?giris=no");
        }

    }

}






