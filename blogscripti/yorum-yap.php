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

        if (!$yorum_ekleyen || !$yorum_eposta || !$yorum_icerik){
            echo "bos";
        }else{
            $query = $db->prepare("INSERT INTO yorumlar SET yorum_ekleyen=?, yorum_eposta=?, yorum_ekleyen_website=?, yorum_icerik=?, yorum_yazi_id=?, yorum_ust=?");
            $insert = $query->execute(array($yorum_ekleyen,$yorum_eposta,$yorum_ekleyen_website,$yorum_icerik,$yorum_yazi_id,0));

            if ($insert){
                echo "yes";
            }else{
                echo "no";
            }
        }

    }
