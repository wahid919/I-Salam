<?php

use app\models\Pendanaan;
use yii\helpers\Url;
use yii\db\Expression;

$setting = app\models\Setting::find()->one();
$icons = \Yii::$app->request->baseUrl . "/uploads/setting/" . $setting->logo;
$categories = app\models\KategoriBerita::find()->all();
$kategori_pendanaans = app\models\KategoriPendanaan::find()->all();

$wakaf = Pendanaan::find()->where(['status_tampil' => 1])->orderBy(new Expression('rand()'))->one();

// $relativeHomeUrl = $_SERVER['REQUEST_URI'];
if (function_exists("checkCurrentNav") == false) {
  function checkCurrentNav($target, $withindex = false)
  {
      $text = "";
      // $current_url = Url::current();
      $current_url = $_SERVER['REQUEST_URI'];
      if ($withindex) $current_url .= "/index";

      if (is_array($target)) {
          foreach ($target as $item) {
              $item = Url::to([$item]);
              if (stripos($current_url, $item) !== false) {
                  $text = "active";
              }

              if ($text != "") break;
          }
      } else {
          $target = Url::to([$target]);
          if ($withindex) $target .= "/index";
          if (stripos($current_url, $target) !== false) {
              $text = "active";
          }
      }

      return $text;
  }
}

// var_dump($relativeHomeUrl);die;
?>
<style>
  .navbar .nav__item .nav__item-link {
    color: #282828;
    line-height: 30px !important;
    padding-left: 15px;
    margin-left: -10px;
    ;
  }
  .active {
    color : #ffc107 !important;
  }
  .dropdown-submenu {
  position: relative;
}

