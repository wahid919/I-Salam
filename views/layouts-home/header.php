<?php

use app\components\Angka;
use app\models\AmanahPendanaan;
use app\models\Pendanaan;
use yii\helpers\Url;
use yii\db\Expression;

$setting = app\models\Setting::find()->one();
$icons = \Yii::$app->request->baseUrl . "/uploads/setting/" . $setting->logo;
$categories = app\models\KategoriBerita::find()->all();
$kategori_pendanaans = app\models\KategoriPendanaan::find()->all();

$pendanaan = Pendanaan::find()->where(['status_tampil' => 1])->orderBy(new Expression('rand()'))->one();

$amanah_pendanaan = AmanahPendanaan::find()->where(['pendanaan_id' => $pendanaan->id])->all();
// $relativeHomeUrl = $_SERVER['REQUEST_URI'];
if (function_exists("checkCurrentNav") == false) {
  function checkCurrentNav($target, $withindex = false)
  {
      $text = "";
      $current_url = Url::current();
      // $current_url = $_SERVER['REQUEST_URI'];
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
    padding-left: 9px;
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
.dropdown-submenu.right-submenu>a:after {
  -webkit-transform: rotate(180deg);
    display: block;
    content: " ";
    float: right;
    width: 0;
    height: 0;
    border-color: transparent;
    border-style: solid;
    border-width: 5px 5px 5px 0;
    border-right-color: #2a2a2a;
    margin-top: 12px;
    margin-left: -10px;
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
    margin-left: 4%!important;
  }
  .navbar .navbar-nav {
        /* margin: 0 !important; */
     /* margin-left: 2%; */
     margin-right: 2%!important;
    }
    .navbar .dropdown-menu .nav__item .nav__item-link {
    padding-left: 9px;
    border-bottom: none;
    }
    .test{
      border-bottom: none;
    }
}
}
</style>
<header id="header" class="header header-transparent">
  <nav class="navbar navbar-expand-lg sticky-navbar">
    <div class="container">
      <a href="<?= Yii::$app->request->baseUrl ?>" style="font-family: cursive;font-size:large;color:#d07404">
        <img src="<?= $icons ?>" class="logo-header logo-light" alt="logo">
        <img src="<?= $icons ?>" class="logo-header logo-dark" alt="logo">
        I-Salam
      </a>
      <div class="sekarang-mobile" style="margin-right: auto;margin-left:auto">
        <!-- <a href="<?= Url::to(["detail-program", "id" => $wakaf->id]) ?>"> -->
      <a href="#" data-toggle="modal" data-target="#mulaiwakafheader">
        <button class="btn-sm btn-block text-white font-weight-bold text-left" style="background-color: #f1a502;border-radius:6.4px;">Wakaf Sekarang</button>
      </a>
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
              <li class="nav__item dropdown-submenu right-submenu">
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
              <!-- <a href="<?= Url::to(["detail-program", "id" => $wakaf->id]) ?>"> -->
              <a href="#" data-toggle="modal" data-target="#mulaiwakafheader">
              <button class="btn-sm btn-block text-white font-weight-bold" style="background-color: #f1a502;border-radius:6.4px;">Wakaf Sekarang</button>
            </a>
            </li>
          <!-- </div> -->
         <div class="akun" style="margin-top: 2%;">
           <div class="row" style="margin-left: auto;margin-right:auto">
         <?php if (Yii::$app->user->identity->id == null) { ?>

            <!-- <li class="nav__item">
              <a href="<?= Yii::$app->request->baseUrl . "/site/login" ?>" class="nav__item-link" style="color: black;">Login</a>
            </li> -->
            <div class="col-6">
              <button type="button" class="btn-sm btn-block text-white font-weight-bold" style="background-color: #f1a502;" id="btn-user-login-header">Login</button>
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

<!-- Modal -->
<div class="modal fade" id="mulaiwakafheader" tabindex="-1" role="dialog" aria-labelledby="mulaiwakafheader" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="mulaiwakafheader">Pembayaran</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <ul class="nav nav-tabs pb-4" id="isalam" role="tablist">
              <li class="nav-item text-center" style="width: 50%;">
                <a class="nav-link font-weight-bold active" id="Wakaf-tab" data-toggle="tab" href="#pembayaran" role="tab" aria-controls="pembayaran" aria-selected="true"><i class="fas fa-hand-holding-usd"></i> Uang</a>
              </li>
              <li class="nav-item text-center" style="width: 50%;">
                <a class="nav-link font-weight-bold" id="wakaf-tab" data-toggle="tab" href="#lembaran" role="tab" aria-controls="lembaran" aria-selected="false"><i class="fas fa-money-bill-alt"></i> Lembaran</a>
              </li>
            </ul>
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="pembayaran" role="tabpanel" aria-labelledby="pembayaran-tab">
                <div class="row">
                  <div class="col-4">
                    <img class="border-r10 shadow-br3" src="<?= \Yii::$app->request->BaseUrl ?>/uploads/detail-program.jpeg" width="200px">
                  </div>
                  <div class="col-8">
                    <p class="font-size-08">Anda akan berwakaf untuk project :</p>
                    <p class="font-weight-bold">
                      <?= $pendanaan->nama_pendanaan ?>
                    </p>
                  </div>
                  <div class="col-12 pt-3">
                    <h3 style="color: #404040;">Nominal Wakaf</h3>
                    <p class="font-size-08">Beban Biaya Setiap Transaksi :</p>
                    <table style="width: 100%;">
                      <tbody>
                      <tr>
                      <td style="width: 50%;"><p class="font-size-08">Bank Transfer : <?php $hrg = 4000; echo Angka::toReadableHarga($hrg,false) ?></p></td>
                      </tr>
                      </tbody>
                    </table>

                    <p class="font-size-08">Amanah Wakaf :</p>
                    <div class="row">
                      <?php $i=0; foreach($amanah_pendanaan as $value){ ?>
                    <div class="col-6">
                        <input type="radio" id="amanah_header" name="amanah_header" value="<?= $value->amanah ?>" <?= $i==0 ? "checked" : "" ?>>
                        <label for="amanah_header"><?= $value->amanah ?></label><br>
                      </div>
                      <?php $i++;} ?>
                    </div>
                    <p class="font-size-08">Anda akan berwakaf dengan nominal sebesar :</p>
                    <div class="row">
                      <div class="col-6">
                        <a href="#" class="btn btn-block btn-nilai-wakaf btn-outline-bayar border-r5 mt-2" role="button" aria-pressed="true" onclick="return theFunction_header(100000);">Rp. 100.000 ></a>
                      </div>
                      <div class="col-6">
                        <a href="#" class="btn btn-block btn-nilai-wakaf btn-outline-bayar border-r5 mt-2" role="button" aria-pressed="true" onclick="return theFunction_header(200000);">Rp. 200.000 ></a>
                      </div>
                      <div class="col-6">
                        <a href="#" class="btn btn-block btn-nilai-wakaf btn-outline-bayar border-r5 mt-2" role="button" aria-pressed="true" onclick="return theFunction_header(300000);">Rp. 300.000 ></a>
                      </div>
                      <div class="col-6">
                        <a href="#" class="btn btn-block btn-nilai-wakaf btn-outline-bayar border-r5 mt-2" role="button" aria-pressed="true" onclick="return theFunction_header(400000);">Rp. 400.000 ></a>
                      </div>
                      <div class="col-6">
                        <a href="#" class="btn btn-block btn-nilai-wakaf btn-outline-bayar border-r5 mt-2" role="button" aria-pressed="true" onclick="return theFunction_header(500000);">Rp. 500.000 ></a>
                      </div>
                      <div class="col-6">
                        <a href="#" class="btn btn-block btn-nilai-wakaf btn-outline-bayar border-r5 mt-2" role="button" aria-pressed="true" onclick="return theFunction_header(600000);">Rp. 600.000 ></a>
                      </div>
                      <!-- <div class="row"> -->
                      <div class="col-6">
                        <label for="nama_header">Nama</label>
                        <input type="text"class="form-control select-wakaf"  name="nama_header" id="nama_header" onkeyup="myFunctionname_header()" onkeydown="myFunctionname_header()" required>
                      </div>
                      <div class="col-6">
                        <label for="email_header">Email</label>
                        <input type="email"class="form-control select-wakaf"  name="email_header" id="email_header" onkeyup="myFunctionemail_header()" onkeydown="myFunctionemail_header()" required>
                      </div>
                      <div class="col-12">
                        <label for="phone_header">Phone</label>
                        <input type="number"class="form-control select-wakaf"  name="phone_header" id="phone_header" onkeyup="myFunctionphone_header()" onkeydown="myFunctionphone_header()" required>
                      </div>
                      <!-- </div> -->
                      <div class="col-12 mt-2">
                        <div class="input-group mb-2">
                          <div class="input-group-prepend mr-2" style="height:calc(1.5em + .75rem + 2px);">
                            <div class="input-group-text bg-white border-r5 font-weight-bold" style="color: #afafaf;border-color: #787878;">Rp</div>
                          </div>
                          <input type="number" class="form-control select-wakaf" id="nominal_header" name="nominal_header" onkeyup="myFunction_header()" onkeydown="myFunction_header()" style="border-color: #787878;" placeholder="Minimal Wakaf Rp. 10.000" required>
                          <button id="clear_header" class="btn btn-danger btn-sm" type="button" style="height: calc(1.5em + 0.75rem + 2px);
                          line-height: 34px;
                          width: 60px;background-color:firebrick;color:white;border-radius:0px;">
                          X</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <script>
                  function myFunction_header() {
  let x = document.getElementById("nominal_header");
  x.value = x.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');
}
                  function myFunctionname_header() {
  let x = document.getElementById("nama_header");
  x.addEventListener('keyup', function(e) {
        // console.log(this.value);
        x.setAttribute("value", this.value);
      });
  // x.value = x.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');
}
                  function myFunctionemail_header() {
  let x = document.getElementById("email_header");
  x.addEventListener('keyup', function(e) {
        // console.log(this.value);
        x.setAttribute("value", this.value);
      });
}
                function myFunctionphone_header() {
  let x = document.getElementById("phone_header");
  x.addEventListener('keyup', function(e) {
        // console.log(this.value);
        x.setAttribute("value", this.value);
      });
  x.value = x.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');
  
}
                  let hasils_header =document.querySelector('#nominal_header');
    window.addEventListener('load', () => {
        const button = document.querySelector('#clear_header');
        button.addEventListener('click', () => {
          
        hasils_header.setAttribute("value", 0);
            hasils_header.value = "";
        });
    }); 
   </script>
                <div class="modal-footer">
                  <button type="button" class="btn btn-sm btn-batal" style="background-color:firebrick;color:white" data-dismiss="modal">Batal</button>
                  <!-- <button type="button" class="btn btn-sm btn-program" data-toggle="modal" data-target="#exampleModalScrollable" id="bayarkan">Bayar</button> -->
                  <button type="button" class="btn btn-sm btn-program" style="padding: 10px !important;background-color:green" id="bayarkan_header">Bayar</button>
                </div>
              </div>
              <div class="tab-pane fade" id="lembaran" role="tabpanel" aria-labelledby="lembaran-tab">
                <div class="row">
                  <div class="col-4">
                    <img class="border-r10 shadow-br3" src="<?= \Yii::$app->request->BaseUrl ?>/uploads/detail-program.jpeg" width="200px">
                  </div>
                  <div class="col-8">
                    <p class="font-size-08">Anda akan berwakaf untuk project :</p>
                    <p class="font-weight-bold"><?= $pendanaan->nama_pendanaan ?></p>
                  </div>
                  <div class="col-12 pt-3">
                    <h3 style="color: #404040;">Lembar Wakaf</h3>
                    <p class="font-size-08">Beban Biaya Setiap Transaksi :</p>
                    <table style="width: 100%;">
                      <tbody>
                      <tr>
                      <td style="width: 50%;"><p class="font-size-08">Bank Transfer : <?php $hrg = 4000; echo Angka::toReadableHarga($hrg,false) ?></p></td>
                      </tr>
                      </tbody>
                    </table>
                    <p class="font-size-08">Amanah Wakaf :</p>
                    <div class="row">
                      <?php $i=0; foreach($amanah_pendanaan as $value){ ?>
                    <div class="col-6">
                        <input type="radio" id="amanah2_header" name="amanah2_header" value="<?= $value->amanah ?>" <?= $i==0 ? "checked" : "" ?>>
                        <label for="amanah2_header"><?= $value->amanah ?></label><br>
                      </div>
                      <?php $i++;} ?>
                    </div>
                    <p class="font-size-08">Anda akan berwakaf dengan nominal sebesar :<br />*Perlembar <?= \app\components\Angka::toReadableHarga($pendanaan->nominal_lembaran); ?></p>
                    <div class="row">
                    <div class="col-6">
                        <label for="nama2_header">Nama</label>
                        <input type="text"class="form-control select-wakaf"  name="nama2_header" id="nama2_header" onkeyup="myFunctionname2_header()" onkeydown="myFunctionname2_header()" required>
                      </div>
                      <div class="col-6">
                        <label for="email2_header">Email</label>
                        <input type="email"class="form-control select-wakaf"  name="email2_header" id="email2_header" onkeyup="myFunctionemail2_header()" onkeydown="myFunctionemail2_header()" required>
                      </div>
                      <div class="col-12">
                        <label for="phone2_header">Phone</label>
                        <input type="number"class="form-control select-wakaf"  name="phone2_header" id="phone2_header" onkeyup="myFunctionphone3_header()" onkeydown="myFunctionphone3_header()" required>
                      </div>
                      <div class="col-12 mt-2">
                        <div class="input-group mb-2">
                          <div class="input-group-prepend mr-2" style="height:calc(1.5em + .75rem + 2px);">
                            <div class="input-group-text bg-white border-r5 font-weight-bold" style="color: #afafaf;border-color: #787878;">Lembar</div>
                          </div>
                          <input type="number" class="form-control select-wakaf" id="nominal2_header" name="nominal2_header" style="border-color: #787878;" placeholder="Minimal Wakaf 1 Lembar" required>
                          <button id="clear2_header" class="btn btn-danger btn-sm" type="button" style="height: calc(1.5em + 0.75rem + 2px);
                          line-height: 34px;
                          width: 60px;background-color:firebrick;color:white;border-radius:0px;">
                          X</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-sm btn-batal" style="background-color:firebrick;color:white" data-dismiss="modal">Batal</button>
                  <!-- <button type="button" class="btn btn-sm btn-program" data-toggle="modal" data-target="#exampleModalScrollable" id="bayarkan">Bayar</button> -->
                  <button type="button" class="btn btn-sm btn-program" style="padding: 10px !important;background-color:green" id="bayarkan2_header">Bayar</button>
                </div>
              </div>
            </div>
          </div>
          <script>
            function myFunctionname2_header() {
  let x = document.getElementById("nama2_header");
  x.addEventListener('keyup', function(e) {
        // console.log(this.value);
        x.setAttribute("value", this.value);
      });
  // x.value = x.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');
}
                  function myFunctionemail2_header() {
  let x = document.getElementById("email2_header");
  x.addEventListener('keyup', function(e) {
        // console.log(this.value);
        x.setAttribute("value", this.value);
      });
}
                function myFunctionphone2_header() {
  let x = document.getElementById("phone2_header");
  x.addEventListener('keyup', function(e) {
        // console.log(this.value);
        x.setAttribute("value", this.value);
      });
  x.value = x.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');
  
}
                  let hasils2_header =document.querySelector('#nominal2_header');
    window.addEventListener('load', () => {
        const button = document.querySelector('#clear2_header');
        button.addEventListener('click', () => {
          
        hasils2_header.setAttribute("value", 0);
            hasils2_header.value = "";
        });
    }); 
   </script>
        </div>
      </div>
    </div>
    <script type="text/javascript">
      
      var datas = 0;
      theFunction_header(datas);
      var pendanaans = "<?php echo $pendanaan->id; ?>";
      document.querySelector("#bayarkan_header").addEventListener("click", () => {
        let nominal = document.querySelector("#nominal_header").getAttribute("value");
        let nama = document.querySelector("#nama_header").getAttribute("value");
        let email = document.querySelector("#email_header").getAttribute("value");
        let phone = document.querySelector("#phone_header").getAttribute("value");
        // let ele = document.querySelector("#amanah").getAttribute("value");
        let ele = document.getElementsByName("amanah_header");
        let amanah_pendanaan;
        for(i = 0; i < ele.length; i++) {
                  
                  if(ele[i].type="radio") {
                    
                      if(ele[i].checked)
                      amanah_pendanaan = ele[i].value;
                  }
              }
        if (nominal == null || nominal == "0" || nominal == 0) {
          alert("Anda Belum Mengisi Nominal Wakaf");
        }else if(nominal < 0 ){
          alert("Silahkan Isi Nominal Dengan Benar");
        }else if(nama == null){
          alert("Anda Belum Mengisi Nama Pewakaf");
        }else if(email == null){
          alert("Anda Belum Mengisi Email Pewakaf");
        }else if(phone == null){
          alert("Anda Belum Mengisi Nomor Telephone Pewakaf");
        }else {
          if(pendanaans == null){
          alert("Pendanaan Tidak Diketahui");
          }else{
            if(nominal <10000){
              alert("Minimal Rp 10.000");

            }else{
              window.location.href = `<?= Url::to(['/home/pembayaran-header', 'id' => $pendanaan->id]) ?>?nominal=${nominal}&amanah_pendanaan=${amanah_pendanaan}&nama=${nama}&email=${email}&phone=${phone}&ket=nominal`;
            }
          }
        }
      });
      document.querySelector("#bayarkan2_header").addEventListener("click", () => {
        let nominal2 = document.querySelector("#nominal2_header").getAttribute("value");
        let ele2 = document.getElementsByName("amanah2_header");
        let nama2 = document.querySelector("#nama2_header").getAttribute("value");
        let email2 = document.querySelector("#email2_header").getAttribute("value");
        let phone2 = document.querySelector("#phone2_header").getAttribute("value");
        let amanah_pendanaan2;
        for(ii = 0; ii < ele2.length; ii++) {
                  
                  if(ele2[ii].type="radio") {
                    
                      if(ele2[ii].checked)
                      amanah_pendanaan2 = ele2[ii].value;
                  }
              }
        if (nominal2 == null) {
          alert("Anda Belum Mengisi Nominal Wakaf");
        }else if(nama2 == null){
          alert("Anda Belum Mengisi Nama Pewakaf");
        }else if(email2 == null){
          alert("Anda Belum Mengisi Email Pewakaf");
        }else if(phone2 == null){
          alert("Anda Belum Mengisi Nomor Telephone Pewakaf");
        } else {
          if(pendanaan == null){
          alert("Pendanaan Tidak Diketahui");
          }else{
            window.location.href = `<?= Url::to(['/home/pembayaran-header', 'id' => $pendanaan->id]) ?>?nominal=${nominal2}&amanah_pendanaan=${amanah_pendanaan2}&nama=${nama2}&email=${email2}&phone=${phone2}ket=lembar`;
          }
        }
      });

      function theFunction_header(i) {

        var rupiahss;
        var php_vars = "<?php $php_vars; ?>";
        document.querySelector("#nominal_header").setAttribute("value", i);
        var aa = document.getElementById("nominal_header").value = i;
        let num = 15;
        let n = num.toString();
        coba = i;
        php_vars += aa;
        var number_strings = i.toString(),
          sisas = number_strings.length % 3,
          rupiahss = number_strings.substr(0, sisas),
          ribuans = number_strings.substr(sisas).match(/\d{3}/g);

        if (ribuans) {
          separators = sisas ? '.' : '';
          rupiahss += separators + ribuans.join('.');
        }
        // var b = document.getElementById("nom").innerHTML = "Rp. " + rupiah;
        // coba = "Rp. " + rupiah;
        // var p1 = document.getElementById("nom").value;
        // console.log(php_var);
        return i;
        // console.log(a);
        // data = a;
        // return true or false, depending on whether you want to allow the `href` property to follow through or not
      }
      var duit_her = document.getElementById("nominal_header");
      duit_her.addEventListener('keyup', function(e) {
        // console.log(this.value);
        duit_her.setAttribute("value", this.value);
      });
      var duit2_her = document.getElementById("nominal2_header");
      duit2_her.addEventListener('keyup', function(e) {
        // console.log(this.value);
        duit2_her.setAttribute("value", this.value);
      });

      // console.log(data);
    </script>