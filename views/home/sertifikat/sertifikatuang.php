<?php
function huruf($total_donasi)
{
  $total_donasi = (float) $total_donasi;
  $huruf = array(
    "",
    "Satu",
    "Dua",
    "Tiga",
    "Empat",
    "Lima",
    "Enam",
    "Tujuh",
    "Delapan",
    "Sembilan",
    "Sepuluh",
    "Sebelas"
  );

  if ($total_donasi < 12) {
    return $huruf[(int) $total_donasi];
  } elseif ($total_donasi < 20) {
    return terbilang($total_donasi - 10) . " Belas";
  } elseif ($total_donasi < 100) {
    return terbilang(floor($total_donasi / 10)) . " Puluh " . terbilang($total_donasi % 10);
  } elseif ($total_donasi < 200) {
    return "Seratus " . terbilang($total_donasi - 100);
  } elseif ($total_donasi < 1000) {
    return terbilang(floor($total_donasi / 100)) . " Ratus " . terbilang($total_donasi % 100);
  } elseif ($total_donasi < 2000) {
    return "Seribu " . terbilang($total_donasi - 1000);
  } elseif ($total_donasi < 1000000) {
    return terbilang(floor($total_donasi / 1000)) . " Ribu " . terbilang($total_donasi % 1000);
  } elseif ($total_donasi < 1000000000) {
    return terbilang(floor($total_donasi / 1000000)) . " Juta " . terbilang($total_donasi % 1000000);
  } elseif ($total_donasi < 1000000000000) {
    return terbilang(floor($total_donasi / 1000000000)) . " Milyar " . terbilang(fmod($total_donasi, 1000000000));
  } elseif ($total_donasi < 1000000000000000) {
    return terbilang(floor($total_donasi / 1000000000000)) . " Trilyun " . terbilang(fmod($total_donasi, 1000000000000));
  } else {
    return "Data terlalu besar";
  }
}
function terbilang_angka($total_donasi)
{
  $angka_arr = explode(',', $total_donasi);
  $angka = (int) str_replace('.', '', $angka_arr[0]);
  $terbilang = terbilang($angka);
  return ucfirst($terbilang) . " Rupiah";
}
// $total_donasi = 400000; // Ganti dengan nilai total_donasi yang sesuai
// $terbilang_total_donasi = huruf($total_donasi);
$terbilang_total_donasi = terbilang_angka($total_donasi);
?>
<!DOCTYPE html>
<!-- Created by pdf2htmlEX (https://github.com/coolwanglu/pdf2htmlex) -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta charset="utf-8" />

  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <link rel="stylesheet" href="<?= \Yii::$app->request->BaseUrl . '/sertifikat/base.min.css' ?>" />
  <link rel="stylesheet" href="<?= \Yii::$app->request->BaseUrl . '/sertifikat/fancy.min.css' ?>" />
  <link rel="stylesheet" href="<?= \Yii::$app->request->BaseUrl . '/sertifikat/main.css' ?>" />
  <script src="<?= \Yii::$app->request->BaseUrl . '/sertifikat/compatibility.min.js' ?>"></script>
  <script src="<?= \Yii::$app->request->BaseUrl . '/sertifikat/theViewer.min.js' ?>"></script>
  <script>
    try {
      theViewer.defaultViewer = new theViewer.Viewer({});
    } catch (e) {}
  </script>
  <title></title>
</head>

<body>
  <div id="sidebar">
    <div id="outline"></div>
  </div>
  <div id="page-container">
    <div id="pf1" class="pf w0 h0" data-page-no="1">
      <div class="pc pc1 w0 h0">
        <img class="bi x0 y0 w0 h0" alt="" src="<?= Yii::getAlias('@web/sertifikat/bg1.jpg')  ?>" />
        <div class="" style="margin-top: -43.7%; margin-left: 45%;">
          <?= Yii::$app->user->identity->name ?>
        </div>
        <div class="t m0 remail hemail y5 ff2 fs1 fc1 sc0 ls6 ws0" style="margin-left: 45%; margin-top: 0.3%"><?= Yii::$app->user->identity->username ?></div>
        <div class="t m0 rnumber hnumber y6 ff2 fs1 fc1 sc0 ls6 ws0" style="margin-left: 45%; margin-top: 0.3%"><?= Yii::$app->user->identity->nomor_handphone ?></div>
        <div class="t m0 rnominal hnominal y19 ff2 fs1 fc1 sc0 ls6 ws0" style="margin-left: 36.3%; margin-top: 4.4%; font-size: 80%"><?= \app\components\Angka::toReadableHarga($total_donasi); ?></div>
        <div class="t m0 rterbilang h5 hterbilang ff2 fs4 fc1 sc0 ls6 ws0" style="margin-left: 42.5%; margin-top: 1.9%;font-size: 65%"><?= $terbilang_total_donasi ?></div>
        <div class="t m0 rprogram h5 hprogram ff2 fs4 fc1 sc0 ls6 ws0" style="margin-left: 61.5%; margin-top: 2.5%;font-size: 65%"><?= $kegiatan ?></div>
        <div class="t m0 ramanah h5 hamanah ff2 fs4 fc1 sc0 ls6 ws0" style="margin-left: 64.5%; margin-top: 2.6%;font-size: 65%">Organisasi</div>
        <!-- <div class="t m0 x1 h1 y1 ff1 fs0 fc0 sc0 ls0 ws0">I</div>
          <div class="t m0 x2 h2 y2 ff2 fs1 fc1 sc0 ls1 ws0">
            Dengan<span class="ls2">
              <span class="_ _0"></span
              ><span class="ls3"
                >ini<span class="ls4">
                  <span class="ls5">Saya,</span></span
                ></span
              ></span
            >
          </div>
          <div class="t m0 x2 h2 y3 ff2 fs1 fc1 sc0 ls6 ws0">
            Na<span class="ls7">m<span class="ls5">a</span></span>
          </div>
          <div class="t m0 x3 h1 y4 ff1 fs0 fc0 sc0 ls0 ws0">I</div>
          <div class="t m0 x2 h2 y5 ff2 fs1 fc1 sc0 ls3 ws0">Email</div>
          <div class="t m0 x2 h2 y6 ff2 fs1 fc1 sc0 ls3 ws0">No. HP</div>
          <div class="t m0 x4 h1 y7 ff1 fs0 fc0 sc0 ls0 ws0">I</div>
          <div class="t m0 x5 h3 y8 ff1 fs2 fc0 sc0 ls8 ws0">I</div>
          <div class="t m0 x6 h3 y9 ff1 fs2 fc0 sc0 ls9 ws0">I</div>
          <div class="t m0 x7 h1 ya ff1 fs0 fc0 sc0 ls0 ws0">I</div>
          <div class="t m0 x8 h1 yb ff1 fs0 fc0 sc0 ls0 ws0">I</div>
          <div class="t m0 x9 h2 yc ff1 fs1 fc0 sc0 lsa ws0">I</div>
          <div class="t m0 xa h1 yd ff1 fs0 fc0 sc0 ls0 ws0">I</div>
          <div class="t m0 xb h2 ye ff1 fs1 fc0 sc0 lsa ws0">I</div>
          <div class="t m0 xc h1 yf ff1 fs0 fc0 sc0 ls0 ws0">I</div>
          <div class="t m0 xd h1 y10 ff1 fs0 fc0 sc0 ls0 ws0">I</div>
          <div class="t m0 xe h1 y11 ff1 fs0 fc0 sc0 ls0 ws0">I</div>
          <div class="t m0 xf h1 y12 ff1 fs0 fc0 sc0 ls0 ws0">I</div>
          <div class="t m0 x10 h2 y13 ff1 fs1 fc0 sc0 lsa ws0">I</div>
          <div class="t m0 x11 h1 y14 ff1 fs0 fc0 sc0 ls0 ws0">I</div>
          <div class="t m0 x12 h1 y15 ff1 fs0 fc0 sc0 ls0 ws0">I</div>
          <div class="t m0 x13 h2 y16 ff1 fs1 fc0 sc0 lsa ws0">I</div>
          <div class="t m0 x14 h4 y17 ff1 fs3 fc0 sc0 ls3 ws0">I</div>
          <div class="t m0 x2 h5 y18 ff3 fs4 fc1 sc0 ls3 ws0">
            Menyatakan bahwa secara sah memberikan wakaf berupa uang sebesar
          </div>
          <div class="t m0 x2 h5 y19 ff3 fs4 fc1 sc0 lsb ws0">Rp</div>
          <div class="t m0 x15 h6 y1a ff3 fs5 fc0 sc0 lsc ws0">/</div>
          <div class="t m0 x16 h1 y1b ff1 fs0 fc0 sc0 ls0 ws0">I</div>
          <div class="t m0 x17 h2 y1c ff1 fs1 fc0 sc0 lsa ws0">I</div>
          <div class="t m0 x2 h5 y1d ff3 fs4 fc1 sc0 lsd ws0">terbilang</div>
          <div class="t m0 x18 h2 y1e ff1 fs1 fc0 sc0 lsa ws0">I</div>
          <div class="t m0 x19 h1 y1f ff1 fs0 fc0 sc0 ls0 ws0">I</div>
          <div class="t m0 x1a h2 y20 ff1 fs1 fc0 sc0 lsa ws0">I</div>
          <div class="t m0 x1b h1 y21 ff1 fs0 fc0 sc0 ls0 ws0">I</div>
          <div class="t m0 x1c h1 y22 ff1 fs0 fc0 sc0 ls0 ws0">I</div>
          <div class="t m0 x1d h2 y23 ff1 fs1 fc0 sc0 lsa ws0">I</div>
          <div class="t m0 x1e h1 y24 ff1 fs0 fc0 sc0 ls0 ws0">I</div>
          <div class="t m0 x1f h1 y25 ff1 fs0 fc0 sc0 ls0 ws0">I</div>
          <div class="t m0 x20 h3 y26 ff1 fs2 fc0 sc0 ls9 ws0">I</div>
          <div class="t m0 x21 h1 y27 ff1 fs0 fc0 sc0 ls0 ws0">I</div>
          <div class="t m0 x2 h5 y28 ff3 fs4 fc1 sc0 lsd ws0">
            dengan<span class="_ _1"></span
            ><span class="lse">
              <span class="lsf"
                >AMANAH<span class="ls10">
                  <span class="ls11"
                    >WAKAF<span class="ls12">
                      <span class="ls13"
                        >diserahkan<span class="_ _1"></span
                        ><span class="ls14">
                          <span class="lsd"
                            >untuk<span class="ls13">
                              <span class="ls15">:</span></span
                            ></span
                          ></span
                        ></span
                      ></span
                    ></span
                  ></span
                ></span
              ></span
            >
          </div>
          <div class="t m0 x22 h1 y29 ff1 fs0 fc0 sc0 ls0 ws0">I</div>
          <div class="t m0 x23 h2 y2a ff1 fs1 fc0 sc0 lsa ws0">I</div>
          <div class="t m0 x24 h1 y2b ff1 fs0 fc0 sc0 ls0 ws0">I</div>
          <div class="t m0 x25 h1 y2c ff1 fs0 fc0 sc0 ls0 ws0">I</div>
          <div class="t m0 x26 h1 y2d ff1 fs0 fc0 sc0 ls0 ws0">I</div>
          <div class="t m0 x27 h2 y20 ff1 fs1 fc0 sc0 lsa ws0">I</div>
          <div class="t m0 x28 h1 y2e ff1 fs0 fc0 sc0 ls0 ws0">I</div>
          <div class="t m0 x29 h1 y2f ff1 fs0 fc0 sc0 ls0 ws0">I</div>
          <div class="t m0 x2a h1 y30 ff1 fs0 fc0 sc0 ls0 ws0">I</div>
          <div class="t m0 x2b h1 y31 ff1 fs0 fc0 sc0 ls0 ws0">I</div>
          <div class="t m0 x2c h2 y32 ff1 fs1 fc0 sc0 lsa ws0">I</div>
          <div class="t m0 x2d h2 y33 ff1 fs1 fc0 sc0 lsa ws0">I</div>
          <div class="t m0 x2 h5 y34 ff3 fs4 fc1 sc0 ls3 ws0">
            Demikian yang dapat kami sampaikan. Atas perhatian dan kerjasama
            Anda kami
          </div>
          <div class="t m0 x2 h5 y35 ff3 fs4 fc1 sc0 ls3 ws0">
            ucapkan Jazaakumullahu Khairan.
          </div>
          <div class="t m0 x2e h4 y36 ff1 fs3 fc0 sc0 ls3 ws0">I</div>
          <div class="t m0 x2f h1 y37 ff1 fs0 fc0 sc0 ls16 ws0">
            I
            <span class="ls17">
              <span class="_ _1"></span><span class="ff3 ls18"></span></span
            >
          </div>
          <div class="t m0 x2f h1 y38 ff3 fs0 fc0 sc0 ls18 ws0">/</div>
          <div class="t m0 x30 h1 y39 ff3 fs0 fc0 sc0 ls19 ws0">
            /<span class="ff1 ls1a">
              <span class="_ _2"> </span><span class="ls0">I</span></span
            >
          </div>
          <div class="t m0 x31 h1 y3a ff1 fs0 fc0 sc0 ls0 ws0">
            I<span class="_ _3"> </span><span class="ls1b">/</span>
          </div>
          <div class="t m0 x32 h2 y3b ff1 fs1 fc0 sc0 lsa ws0">I</div>
          <div class="t m0 x33 h1 y3c ff1 fs0 fc0 sc0 ls0 ws0">I</div>
          <div class="t m0 x34 h1 y3d ff1 fs0 fc0 sc0 ls0 ws0">
            I<span class="_ _4"> </span>I
          </div>
          <div class="t m0 x35 h1 y3e ff1 fs0 fc0 sc0 ls0 ws0">
            I<span class="_ _3"> </span><span class="ls1b">/</span>
          </div>
          <div class="t m0 x36 h2 y3f ff1 fs1 fc0 sc0 lsa ws0">I</div>
          <div class="t m0 x30 h1 y40 ff1 fs0 fc0 sc0 ls0 ws0">I</div>
          <div class="t m0 x31 h1 y41 ff1 fs0 fc0 sc0 ls0 ws0">I</div>
          <div class="t m0 x37 h1 y42 ff1 fs0 fc0 sc0 ls0 ws0">I</div>
          <div class="t m0 x38 h1 y43 ff1 fs0 fc0 sc0 ls0 ws0">I</div>
          <div class="t m0 x39 h2 y44 ff1 fs1 fc0 sc0 lsa ws0">I</div>
          <div class="t m0 x32 h3 y45 ff1 fs2 fc0 sc0 ls9 ws0">I</div>
          <div class="t m0 x34 h1 y46 ff1 fs0 fc0 sc0 ls0 ws0">I</div>
          <div class="t m0 x3a h1 y47 ff1 fs0 fc0 sc0 ls0 ws0">I</div>
          <div class="t m0 x35 h1 y48 ff1 fs0 fc0 sc0 ls0 ws0">I</div>
          <div class="t m0 x3b h2 y49 ff1 fs1 fc0 sc0 lsa ws0">I</div>
          <div class="t m0 x36 h2 y4a ff1 fs1 fc0 sc0 lsa ws0">I</div>
          <div class="t m0 x3c h1 y4b ff1 fs0 fc0 sc0 ls0 ws0">I</div>
          <div class="t m0 x38 h1 y4c ff1 fs0 fc0 sc0 ls0 ws0">I</div>
          <div class="t m0 x3d h1 y4d ff1 fs0 fc0 sc0 ls0 ws0">I</div>
          <div class="t m0 x3e h1 y4e ff1 fs0 fc0 sc0 ls0 ws0">I</div>
          <div class="t m0 x3f h2 y4f ff1 fs1 fc0 sc0 lsa ws0">I</div>
          <div class="t m0 x3a h2 y50 ff1 fs1 fc0 sc0 lsa ws0">I</div>
          <div class="t m0 x40 h1 y51 ff1 fs0 fc0 sc0 ls0 ws0">I</div>
          <div class="t m0 x41 h1 y52 ff1 fs0 fc0 sc0 ls0 ws0">I</div>
          <div class="t m0 x42 h1 y53 ff1 fs0 fc0 sc0 ls0 ws0">I</div>
          <div class="t m0 x3c h2 y54 ff1 fs1 fc0 sc0 lsa ws0">I</div>
          <div class="t m0 x43 h1 y55 ff1 fs0 fc0 sc0 ls0 ws0">I</div>
          <div class="t m0 x44 h3 y56 ff1 fs2 fc0 sc0 ls9 ws0">I</div>
          <div class="t m0 x3d h1 y57 ff1 fs0 fc0 sc0 ls0 ws0">I</div>
          <div class="t m0 x45 h1 y58 ff1 fs0 fc0 sc0 ls0 ws0">I</div>
          <div class="t m0 x46 h1 y59 ff1 fs0 fc0 sc0 ls0 ws0">I</div>
          <div class="t m0 x47 h1 y5a ff1 fs0 fc0 sc0 ls0 ws0">I</div>
          <div class="t m0 x40 h2 y5b ff1 fs1 fc0 sc0 lsa ws0">I</div>
          <div class="t m0 x48 h2 y5c ff1 fs1 fc0 sc0 lsa ws0">I</div>
          <div class="t m0 x42 h1 y5d ff1 fs0 fc0 sc0 ls0 ws0">I</div>
          <div class="t m0 x49 h1 y5e ff1 fs0 fc0 sc0 ls0 ws0">I</div>
          <div class="t m0 x43 h1 y5f ff1 fs0 fc0 sc0 ls0 ws0">I</div>
          <div class="t m0 x4a h1 yf ff1 fs0 fc0 sc0 ls0 ws0">I</div>
          <div class="t m0 x4b h1 y2e ff1 fs0 fc0 sc0 ls0 ws0">I</div>
          <div class="t m0 x8 h1 y60 ff1 fs0 fc0 sc0 ls0 ws0">I</div>
          <div class="t m0 x9 h2 y61 ff1 fs1 fc0 sc0 lsa ws0">I</div>
          <div class="t m0 x4c h3 y62 ff1 fs2 fc0 sc0 ls9 ws0">I</div>
          <div class="t m0 x4d h5 y63 ff1 fs4 fc0 sc0 ls3 ws0">I</div>
          <div class="t m0 xa h7 y64 ff4 fs6 fc2 sc0 ls3 ws0">
            _, <span class="fc3">_+----</span>
          </div>
          <div class="t m0 x4e h5 y65 ff3 fs4 fc4 sc0 ls1c ws0">
            _<span class="fc1 ls1a">
              <span class="_ _5"> </span
              ><span class="ls3"> <span class="ls1d">e</span></span
              >L<span class="ls1b"
                >t<span class="ls8"
                  >ao<span class="_ _1"></span
                  ><span class="ls17"
                    >d<span class="ls13"
                      >a<span class="ls1e"
                        >,<span class="ls5"
                          >J<span class="lsc">
                            <span class="ls1f"
                              >S<span class="fc3 ls20">_</span
                              ><span class="ls21"
                                >a<span class="ls22"
                                  >l<span class="lsf"
                                    >a<span class="_ _1"></span
                                    ><span class="ls23"
                                      >m<span class="fc5 ls24"
                                        >,<span class="fc3 ls25">_,</span></span
                                      ></span
                                    ></span
                                  ></span
                                ></span
                              ></span
                            ></span
                          ></span
                        ></span
                      ></span
                    ></span
                  ></span
                ></span
              ></span
            >
          </div>
          <div class="t m0 x4f h8 y66 ff4 fs7 fc3 sc0 ls26 ws0">
            -<span class="_ _6"> </span><span class="ls27">-</span>
          </div>
          <div class="t m0 x2 h5 y67 ff3 fs4 fc1 sc0 lsf ws0">
            kepada<span class="_ _1"></span
            ><span class="ls10">
              <span class="lsb"
                >NAZHIR<span class="ls2">
                  (<span class="ls5">ISalam</span>)<span class="ls1">
                    <span class="lsd"
                      >untuk<span class="ls13"> </span>proyek<span
                        class="_ _1"
                      ></span
                      ><span class="ls11">
                        <span class="ls15">:</span></span
                      ></span
                    ></span
                  ></span
                ></span
              ></span
            >
          </div>
          <div class="t m0 x50 h2 y68 ff1 fs1 fc0 sc0 lsa ws0">I</div>
          <div class="t m0 x3 h1 y69 ff1 fs0 fc0 sc0 ls0 ws0">I</div>
          <div class="t m0 x51 h1 y6a ff1 fs0 fc0 sc0 ls0 ws0">I</div>
          <div class="t m0 x1c h9 y6b ff5 fs8 fc6 sc0 ls28 ws0">1</div>
        </div> -->
        <div class="pi" data-data='{"ctm":[1.000000,0.000000,0.000000,1.000000,0.000000,0.000000]}'></div>
      </div>
    </div>
    <div class="loading-indicator"></div>
</body>

</html>