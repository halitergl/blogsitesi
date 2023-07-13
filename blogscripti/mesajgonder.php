<?php
/**
 * Created by PhpStorm.
 * User: Musty
 * Date: 1.03.2018
 * Time: 13:01
 */

include "sistem/veritabani-baglantisi.php";

extract($_POST);
if ($_POST){


    if (!$isim || !$mail || !$konu || !$mesaj){
        echo "bos";
    }else{
        $query = $db->prepare("INSERT INTO mesajlar SET mesaj_gonderenisim=?, mesaj_gonderenmail=?, mesaj_konu=?, mesaj_aciklama=?");
        $insert = $query->execute(array($isim,$mail,$konu,$mesaj));

        if ($insert){
            echo "yes";
        }else{
            echo "no";
        }
    }

}
