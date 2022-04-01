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
@media screen and (min-width: 769px) {
  .dalam{
    display: none;
  }

.logo-header{
    margin-left: 0px;
  }
}
@media screen and (max-width: 768px) {
.awal{
  display: none;
}
}
</style>
<header id="header" class="header header-transparent">
  <nav class="navbar navbar-expand-lg sticky-navbar awal">
    <div class="container">
      
      <!-- <button class="navbar-toggler" type="button">
        <span class="menu-lines"><span></span></span>
      </button> -->
      <div class="collapse navbar-collapse" id="mainNavigation">
        <ul class="navbar-nav ml-auto">
          
          
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
            <li class="nav__item">
              <a href="<?= Yii::$app->request->baseUrl . "/site/logout" ?>" class="nav__item-link" style="color: black;">Logout</a>
            </li><!-- /.nav-item -->
          <?php } ?>

          <?php if (Yii::$app->user->identity->role_id == 1) { ?>

            <li class="nav__item">
            <a href="<?= Yii::$app->request->baseUrl . "/site/index" ?>" class="nav__item-link" style="color: black;">Halaman Admin</a>
            </li>
          <?php } ?>
        </ul><!-- /.navbar-nav -->
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container -->
  </nav><!-- /.navabr -->
  <nav class="navbar navbar-expand-lg sticky-navbar">
    <div class="container">
      <a href="<?= Yii::$app->request->baseUrl ?>">
        <img src="<?= $icons ?>" class="logo-header logo-light" alt="logo">
        <img src="<?= $icons ?>" class="logo-header logo-dark" alt="logo">
      </a>
      <button class="navbar-toggler" type="button">
        <span class="menu-lines"><span></span></span>
      </button>
      <div class="collapse navbar-collapse" id="mainNavigation">
        <ul class="navbar-nav ml-auto">
          <div class="dalam">
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
            <li class="nav__item">
              <a href="<?= Yii::$app->request->baseUrl . "/site/logout" ?>" class="nav__item-link" style="color: black;">Logout</a>
            </li><!-- /.nav-item -->
          <?php } ?>

          <?php if (Yii::$app->user->identity->role_id == 1) { ?>

            <li class="nav__item">
            <a href="<?= Yii::$app->request->baseUrl . "/site/index" ?>" class="nav__item-link" style="color: black;">Halaman Admin</a>
            </li>
          <?php } ?>
          </div>
          <li class="nav__item">
            <a href="<?= Yii::$app->request->baseUrl."/home" ?>" class="nav__item-link <?= checkCurrentNav(["/home"]) ?>">Beranda</a>
          </li><!-- /.nav-item -->
          <li class="nav__item with-dropdown">
            <a href="<?= \Yii::$app->request->baseUrl . "/home#" ?>" class="dropdown-toggle nav__item-link
            <?= checkCurrentNav(["/home/organisasi", "/home/latar-belakang", "/home/program","/home/visi"]) ?>">
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

              <li class="nav__item"><a href="<?= \Yii::$app->request->baseUrl . "/home/organisasi" ?>" class="nav__item-link text-dark">Organisasi</a></li>

              <!-- <li class="nav__item"><a href="<?= \Yii::$app->request->baseUrl . "/home/kontak" ?>" class="nav__item-link text-dark">Kontak</a></li> -->

              <!-- <li class="nav__item">
            <a href="<?= Yii::$app->request->baseUrl . "/home/program" ?>" class="nav__item-link">Program</a>
          </li> -->

          <li class="nav__item dropdown-submenu">
        <a class="test" tabindex="-1" href="#">Program <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li class="nav__item"><a tabindex="-1" href="<?= Yii::$app->request->baseUrl . "/home/program" ?> "class="nav__item-link text-dark">Semua Program</a></li>
          <li class="nav__item"><a tabindex="-1" href="<?= \Yii::$app->request->baseUrl . "/home/program?kategori=Sosial" ?> "class="nav__item-link text-dark">Wakaf Sosial</a></li>
          <li class="nav__item"><a tabindex="-1" href="<?= \Yii::$app->request->baseUrl . "/home/program?kategori=Produktif" ?> "class="nav__item-link text-dark">Wakaf Produktif</a></li>
          <!-- <li class="nav__item dropdown-submenu">
            <a class="test" href="#">Another dropdown <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li class="nav__item"><a href="#">3rd level dropdown</a></li>
              <li class="nav__item"><a href="#">3rd level dropdown</a></li>
            </ul>
          </li> -->
        </ul>
      </li>
      <li class="nav__item dropdown-submenu">
        <a class="test" tabindex="-1" href="#">ZIS <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <!-- <li class="nav__item"><a tabindex="-1" href="<?= Yii::$app->request->baseUrl . "/home/program" ?>">Semua Program</a></li>
          <li class="nav__item"><a tabindex="-1" href="<?= \Yii::$app->request->baseUrl . "/home/program?kategori=Sosial" ?>">Wakaf Sosial</a></li>
          <li class="nav__item"><a tabindex="-1" href="<?= \Yii::$app->request->baseUrl . "/home/program?kategori=Produktif" ?>">Wakaf Produktif</a></li> -->
          <li class="nav__item"><a tabindex="-1" href="<?= \Yii::$app->request->baseUrl . "/home/program-zakat" ?>" class="nav__item-link text-dark">Zakat</a></li>

              <li class="nav__item"><a tabindex="-1" href="<?= \Yii::$app->request->baseUrl . "/home/program-infak" ?>" class="nav__item-link text-dark">Infak</a></li>

              <li class="nav__item"><a tabindex="-1" href="<?= \Yii::$app->request->baseUrl . "/home/program-sedekah" ?>" class="nav__item-link text-dark">Sedekah</a></li>

              <li class="nav__item"><a tabindex="-1" href="<?= \Yii::$app->request->baseUrl . "/home/kalkulator-zakat" ?>" class="nav__item-link text-dark">Kalkulator Zakat</a></li>

          <!-- <li class="nav__item dropdown-submenu">
            <a class="test" href="#">Another dropdown <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li class="nav__item"><a href="#">3rd level dropdown</a></li>
              <li class="nav__item"><a href="#">3rd level dropdown</a></li>
            </ul>
          </li> -->
        </ul>
      </li>
      
          <!-- <li class="nav__item dropdown-submenu">
        <a class="test" tabindex="-1" href="#">New dropdown <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li class="nav__item"><a tabindex="-1" href="#">2nd level dropdown</a></li>
          <li class="nav__item"><a tabindex="-1" href="#">2nd level dropdown</a></li>
          <li class="nav__item dropdown-submenu">
            <a class="test" href="#">Another dropdown <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li class="nav__item"><a href="#">3rd level dropdown</a></li>
              <li class="nav__item"><a href="#">3rd level dropdown</a></li>
            </ul>
          </li>
        </ul>
      </li> -->

            </ul>
          </li>
          <!-- <li class="nav__item">
            <a href="<?= \Yii::$app->request->baseUrl . "/home/program?kategori=Sosial" ?>" class="nav__item-link <?= checkCurrentNav('/home/program?kategori=Sosial', true) ?>">Wakaf Sosial</a>
          </li>
          <li class="nav__item">
            <a href="<?= \Yii::$app->request->baseUrl . "/home/program?kategori=Produktif" ?>" class="nav__item-link <?= checkCurrentNav('/home/program?kategori=Produktif', true) ?>">Wakaf Produktif</a>
          </li> -->

          <!-- <li class="nav__item with-dropdown">
            <a href="<?= \Yii::$app->request->baseUrl . "/home#" ?>" class="dropdown-toggle nav__item-link
            <?= checkCurrentNav(["/home/program-zakat", "/home/program-infak", "/home/program-sedekah", "/home/kalkulator-zakat"]) ?>">
              <div class="d-none d-lg-block">
                ZIS <i class="fa fa-angle-down"></i>
              </div>
              <div class="d-none d-md-block d-sm-block d-block d-lg-none">
                ZIS</i>
              </div>
            </a>
            <i class="fa fa-angle-right" data-toggle="dropdown"></i>
            <ul class="dropdown-menu">
              <li class="nav__item"><a href="<?= \Yii::$app->request->baseUrl . "/home/program-zakat" ?>" class="nav__item-link text-dark">Zakat</a></li>

              <li class="nav__item"><a href="<?= \Yii::$app->request->baseUrl . "/home/program-infak" ?>" class="nav__item-link text-dark">Infak</a></li>

              <li class="nav__item"><a href="<?= \Yii::$app->request->baseUrl . "/home/program-sedekah" ?>" class="nav__item-link text-dark">Sedekah</a></li>

              <li class="nav__item"><a href="<?= \Yii::$app->request->baseUrl . "/home/kalkulator-zakat" ?>" class="nav__item-link text-dark">Kalkulator Zakat</a></li>

            </ul>
          </li> -->
          <li class="nav__item with-dropdown">
            <a href="<?= \Yii::$app->request->baseUrl . "/home#" ?>" class="dropdown-toggle nav__item-link
            <?= checkCurrentNav(["/home/afiliasi", "/home/daftar-wakaf"]) ?>">
              <div class="d-none d-lg-block">
                Layanan <i class="fa fa-angle-down"></i>
              </div>
              <div class="d-none d-md-block d-sm-block d-block d-lg-none">
                Layanan</i>
              </div>
            </a>
            <i class="fa fa-angle-right" data-toggle="dropdown"></i>
            <ul class="dropdown-menu">
              <li class="nav__item"><a href="<?= \Yii::$app->request->baseUrl . "/home/afiliasi" ?>" class="nav__item-link text-dark">Afiliasi</a></li>

              <li class="nav__item"><a href="<?= \Yii::$app->request->baseUrl . "/home/daftar-wakaf" ?>" class="nav__item-link text-dark">Daftar Wakaf</a></li>

            </ul>
          </li>
          <li class="nav__item with-dropdown">
            <a href="<?= \Yii::$app->request->baseUrl . "/home#" ?>" class="dropdown-toggle nav__item-link
            <?= checkCurrentNav(["/home/regulasi-wakaf", "/home/aturan-wakaf","/home/fiqih-wakaf"]) ?>">
              <div class="d-none d-lg-block">
                Literasi <i class="fa fa-angle-down"></i>
              </div>
              <div class="d-none d-md-block d-sm-block d-block d-lg-none">
                Literasi</i>
              </div>
            </a>
            <i class="fa fa-angle-right" data-toggle="dropdown"></i>
            <ul class="dropdown-menu">
              <li class="nav__item"><a href="<?= \Yii::$app->request->baseUrl . "/home/regulasi-wakaf" ?>" class="nav__item-link text-dark">Regulasi</a></li>

              <li class="nav__item"><a href="<?= \Yii::$app->request->baseUrl . "/home/aturan-wakaf" ?>" class="nav__item-link text-dark">Aturan Wakaf</a></li>

              <li class="nav__item"><a href="<?= \Yii::$app->request->baseUrl . "/home/fiqih-wakaf" ?>" class="nav__item-link text-dark">Fikih Wakaf</a></li>

            </ul>
          </li>
          <!-- <li class="nav__item">
            <a href="<?= Yii::$app->request->baseUrl . "/home/ziswaf" ?>" class="nav__item-link">Ziswaf</a>
          </li> -->
          <!-- /.nav-item -->
          <!-- <li class="nav__item">
            <a href="<?= Yii::$app->request->baseUrl . "/home/program" ?>" class="nav__item-link <?php if($relativeHomeUrl == "/web/home/program"){ echo "active"; } ?>">Wakaf</a>
          </li> -->
          <li class="nav__item">
            <a href="<?= Yii::$app->request->baseUrl . "/news" ?>" class="nav__item-link <?= checkCurrentNav(["/home/news", "/detail-berita"]) ?>">Berita</a>
          </li>

          <li class="nav__item with-dropdown">
            <a href="<?= \Yii::$app->request->baseUrl . "/home#" ?>" class="dropdown-toggle nav__item-link
            <?= checkCurrentNav(["/home/alamat-kantor", "/home/telp","/home/map","/home/pesan","/home/medsos"]) ?>">
              <div class="d-none d-lg-block">
                Kontak Kami <i class="fa fa-angle-down"></i>
              </div>
              <div class="d-none d-md-block d-sm-block d-block d-lg-none">
                Kontak Kami</i>
              </div>
            </a>
            <i class="fa fa-angle-right" data-toggle="dropdown"></i>
            <ul class="dropdown-menu">
              <li class="nav__item"><a href="<?= \Yii::$app->request->baseUrl . "/home/alamat-kantor" ?>" class="nav__item-link text-dark">Alamat Kantor</a></li>

              <li class="nav__item"><a href="<?= \Yii::$app->request->baseUrl . "/home/telp" ?>" class="nav__item-link text-dark">No Telpon & Email</a></li>

              <li class="nav__item"><a href="<?= \Yii::$app->request->baseUrl . "/home/map" ?>" class="nav__item-link text-dark">Map</a></li>

              <li class="nav__item"><a href="<?= \Yii::$app->request->baseUrl . "/home/pesan" ?>" class="nav__item-link text-dark">Pesan</a></li>

              <li class="nav__item"><a href="<?= \Yii::$app->request->baseUrl . "/home/medsos" ?>" class="nav__item-link text-dark">Medsos</a></li>

            </ul>
          </li>

          <li class="nav__item">
            <a href="<?= Url::to(["detail-program", "id" => $wakaf->id]) ?>" class="nav__item-link active">Wakaf Sekarang</a>
          </li>
          <!-- <li class="nav__item with-dropdown">
            <a href="<?= \Yii::$app->request->baseUrl . "/home/news/" ?>" class="dropdown-toggle nav__item-link">
              <div class="d-none d-lg-block">
                Berita <i class="fa fa-angle-down"></i>
              </div>
              <div class="d-none d-md-block d-sm-block d-block d-lg-none">
                Berita</i>
              </div>
            </a>
            <i class="fa fa-angle-right" data-toggle="dropdown"></i>
            <ul class="dropdown-menu">              
              <?php foreach ($categories as $kategori) {  ?>
                <li class="nav__item"><a href="<?= \Yii::$app->request->baseUrl . "/home/news?kategori=" . $kategori->nama ?>" class="nav__item-link text-dark"><?= $kategori->nama ?></a></li>
              <?php } ?>
            </ul>
          </li> -->
          <!-- <li class="nav__item with-dropdown">
            <a href="<?= \Yii::$app->request->baseUrl . "/home#" ?>" class="dropdown-toggle nav__item-link">
              <div class="d-none d-lg-block">
                Layanan <i class="fa fa-angle-down"></i>
              </div>
              <div class="d-none d-md-block d-sm-block d-block d-lg-none">
                Layanan</i>
              </div>
            </a>
            <i class="fa fa-angle-right" data-toggle="dropdown"></i>
            <ul class="dropdown-menu">
              <li class="nav__item"><a href="<?= \Yii::$app->request->baseUrl . "/home/rekening" ?>" class="nav__item-link text-dark">Daftar Rekening</a></li>
              <li class="nav__item"><a href="<?= \Yii::$app->request->baseUrl . "/home/report" ?>" class="nav__item-link text-dark">Anual Report</a></li>
            </ul>
          </li> -->
          <!-- <li class="nav__item">
            <a href="<?= Yii::$app->request->baseUrl . "/home/report" ?>" class="nav__item-link <?php if($relativeHomeUrl == "/web/home/report"){ echo "active"; } ?>">Layanan</a>
          </li> -->
          
          
        </ul><!-- /.navbar-nav -->
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container -->
  </nav><!-- /.navabr -->
</header><!-- /.Header -->

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
<!-- <script type="text/javascript">
$(document).ready(function(){
  $('.dropdown-submenu a.test').on("click", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
  });
});
</script> -->