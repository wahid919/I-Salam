<?php $this->registerCss("
.text-primary {
  color: rgb(245, 174, 61) !important;
}
.content-berita__info {
  color: #F1A527;
  font-size: .6rem;
  position: absolute;
  bottom: 0;
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
  margin-bottom: 3rem;
}
") ?>

<hr class="mt-0">
<div class="mt-4 mb-4">
  <div class="container mt-4 mb-4">
    <div style="background-image: url(<?= Yii::$app->formatter->asMyImage("berita/" . $berita->gambar, false, "logo.png") ?>);background-position: center;background-size:cover;border-radius: 1rem;width:100%;height:35vw"></div>
    <span style="font-size: .8rem"> <?= $berita->image_summary ?></span>
    <div class="row">
      <div class="col-md-7">
        <h2 class="heading__title mt-4 mb-2" style="font-size: 1.8rem;;color: #666"><?= $berita->judul ?></h2>
        <div class="row" style="font-size: .8rem;">
          <div class="col-lg-3 col-md-3" style="color: #666; font-weight:600">
            <i class="fa fa-user mr-1 text-primary"></i> <?= $berita->user ? $berita->user->name : "-" ?>
          </div>
          <div class="col-lg-3 col-md-4" style="color: #666; font-weight:600">
            <i class="fa fa-calendar mr-1 text-primary"></i> <?= date("d / m / Y", strtotime($berita->created_at)); ?>
          </div>
          <div class="col-md-4" style="color: #666; font-weight:600">
            <i class="fa fa-eye mr-1 text-primary"></i> <?= $berita->view_count ?> <?= Yii::t("cruds", "kali dilihat") ?>
          </div>
        </div>
      </div>
      <div class="col-md-5"></div>
    </div>
    <p class="mt-4 text-justify" style="font-size: .9rem;color:#888">
      <?= $berita->isi ?>
    </p>

    <hr>
    <h3 class="mt-4 mb-4" style="color: #F5AE3D;font-size:1.4rem"><?= Yii::t("cruds", "Berita Lainnya") ?></h3>
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
                  <hr>
                  <div class="row">
                    <div class="col-lg-6 col-md-6 col-6 text-left">
                      <?= date("d M Y", strtotime($berita->created_at)); ?>
                    </div>
                    <div class="col-lg-6 col-md-6 col-6 text-right">
                      <?= $berita->kategoriBerita->nama ?>
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