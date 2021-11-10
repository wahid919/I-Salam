<?php 
 $setting = app\models\Setting::find()->one();
$icons = \Yii::$app->request->baseUrl . "/uploads/setting/" . $setting->logo;
?>
<footer id="footer" class="footer">
      <div class="footer-newsletter">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-4 footer__widget footer__widget-about">
              <div class="footer__widget-content">
                <img src="<?= $icons ?>" alt="logo" class="footer-logo" style="width:40%;">
                <!-- <p><?= $setting->tentang_kami ?></p> -->
                <ul class="contact__list list-unstyled">
                  <!-- <li><span>Email:</span><span>Optime@7oroof.com</span></li>
                  <li><span>Phone:</span><span>+01234567890</span></li> -->
                </ul>
              </div>
            </div><!-- /.col-lg-4 -->
            <div class="col-sm-12 col-md-12 col-lg-4 footer__widget footer__widget-about">
              <div class="footer__widget-content">
                  <!-- <br>
                  <br>
                  <br> -->

                  <h2 class="heading__title" style="color:orange;">Tentang Kami</h2>
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
           
              <div class="col-sm-12 col-md-12 col-lg-4 footer__widget footer__widget-about">
              <div class="footer__widget-content">
              <div id="map-canvas" style="height: 450px; width: 100%"></div>
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
                <!-- <a href="http://themeforest.net/user/7oroof">7oroof.com</a> -->
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