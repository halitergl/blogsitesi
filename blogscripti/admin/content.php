<section role="main" class="content-body">
  <header class="page-header">
    <h2>Anasayfa</h2>

    <div class="right-wrapper pull-right">
      <ol class="breadcrumbs">
        <li>
          <a href="index.php">
            <i class="fa fa-home"></i>
          </a>
        </li>
        <li><span>Anasayfa</span></li>
        <br>
      </ol>
    </div>
  </header>

  <!-- start: page -->
  <div class="row">
  
    <div class="col-md-6 col-lg-12 col-xl-6">
      <div class="row">
        <div class="col-md-12 col-lg-6 col-xl-6">
          <section class="panel panel-featured-left panel-featured-primary">
            <div class="panel-body">
              <div class="widget-summary">
                <div class="widget-summary-col widget-summary-col-icon">
                  <div class="summary-icon bg-primary">
                    <i class="fa fa-book"></i>
                  </div>
                </div>
				<?php
                $yazilar = $db->prepare("SELECT * FROM yazilar");
                $yazilar->execute();
                $yazilar->fetchAll(PDO::FETCH_ASSOC);
                $toplam = $yazilar->rowCount();
                ?>
                <div class="widget-summary-col">
                  <div class="summary">
                    <h4 class="title">Yazılar</h4>
                    <div class="info">
                      <strong class="amount"><?php echo $toplam; ?></strong>
                    </div>
                  </div>
                  <div class="summary-footer">
                    <a class="text-muted text-uppercase">(Tümünü Gör)</a>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
		
        <div class="col-md-12 col-lg-6 col-xl-6">
          <section class="panel panel-featured-left panel-featured-secondary">
            <div class="panel-body">
              <div class="widget-summary">
                <div class="widget-summary-col widget-summary-col-icon">
                  <div class="summary-icon bg-secondary">
                    <i class="fa fa-tags"></i>
                  </div>
                </div>
				<?php
                $kategoriler = $db->prepare("SELECT * FROM kategoriler");
                $kategoriler->execute();
                $kategoriler->fetchAll(PDO::FETCH_ASSOC);
                $toplam = $kategoriler->rowCount();
                ?>
                <div class="widget-summary-col">
                  <div class="summary">
                    <h4 class="title">Kategoriler</h4>
                    <div class="info">
                      <strong class="amount"><?php echo $toplam ?></strong>
                    </div>
                  </div>
                  <div class="summary-footer">
                    <a class="text-muted text-uppercase">(Tümünü Gör)</a>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
		
        <div class="col-md-12 col-lg-6 col-xl-6">
          <section class="panel panel-featured-left panel-featured-tertiary">
            <div class="panel-body">
              <div class="widget-summary">
                <div class="widget-summary-col widget-summary-col-icon">
                  <div class="summary-icon bg-tertiary">
                    <i class="fa fa-envelope"></i>
                  </div>
                </div>
				<?php
                $mesajlar = $db->prepare("SELECT * FROM mesajlar");
                $mesajlar->execute();
                $mesajlar->fetchAll(PDO::FETCH_ASSOC);
                $toplam = $mesajlar->rowCount();
                ?>
                <div class="widget-summary-col">
                  <div class="summary">
                    <h4 class="title">Mesajlar</h4>
                    <div class="info">
                      <strong class="amount"><?php echo $toplam ?></strong>
                    </div>
                  </div>
                  <div class="summary-footer">
                    <a class="text-muted text-uppercase">(Tümünü Gör)</a>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
		
        <div class="col-md-12 col-lg-6 col-xl-6">
          <section class="panel panel-featured-left panel-featured-quartenary">
            <div class="panel-body">
              <div class="widget-summary">
                <div class="widget-summary-col widget-summary-col-icon">
                  <div class="summary-icon bg-quartenary">
                    <i class="fa fa-users"></i>
                  </div>
                </div>
				<?php
                $sponsorlar = $db->prepare("SELECT * FROM sponsorlar");
                $sponsorlar->execute();
                $sponsorlar->fetchAll(PDO::FETCH_ASSOC);
                $toplam = $sponsorlar->rowCount();
                ?>
                <div class="widget-summary-col">
                  <div class="summary">
                    <h4 class="title">Sponsorlar</h4>
                    <div class="info">
                      <strong class="amount"><?php echo $toplam ?></strong>
                    </div>
                  </div>
                  <div class="summary-footer">
                    <a class="text-muted text-uppercase">(Tümünü Gör)</a>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
		
		<div class="col-md-12 col-lg-6 col-xl-6">
          <section class="panel panel-featured-left panel-tertiary">
            <div class="panel-body">
              <div class="widget-summary">
                <div class="widget-summary-col widget-summary-col-icon">
                  <div class="summary-icon bg-warning">
                    <i class="fa fa-comment"></i>
                  </div>
                </div>
				<?php
                $yorumlar = $db->prepare("SELECT * FROM yorumlar");
                $yorumlar->execute();
                $yorumlar->fetchAll(PDO::FETCH_ASSOC);
                $toplam = $yorumlar->rowCount();
                ?>
                <div class="widget-summary-col">
                  <div class="summary">
                    <h4 class="title">Yorumlar</h4>
                    <div class="info">
                      <strong class="amount"><?php echo $toplam ?></strong>
                    </div>
                  </div>
                  <div class="summary-footer">
                    <a class="text-muted text-uppercase">(Tümünü Gör)</a>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
		
		
      </div>
    </div>
  </div>

  
    </div>
  </div>
  <!-- end: page -->
</section>
