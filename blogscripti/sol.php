<div id="column-1">
  <?php

  $sayfa = intval($_GET["sayfa"]); if (!$sayfa || $sayfa < 1) {$sayfa=1;}
  $say   = $db->query("SELECT * FROM yazilar");
  $ToplamVeri = $say->rowCount();
  $limit = 8;
  $sayfasayisi = ceil($ToplamVeri/$limit); if ($sayfa > $sayfasayisi) {$sayfa = $sayfasayisi;}
  $goster = $sayfa * $limit - $limit;
  $gorunensayfa = 5;

  $yazilar = $db->prepare("SELECT * FROM yazilar
    INNER JOIN kategoriler ON kategoriler.kategori_id = yazilar.yazi_kategori_id
    ORDER BY yazi_id DESC LIMIT $goster,$limit");
  $yazilar->execute(array());
  $yazicek = $yazilar->fetchALL(PDO::FETCH_ASSOC);

  foreach ($yazicek as $row) {
    // yorumlar
    $yorumlar = $db->prepare("SELECT * FROM yorumlar WHERE yorum_yazi_id=? AND yorum_durum=?");
    $yorumlar->execute(array($row["yazi_id"],1));
    $yorumlar->fetchALL(PDO::FETCH_ASSOC);
    $yorum_say = $yorumlar->rowCount();
    ?>
    <div class="post-column">
      <a href="yazilar/<?php echo $row['yazi_seflink']; ?>" title="<?php echo $row["yazi_baslik"]; ?>">
        <img src="img/yazilar/<?php echo $row["yazi_foto"]; ?>" alt="<?php echo $row["yazi_baslik"]; ?>" style="width: 440px; height: 260px;"/>
      </a>
      <div class="post-column-bottom">
        <h1><a href="yazilar/<?php echo $row['yazi_seflink']; ?>" title="<?php echo $row["yazi_baslik"]; ?>"><?php echo $row["yazi_baslik"]; ?></a></h1>
        <div class="post-column-meta">
          <span><a href="kategori/<?php echo $row['kategori_url']; ?>" title="<?php echo $row["kategori_baslik"]; ?>"><i class="mdi mdi-pound-box"></i> <?php echo $row["kategori_baslik"]; ?></a></span>
          <span><i class="mdi mdi-calendar-clock"></i> <?php echo SaatliTarih($row["yazi_tarih"]); ?></span>

          <span><i class="mdi mdi-comment"></i> <?php echo $yorum_say; ?> Yorum </span>
          <span style="border:0;"><i class="mdi mdi-eye"></i> <?php echo K($row["yazi_okunma"]); ?> </span>
        </div>
        <!-- <p class="post-column-desc">
          <?php echo mb_strimwidth($row["yazi_icerik"],0,150); ?>
        </p>
        <div class="read-more">
            <h2><a href="yazilar/<?php echo $row['yazi_seflink']; ?>" class="read-more" title="Devamını Gor">DEVAMINI GÖR</a></h2>
        </div> -->
      </div>
    </div>
    <?php } ?>


    <div style="clear:both;"></div>
    <div id="page-numbers" class="box-shadow">
      <ul style="margin-left: 5px;">
        <?php if ($sayfa > 1) { ?>
        <li><a href="sayfa/<?php echo 1; ?>">İlk</a></li>
        <li><a href="sayfa/<?php echo $sayfa - 1 ?>">Önceki</a></li>
        <?php } ?>

        <?php
        for ($i=$sayfa - $gorunensayfa; $i < $sayfa + $gorunensayfa +1; $i++) {
          if ($i > 0 and $i <= $sayfasayisi) {
            if ($i == $sayfa) {
              echo '<li><a style="background-color: #42ade7; color: white;">'.$i.'</a></li>';
            }else{
              echo '<li><a href="sayfa/'.$i.'">'.$i.'</a></li>';
            }
          }
        }
        ?>

        <?php if ($sayfa != $sayfasayisi) { ?>
        <li><a href="sayfa/<?php echo $sayfa + 1 ?>">Sonraki</a></li>
        <li><a href="sayfa/<?php echo $sayfasayisi ?>">Son</a></li>
        <?php } ?>

      </ul>
      <div style="clear:both;"></div>
    </div>
  </div>
