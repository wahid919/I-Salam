<?php
use yii\helpers\Html;
use yii\helpers\Url;

$setting = app\models\Setting::find()->one();
$icons = \Yii::$app->request->baseUrl . "/uploads/setting/" . $setting->logo;
$categories = app\models\KategoriBerita::find()->all();
$kategori_pendanaans = app\models\KategoriPendanaan::find()->all();

// $relativeHomeUrl = $_SERVER['REQUEST_URI'];
if (function_exists("checkCurrentNav") == false) {
  function checkCurrentNav($target, $withindex = false)
  {
      $text = "";
      $current_url = Url::current();
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
    color : #00f !important;
  }
@media screen and (min-width: 768px) {
  .dalam{
    display: none;
  }
}
@media screen and (max-width: 767px) {
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
              <a href="<?= Url::to(["home/profile"], true) ?>" class="nav__item-link <?= checkCurrentNav('/home/profile', true) ?>" style="color: black;">Akun Saya</a>
            </li><!-- /.nav-item -->
            <li class="nav__item">
              <a href="<?= Url::to(["site/logout"], true) ?>" class="nav__item-link" style="color: black;">Logout</a>
            </li><!-- /.nav-item -->
          <?php } ?>

          <?php if (Yii::$app->user->identity->role_id == 1) { ?>

            <li class="nav__item">
            <a href="<?= Url::to(["site/index"], true) ?>" class="nav__item-link <?= checkCurrentNav('/site/index', true) ?>" style="color: black;">Halaman Admin</a>
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
              <a href="<?= Yii::$app->request->baseUrl . "/site/login" ?>" class="nav__item-link <?= checkCurrentNav('/home', true) ?>" style="color: black;">Login</a>
            </li> -->
            <li class="nav__item">
              <a id="btn-login" class="nav__item-link" style="color: black;cursor:pointer">Login</a>
            </li>
            <li class="nav__item">
              <a id="btn-registrasi" class="nav__item-link" style="color: black;cursor:pointer">Daftar</a>
            </li>
          <?php } else { ?>
            <li class="nav__item">
              <a href="<?= Url::to(["home/profile"], true) ?>" class="nav__item-link <?= checkCurrentNav('/home/profile', true) ?>" style="color: black;">Akun Saya</a>
            </li><!-- /.nav-item -->
            <li class="nav__item">
              <a href="<?= Url::to(["site/logout"], true) ?>" class="nav__item-link" style="color: black;">Logout</a>
            </li><!-- /.nav-item -->
          <?php } ?>

          <?php if (Yii::$app->user->identity->role_id == 1) { ?>

            <li class="nav__item">
            <a href="<?= Url::to(["site/index"], true) ?>" class="nav__item-link <?= checkCurrentNav('/site/index', true) ?>" style="color: black;">Halaman Admin</a>
            </li>
          <?php } ?>
          </div>
          <li class="nav__item">
            <a href="<?= Url::to(["home"], true) ?>" class="nav__item-link <?= checkCurrentNav('/home', true) ?>">Beranda</a>
          </li><!-- /.nav-item -->
          <li class="nav__item with-dropdown">
            <a href="<?= Url::to(["home/index"], true) ?>" class="dropdown-toggle nav__item-link 
            <?= checkCurrentNav(["/home/index", "/home/organisasi", "/home/latar-belakang", "/home/program"]) ?>">
              <div class="d-none d-lg-block">
                Tentang Kami <i class="fa fa-angle-down"></i>
              </div>
              <div class="d-none d-md-block d-sm-block d-block d-lg-none">
                Tentang Kami</i>
              </div>
            </a>
            <i class="fa fa-angle-right" data-toggle="dropdown"></i>
            <ul class="dropdown-menu">
              <li class="nav__item"><a href="<?= Url::to(["home/latar-belakang"], true) ?>" class="nav__item-link text-dark <?= checkCurrentNav('/home/latar-belakang', true) ?>">Latar Belakang</a></li>

              <li class="nav__item"><a href="<?= Url::to(["home/visi"], true) ?>" class="nav__item-link text-dark  <?= checkCurrentNav('/home/visi', true) ?>">Visi Misi</a></li>

              <li class="nav__item"><a href="<?= Url::to(["home/organisasi"], true) ?>" class="nav__item-link text-dark  <?= checkCurrentNav('/home/organisasi', true) ?>">Organisasi</a></li>

              <!-- <li class="nav__item"><a href="<?= \Yii::$app->request->baseUrl . "/home/kontak" ?>" class="nav__item-link text-dark  <?= checkCurrentNav('/home/latar-belakang', true) ?>">Kontak</a></li> -->

              <li class="nav__item">
            <a href="<?= Url::to(["home/program"], true) ?>" class="nav__item-link  <?= checkCurrentNav('/home/program', true) ?>">Program</a>
          </li>
            </ul>
          </li>
          <li class="nav__item">
            <a href="<?= Url::to(["home/program?kategori=Sosial"], true) ?>" class="nav__item-link <?= checkCurrentNav('/home/program?kategori=Sosial', true) ?>">Wakaf Sosial</a>
          </li>
          <li class="nav__item">
            <a href="<?= Url::to(["home/program?kategori=Produktif"], true) ?>" class="nav__item-link <?= checkCurrentNav('/home/program?kategori=Produktif', true) ?>">Wakaf Produktif</a>
          </li>

          <li class="nav__item with-dropdown">
            <a href="<?= \Yii::$app->request->baseUrl . "/home#" ?>" class="dropdown-toggle nav__item-link">
              <div class="d-none d-lg-block">
                ZIS <i class="fa fa-angle-down"></i>
              </div>
              <div class="d-none d-md-block d-sm-block d-block d-lg-none">
                ZIS</i>
              </div>
            </a>
            <i class="fa fa-angle-right" data-toggle="dropdown"></i>
            <ul class="dropdown-menu">
              <li class="nav__item"><a href="<?= Url::to(["home/program-zakat"], true) ?>" class="nav__item-link text-dark  <?= checkCurrentNav('/home/program-zakat', true) ?>">Zakat</a></li>

              <li class="nav__item"><a href="<?= Url::to(["home/program-infak"], true) ?>" class="nav__item-link text-dark  <?= checkCurrentNav('/home/program-infak', true) ?>">Infak</a></li>

              <li class="nav__item"><a href="<?= Url::to(["home/program-sedekah"], true) ?>" class="nav__item-link text-dark  <?= checkCurrentNav('/home/program-sedekah', true) ?>">Sedekah</a></li>

              <li class="nav__item"><a href="<?= Url::to(["home/program-zakat"], true) ?>" class="nav__item-link text-dark  <?= checkCurrentNav('/home/program-zakat', true) ?>">Kalkulator Zakat</a></li>

            </ul>
          </li>
          <li class="nav__item with-dropdown">
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
              <li class="nav__item"><a href="<?= Url::to(["home/afiliasi"], true) ?>" class="nav__item-link text-dark  <?= checkCurrentNav('/home/afiliasi', true) ?>">Afiliasi</a></li>

              <li class="nav__item"><a href="<?= Url::to(["home/daftar-wakaf"], true) ?>" class="nav__item-link text-dark  <?= checkCurrentNav('/home/daftar-wakaf', true) ?>">Daftar Wakaf</a></li>

            </ul>
          </li>
          <li class="nav__item with-dropdown">
            <a href="<?= \Yii::$app->request->baseUrl . "/home#" ?>" class="dropdown-toggle nav__item-link">
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
            <a href="<?= Yii::$app->request->baseUrl . "/home/news" ?>" class="nav__item-link <?php if($relativeHomeUrl == "/web/home/news"){ echo "active"; } ?>">Berita</a>
          </li>

          <li class="nav__item with-dropdown">
            <a href="<?= \Yii::$app->request->baseUrl . "/home#" ?>" class="dropdown-toggle nav__item-link">
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