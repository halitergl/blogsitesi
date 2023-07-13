<div id="column-2">


  <div class="sidebar">
    <form action="ara" method="GET">
      <input type="search" class="search-field" placeholder="Arama …" name="ara" title="Arama:">
    </form>
  </div>

  <div class="sidebar">
    <h4>Popüler Yazılarım</h4>
    <?php
    $yazilar = $db->prepare("SELECT * FROM yazilar ORDER BY yazi_okunma DESC LIMIT 5");
    $yazilar->execute(array());
    $yazicek = $yazilar->fetchALL(PDO::FETCH_ASSOC);

    foreach ($yazicek as $row) { ?>
    <div class="sidebar-post">
      <a href="yazilar/<?php echo $row['yazi_seflink']; ?>" title="<?php echo $row["yazi_baslik"]; ?>"><img src="img/yazilar/<?php echo $row["yazi_foto"]; ?>" alt="Fashion"/></a>
      <div class="sidebar-post-info">
        <h3><a href="yazilar/<?php echo $row['yazi_seflink']; ?>" title="<?php echo $row["yazi_baslik"]; ?>"><?php echo mb_substr($row["yazi_baslik"],0,20); ?>...</a></h3>
      </div>
      <div class="sidebar-post-meta">
      <?php echo SaatliTarih($row["yazi_tarih"]); ?>
      </div>
    </div>
  <?php } ?>
  </div>

  <div class="sidebar">
    <h4>KATEGORİLER</h4>

    <ul class="social list">
      <?php
      $kategoriler = $db->prepare("SELECT * FROM kategoriler");
      $kategoriler->execute(array());
      $kategoricek = $kategoriler->fetchALL(PDO::FETCH_ASSOC);

      foreach ($kategoricek as $row) { ?>
        <li class="border" style="text-align:right;">
          <a href="kategori/<?php echo $row['kategori_url']; ?>">
            <i class="mdi mdi-pound-box mdi-24px"  style="float:left; margin-right: 5px; color: lightblue;"></i>
            <span style="float:left;"> <?php echo $row["kategori_baslik"]; ?></span>
            <?php
            $kategoriler = $db->prepare("SELECT * FROM yazilar WHERE yazi_kategori_id=?");
            $kategoriler->execute(array($row["kategori_id"]));
            $kategoriler->fetchALL(PDO::FETCH_ASSOC);
            $kategorisay = $kategoriler->rowCount();
            ?>
            <span style="padding-left: 3px; padding-right: 3px; background-color: lightblue; color: white; border-radius: 5px;"> <?php echo $kategorisay; ?> </span>
          </a>
        </li>
      <?php } ?>


    </ul>

  </div>

  <div class="sidebar">
    <h4>Sosyal AĞlar</h4>
    <ul class="social list">
      <li class="border">
        <a target="_blank" href="<?php echo $ayarcek["site_facebook"]; ?>"><img src="img/socials/facebook.png" alt="Facebook"/><span>Facebook</span></a>
      </li>
      <li class="border">
        <a target="_blank" href="<?php echo $ayarcek["site_youtube"]; ?>"><img src="img/socials/youtube.png" alt="Youtube"/><span>Youtube</span></a>
      </li>
      <li class="border">
        <a target="_blank" href="<?php echo $ayarcek["site_google"]; ?>"><img src="img/socials/google.png" alt="Google Plus"/><span>Google+</span></a>
      </li>
      <li style="padding-bottom:0 !important;">
        <a target="_blank" href="<?php echo $ayarcek["site_instagram"]; ?>"><img src="img/socials/instagram.png" alt="Instagram"/><span>Instagram</span></a>
      </li>
    </ul>
  </div>
</div>
