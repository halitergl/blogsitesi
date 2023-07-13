<aside id="sidebar-left" class="sidebar-left">

  <div class="sidebar-header">
    <div class="sidebar-title">
      Yönetim Paneli
    </div>
    <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
      <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
    </div>
  </div>

  <div class="nano">
    <div class="nano-content">
      <nav id="menu" class="nav-main" role="navigation">
        <ul class="nav nav-main">

          <li class="nav-active">
            <a href="index.php">
              <i class="fa fa-home" aria-hidden="true"></i>
              <span>Anasayfa</span>
            </a>
          </li>

          <li>
            <a href="mesajlar.php">
              <?php
// yorumlar
              $mesajlar = $db->prepare("SELECT * FROM mesajlar WHERE mesaj_okunma=?");
              $mesajlar->execute(array(0));
              $mesajlar->fetchALL(PDO::FETCH_ASSOC);
              $mesaj_say = $mesajlar->rowCount();
              ?>
              <span class="pull-right label label-primary"><?php echo $mesaj_say; ?></span>
              <i class="fa fa-envelope" aria-hidden="true"></i>
              <span>Mesajlar</span>
            </a>
          </li>

          <li class="nav-parent">
            <a>
              <i class="fa fa-copy" aria-hidden="true"></i>
              <span>Sayfalar</span>
            </a>
            <ul class="nav nav-children">
              <li>
                <a href="hakkimizda.php">
                 Hakkımızda
               </a>
             </li>
           </ul>
         </li>

         <li class="nav-parent">
          <a>
            <i class="fa fa-list" aria-hidden="true"></i>
            <span>Yazılar</span>
          </a>
          <ul class="nav nav-children">
            <li>
              <a href="yazilar.php">
               Yazıları Listele
             </a>
           </li>
           <li>
            <a href="yazi-ekle.php">
             Yazı Ekle
           </a>
         </li>
       </ul>
     </li>

     <li class="nav-parent">
      <a>
        <i class="fa fa-tags" aria-hidden="true"></i>
        <span>Kategoriler</span>
      </a>
      <ul class="nav nav-children">
        <li>
          <a href="kategoriler.php">
           Kategorileri Listele
         </a>
       </li>
       <li>
        <a href="kategori-ekle.php">
         Kategori Ekle
       </a>
     </li>
   </ul>
 </li>

 <li class="nav-parent">
  <a>
    <i class="fa fa-comments" aria-hidden="true"></i>
    <span>Yorumlar</span>
  </a>
  <ul class="nav nav-children">
    <li>
      <a href="yorumlar.php">
        <?php
// yorumlar
        $yorumlar = $db->prepare("SELECT * FROM yorumlar WHERE yorum_durum=?");
        $yorumlar->execute(array(0));
        $yorumlar->fetchALL(PDO::FETCH_ASSOC);
        $yorum_say = $yorumlar->rowCount();
        ?>
        <span class="pull-right label label-primary"><?php echo $yorum_say; ?></span>
        Yorumları Listele
      </a>
    </li>
    <li>
      <a href="cevaplar.php">
       Cevaplar
     </a>
   </li>
 </ul>
</li>

<li class="nav-parent">
  <a>
    <i class="fa fa-suitcase" aria-hidden="true"></i>
    <span>Sponsorlar</span>
  </a>
  <ul class="nav nav-children">
    <li>
      <a href="sponsorlar.php">
       Sponsorları Listele
     </a>
   </li>
   <li>
    <a href="sponsor-ekle.php">
     Sponsor Ekle
   </a>
 </li>
</ul>
</li>

</ul>
</nav>

<hr class="separator" />

<div class="sidebar-widget widget-tasks">
  <div class="widget-header">
    <h6>ACİL DURUM MENÜ</h6>
    <div class="widget-toggle">+</div>
  </div>
  <div class="widget-content">
    <ul class="list-unstyled m-none">
      <li><a href="tel:05337115207"><span class="fa fa-phone"></span> 0 (533) 711 52 07</a></li>
      <li><a target="_blank" href="https://www.instagram.com/mstfkrtll"><span class="fa fa-instagram"></span> /mstfkrtll</a></li>
      <li><a href=""><span class="fa fa-skype"></span> /mstfkrtl61</a></li>
    </ul>
  </div>
</div>

</div>

</div>

</aside>