.dropdown-submenu .dropdown-menu {
  top: 0;
  left: 100%;
  margin-top: -1px;
}
.test{
  text-transform: capitalize;
    font-weight: 400;
    line-height: 40px !important;
    white-space: nowrap;
    position: relative;
  border-bottom: 1px solid #eaeaea;
}
.btn-sm{
  font-size: 13px!important;
}
@media screen and (min-width: 769px) {
  .dalam{
    display: none;
  }
  .akun{
    display: none;
  }

.logo-header{
    margin-left: 0px;
  }
/* .sekarang{
  margin-left: 1%;
} */
.sekarang-mobile{
  display: none;
}
}
@media screen and (max-width: 768px) {
.awal{
  display: none;
}
.sekarang{
  display: none;
  /* margin-left: 4%;
  margin-right: 4%; */
}
@media screen and (max-width:991px){
  .ml-auto{
    margin-left: 2%!important;
  }
  .navbar .navbar-nav {
        /* margin: 0 !important; */
     /* margin-left: 2%; */
     margin-right: 2%!important;
    }
}
}
</style>
<header id="header" class="header header-transparent">
  <nav class="navbar navbar-expand-lg sticky-navbar">
    <div class="container">
      <a href="<?= Yii::$app->request->baseUrl ?>" style="font-family: cursive;font-size:large">
        <img src="<?= $icons ?>" class="logo-header logo-light" alt="logo">
        <img src="<?= $icons ?>" class="logo-header logo-dark" alt="logo">
        I-Salam
      </a>
      <div class="sekarang-mobile" style="margin-right: auto;margin-left:auto">
        <a href="<?= Url::to(["detail-program", "id" => $wakaf->id]) ?>"><button class="btn-sm btn-block text-white font-weight-bold text-left" style="background-color: #f1a502;border-radius:6.4px;">Wakaf Sekarang</button></a>
      </div>
      <button class="navbar-toggler" type="button">
        <span class="menu-lines"><span></span></span>
      </button>
      <div class="collapse navbar-collapse" id="mainNavigation">
        <ul class="navbar-nav ml-auto">
          <!-- <div class="dalam">
          
          </div> -->
          <li class="nav__item">
            <a href="<?= Yii::$app->request->baseUrl."/home" ?>" class="nav__item-link <?= checkCurrentNav(["/home"]) ?>">Beranda</a>
          </li><!-- /.nav-item -->
          <li class="nav__item with-dropdown">
            <a href="<?= \Yii::$app->request->baseUrl . "/home#" ?>" class="dropdown-toggle nav__item-link
            <?= checkCurrentNav(["/home/program","/home/program?kategori=Sosial","/home/program?kategori=Produktif","/home/program-zakat","/home/program-infak","/home/program-sedekah"]) ?>">
              <div class="d-none d-lg-block">
                Layanan <i class="fa fa-angle-down"></i>
              </div>
              <div class="d-none d-md-block d-sm-block d-block d-lg-none">
                Layanan</i>
              </div>
            </a>
            <i class="fa fa-angle-right" data-toggle="dropdown"></i>
            <ul class="dropdown-menu">
              <!-- <li class="nav__item"><a href="<?= \Yii::$app->request->baseUrl . "/home/afiliasi" ?>" class="nav__item-link text-dark">Afiliasi</a></li>

              <li class="nav__item"><a href="<?= \Yii::$app->request->baseUrl . "/home/daftar-wakaf" ?>" class="nav__item-link text-dark">Daftar Wakaf</a></li> -->

              <li class="nav__item"><a href="<?= Yii::$app->request->baseUrl . "/home/program" ?> "class="nav__item-link text-dark">Semua Program Wakaf</a></li>
              <li class="nav__item"><a href="<?= \Yii::$app->request->baseUrl . "/home/program?kategori=Sosial" ?> "class="nav__item-link text-dark">Wakaf Sosial</a></li>
              <li class="nav__item"><a href="<?= \Yii::$app->request->baseUrl . "/home/program?kategori=Produktif" ?> "class="nav__item-link text-dark">Wakaf Produktif</a></li>
              <li class="nav__item dropdown-submenu">
        <a class="test" tabindex="-1" href="#">Lainnya <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li class="nav__item"><a tabindex="-1" href="<?= \Yii::$app->request->baseUrl . "/home/program-zakat" ?>" class="nav__item-link text-dark">Zakat</a></li>

              <li class="nav__item"><a tabindex="-1" href="<?= \Yii::$app->request->baseUrl . "/home/program-infak" ?>" class="nav__item-link text-dark">Infak</a></li>

              <li class="nav__item"><a tabindex="-1" href="<?= \Yii::$app->request->baseUrl . "/home/program-sedekah" ?>" class="nav__item-link text-dark">Sedekah</a></li>


        </ul>
      </li>
            </ul>
          </li>
          <li class="nav__item with-dropdown">
            <a href="<?= \Yii::$app->request->baseUrl . "/home#" ?>" class="dropdown-toggle nav__item-link
            <?= checkCurrentNav(["/home/organisasi", "/home/latar-belakang","/home/visi","/home/alamat-kantor", "/home/telp"]) ?>">
              <div class="d-none d-lg-block">
                Tentang Kami <i class="fa fa-angle-down"></i>
              </div>
              <div class="d-none d-md-block d-sm-block d-block d-lg-none">
                Tentang Kami</i>
              </div>
            </a>
            <i class="fa fa-angle-right" data-toggle="dropdown"></i>
            <ul class="dropdown-menu">
              <li class="nav__item"><a href="<?= \Yii::$app->request->baseUrl . "/home/latar-belakang" ?>" class="nav__item-link text-dark">Latar Belakang</a></li>

              <li class="nav__item"><a href="<?= \Yii::$app->request->baseUrl . "/home/visi" ?>" class="nav__item-link text-dark">Visi Misi</a></li>

              <li class="nav__item"><a href="<?= \Yii::$app->request->baseUrl . "/home/organisasi" ?>" class="nav__item-link text-dark">Dewan Pembina</a></li>

              <li class="nav__item"><a href="<?= \Yii::$app->request->baseUrl . "/home/alamat-kantor" ?>" class="nav__item-link text-dark">Alamat Kantor</a></li>

              <li class="nav__item"><a href="<?= \Yii::$app->request->baseUrl . "/home/telp" ?>" class="nav__item-link text-dark">No Telpon & Email</a></li>
            </ul>
          </li>
          <li class="nav__item with-dropdown">
            <a href="<?= \Yii::$app->request->baseUrl . "/home#" ?>" class="dropdown-toggle nav__item-link
            <?= checkCurrentNav(["/home/regulasi-wakaf", "/home/aturan-wakaf","/home/fiqih-wakaf"]) ?>">
              <div class="d-none d-lg-block">
                Panduan <i class="fa fa-angle-down"></i>
              </div>
              <div class="d-none d-md-block d-sm-block d-block d-lg-none">
                Panduan</i>
              </div>
            </a>
            <i class="fa fa-angle-right" data-toggle="dropdown"></i>
            <ul class="dropdown-menu">
              <li class="nav__item"><a href="<?= \Yii::$app->request->baseUrl . "/home/regulasi-wakaf" ?>" class="nav__item-link text-dark">Regulasi</a></li>

              <li class="nav__item"><a href="<?= \Yii::$app->request->baseUrl . "/home/aturan-wakaf" ?>" class="nav__item-link text-dark">Aturan Wakaf</a></li>

              <li class="nav__item"><a href="<?= \Yii::$app->request->baseUrl . "/home/fiqih-wakaf" ?>" class="nav__item-link text-dark">Fikih Wakaf</a></li>
              
              <li class="nav__item"><a href="<?= $setting->link_download_apk ?>" class="nav__item-link text-dark" target="_blank">Aplikasi Wakaf iSalam</a></li>

            </ul>
          </li>
        
          <li class="nav__item">
            <a href="<?= Yii::$app->request->baseUrl . "/news" ?>" class="nav__item-link <?= checkCurrentNav(["/home/news", "/detail-berita"]) ?>">Berita</a>
          </li>

          <!-- <div class="awal"> -->
          <li class="nav__item with-dropdown awal">
            <a href="<?= \Yii::$app->request->baseUrl . "/home#" ?>" class="dropdown-toggle nav__item-link
            <?= checkCurrentNav(["/home/alamat-kantor", "/home/telp","/home/map","/home/pesan","/home/medsos"]) ?>">
              <div class="d-none d-lg-block">
                Akun <i class="fa fa-angle-down"></i>
              </div>
              <div class="d-none d-md-block d-sm-block d-block d-lg-none">
                Akun</i>
              </div>
            </a>
            <i class="fa fa-angle-right" data-toggle="dropdown"></i>
            <ul class="dropdown-menu">
            <?php if (Yii::$app->user->identity->id == null) { ?>
            <!-- <li class="nav__item">
              <a href="<?= Yii::$app->request->baseUrl . "/site/login" ?>" class="nav__item-link" style="color: black;">Login</a>
            </li> -->
            <li class="nav__item">
              <a id="btn-login" class="nav__item-link" style="color: black;cursor:pointer">Login</a>
            </li>
            <li class="nav__item">
              <a id="btn-registrasi" class="nav__item-link" style="color: black;cursor:pointer">Daftar</a>
            </li>
          <?php } else { ?>
            <li class="nav__item">
              <a href="<?= Yii::$app->request->baseUrl . "/home/profile" ?>" class="nav__item-link <?= checkCurrentNav('/home/profile', true) ?>" style="color: black;">Akun Saya</a>
            </li><!-- /.nav-item -->
            <?php if (Yii::$app->user->identity->role_id == 1) { ?>
              <li class="nav__item">
              <a href="<?= Yii::$app->request->baseUrl . "/site/index" ?>" class="nav__item-link" style="color: black;">Halaman Admin</a>
              </li>
              <?php } ?>
            <li class="nav__item">
              <a href="<?= Yii::$app->request->baseUrl . "/site/logout" ?>" class="nav__item-link" style="color: black;">Logout</a>
            </li><!-- /.nav-item -->
          <?php } ?>

          
            </ul>
          </li>
        <!-- </div> -->
          
          <!-- <div class="sekarang"> -->
            <li class="nav__item sekarang">
              <a href="<?= Url::to(["detail-program", "id" => $wakaf->id]) ?>"><button class="btn-sm btn-block text-white font-weight-bold" style="background-color: #f1a502;border-radius:6.4px;">Wakaf Sekarang</button></a>
            </li>
          <!-- </div> -->
         <div class="akun" style="margin-top: 2%;">
           <div class="row" style="margin-left: auto;margin-right:auto">
         <?php if (Yii::$app->user->identity->id == null) { ?>

            <!-- <li class="nav__item">
              <a href="<?= Yii::$app->request->baseUrl . "/site/login" ?>" class="nav__item-link" style="color: black;">Login</a>
            </li> -->
            <div class="col-6">
              <button type="button" class="btn-sm btn-block text-white font-weight-bold" style="background-color: #f1a502;" id="btn-user-login">Login</button>
            </div>

            <div class="col-6">
              <button type="button" class="btn-sm btn-block text-white font-weight-bold" style="background-color: #f1a502;" id="btn-user-registrasi">Daftar</button>
            </div>
          <?php } else { ?>
            
            <?php if (Yii::$app->user->identity->role_id == 1) { ?>
              <div class="col-4">
              <a href="<?= Yii::$app->request->baseUrl . "/home/profile" ?>" class="nav__item-link <?= checkCurrentNav('/home/profile', true) ?>" style="color: black;"><button class="btn-sm btn-block text-white font-weight-bold" style="background-color: #f1a502;">Akun Saya</button></a>
            </div>
            <div class="col-5" style="padding-right: 10px;padding-left: 10px;">
              <a href="<?= Yii::$app->request->baseUrl . "/site/index" ?>" class="nav__item-link" style="color: black;"><button class="btn-sm btn-block text-white font-weight-bold" style="background-color: #f1a502;">Halaman Admin</button></a>
            </div>
            <div class="col-3">
              <a href="<?= Yii::$app->request->baseUrl . "/site/logout" ?>" class="nav__item-link" style="color: black;"><button class="btn-sm btn-block text-white font-weight-bold" style="background-color: #f1a502;">Logout</button></a>
              </div>
              <?php }else{ ?>
                <div class="col-2">
            </div>
                <div class="col-4">
              <a href="<?= Yii::$app->request->baseUrl . "/home/profile" ?>" class="nav__item-link <?= checkCurrentNav('/home/profile', true) ?>" style="color: black;"><button class="btn-sm btn-block text-white font-weight-bold" style="background-color: #f1a502;">Akun Saya</button></a>
            </div>
            <div class="col-4">
              <a href="<?= Yii::$app->request->baseUrl . "/site/logout" ?>" class="nav__item-link" style="color: black;"><button class="btn-sm btn-block text-white font-weight-bold" style="background-color: #f1a502;">Logout</button></a>
              </div>
              <div class="col-2">
            </div>
              <?php } } ?>
            </div>
         </div>
          
          
          
        </ul><!-- /.navbar-nav -->
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container -->
  </nav><!-- /.navabr -->
</header><!-- /.Header -->
