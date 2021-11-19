<?php 
 $setting = app\models\Setting::find()->one();
$icons = \Yii::$app->request->baseUrl . "/uploads/setting/" . $setting->logo;
?>
<footer id="footer" class="footer">
      <div class="footer-newsletter">
        <div class="container">
          <div class="row">
            <div class="col-4 col-sm-3 col-md-3 col-lg-4 footer__widget footer__widget-about">
              <div class="footer__widget-content">
                <img src="<?= $icons ?>" alt="logo" class="footer-logo" style="width:40%;">
              </div>
            </div><!-- /.col-lg-4 -->
            <div class="col-8 col-sm-5 col-md-5 col-lg-4 footer__widget footer__widget-about">
              <div class="footer__widget-content">
                  <h2 class="heading__title" style="color:orange;">Lebih Dekat dengan Kami</h2>
                  <p>Ikuti Sosial Media Kami untuk Informasi lebih update dan Terbaru.</p>
                <ul class="contact__list list-unstyled">
                    <center>

                        <div class="social__icons">
                            <a href="<?= $setting->facebook ?>" target="_blank"><i class="fa fa-facebook"></i></a>
                            <a href="<?= $setting->twitter ?>" target="_blank"><i class="fa fa-twitter"></i></a>
                            <a href="<?= $setting->instagram ?>" target="_blank"><i class="fa fa-instagram"></i></a>
                            <a href="https://t.me/isalamkarim" target="_blank"><i class="fa fa-telegram"></i></a>
                        </div><!-- /.col-xl-2 -->
                    </center>
                </ul>
                </div>
              </div>
           
              <div class="col-sm-4 col-md-4 col-lg-4 footer__widget footer__widget-about">
              <div class="footer__widget-content">
              <div id="map-canvas" style="height: 200px; width: 100%"></div>
                </div>
              </div>
           


          </div><!-- /.row -->
        </div><!-- /.container -->
      </div><!-- /.footer-top -->
      <div class="footer-bottom">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-sm-12 col-md-6 col-lg-6">
              <div class="footer__copyright">
                <span>&copy;<?=date('Y'); ?> <?=  $setting->nama_web ?>  </span>
              </div><!-- /.Footer-copyright -->
            </div><!-- /.col-lg-6 -->
            <div class="col-sm-12 col-md-6 col-lg-6">
              <nav>
                <ul class="list-unstyled footer__copyright-links d-flex flex-wrap justify-content-end">
                  <li><a href="#">Terms & Conditions </a></li>
                  <li><a href="#">Privacy Policy</a></li>
                  <li><a href="#">Sitemap</a></li>
                </ul>
              </nav>
            </div><!-- /.col-lg-6 -->
          </div><!-- /.row -->
        </div><!-- /.container -->
      </div><!-- /.Footer-bottom -->
    </footer><!-- /.Footer -->