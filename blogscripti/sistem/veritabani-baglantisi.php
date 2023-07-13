<?php

session_start();
ob_start();

try {
  $db = new PDO("mysql:host=localhost; dbname=blogscripti; charset=utf8;","root","");
} catch (PDOException $error) {
  echo "<center><b style='color: red;'>Veritabani bağlantisi başarısız oldu!</b></center>"; $error->getMessage();
}


 ?>
