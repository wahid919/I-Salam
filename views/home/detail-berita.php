<?php

use yii\bootstrap\Html;
use yii\helpers\Url;

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <meta name="description" content="<?= $setting->nama_web ?>">
  <link href="<?= $icon ?>" rel="icon">
  <title><?= $setting->nama_web ?></title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,500,700%7cPoppins:400,600,700&display=swap">
  <link rel="stylesheet" href="<?= \Yii::$app->request->BaseUrl ?>/template/assets/css/libraries.css" />
  <link rel="stylesheet" href="<?= \Yii::$app->request->BaseUrl ?>/template/assets/css/style.css" />
  <style>
    .text-primary {
      color: rgb(245, 174, 61) !important;
    }

    .content-berita__info {
      color: #F1A527;
      font-size: .7rem;
      /* position: absolute;
      bottom: 0; */
      left: 1.25rem;
      right: 1.25rem;
      padding-bottom: .5rem;
    }

    .card_berita {
      border-radius: .7rem;
      box-shadow: 0 0 3px 0px #dedede;
    }

    .card-title {
      font-size: 1.1rem;
      color: #666;
      margin-bottom: .5rem;
    }
  </style>
</head>

<body>
  <div class="wrapper">
    <!-- =========================
        Header
    =========================== -->

    <!-- ============================
        Slider
    ============================== -->

    <hr class="mt-0">
    <div class="mt-4 mb-4">
      <div class="container mt-4 mb-4">
        <div style="background-image: url(<?= Yii::$app->formatter->asMyImage("berita/" . $berita->gambar, false, "logo.png") ?>);background-position: center;background-size:cover;border-radius: 1rem;width:100%;height:35vw"></div>
        <span style="font-size: .8rem"> <?= $berita->image_summary ?></span>
        <div class="row">
          <div class="col-md-7">
            <h2 class="heading__title mt-4 mb-2" style="font-size: 1.8rem;;color: #666"><?= $berita->judul ?></h2>
            <div style="font-size: .8rem;">
              <!-- <div class="col-md-4" style="color: #666; font-weight:600"> -->
              <i class="fa fa-user mr-1 text-primary"></i> <?= $berita->user ? $berita->user->name : "-" ?>
              <!-- </div>
              <div class="col-md-4" style="color: #666; font-weight:600"> -->
              <i style="margin-left: 1rem;" class="fa fa-calendar mr-1 text-primary"></i> <?= \app\components\Tanggal::toReadableDate($berita->created_at,false) ?>
              <!-- </div>
              <div class="col-md-4" style="color: #666; font-weight:600"> -->
              <i style="margin-left: 1rem;" class="fa fa-eye mr-1 text-primary"></i> <?= $berita->view_count ?> <?= Yii::t("cruds", "kali dilihat") ?>
              <!-- </div> -->
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-5"></div>
    </div>
    <div style="margin-left : 10px;">

      <p class="mt-4 text-justify" style="font-size: .9rem;color:#888;">
        <?= $berita->isi ?>
      </p>
    </div>
      
    <hr>
    <h3 class="mt-4 mb-4" style="margin-left:10px;color: #F5AE3D;font-size:1.4rem"><?= Yii::t("cruds", "Berita Lainnya") ?></h3>
    <div class="row">
      <?php foreach ($news as $berita) { ?>
        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 mt-3">
          <a href="<?= \Yii::$app->request->baseUrl . "/detail-berita?id=" . $berita->slug ?>">
            <div class="card h-100 card_berita">
              <!-- <img src="" class="card-img-top" alt="..."> -->
              <div style="border-radius: .7rem;background-image: url(<?= \Yii::$app->request->baseUrl . "/uploads/berita/" . $berita->gambar ?>);background-size: cover;height: 200px;">

                  </div>
                  <div class="card-body">
                    <h6 class="card-title"><?= $berita->getShowTitle() ?></h6>
                    <div class="content-berita__info">
                      <div class="row">
                        <div class="col-lg-6 col-md-6 col-6 text-left">
                          <?= date("d M Y", strtotime($berita->created_at)); ?> <br>
                        </div>
                        <div class="col-lg-6 col-md-6 col-6 text-right">
                          <?= $berita->kategoriBerita->nama ?>
                        </div>
                      </div>
                      <hr>
                    </div>
                    <p style="color: #666; margin-bottom: .5rem; font-size: .9rem" :hover="color: #666">
                      <?= $berita->getDescription() ?>
                    </p>
                    <div style="text-align: right;">
                      <a href="<?= Url::to(['home/detail-berita', 'id' => $berita->slug]) ?>" class="btn btn-more"><?= Yii::t("cruds", "Baca Selengkapnya") ?></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
      <?php } ?>
    </div>
  </div>
</div>