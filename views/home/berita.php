<?php
$css = <<<CSS
.owl-nav {
    position: absolute;
    top: 45%;
    left: -1.5rem;
    right: -1.5rem;
    display: flex;
    justify-content: space-between;
    overflow: hidden;
}

.owl-nav .owl-prev,
.owl-nav .owl-next {
    font-size: 1rem;
    padding: 0 .5rem;
    margin: 0 1rem;
    border-radius: 100%;
    background: #fff;
    box-shadow: 0 0 3px 0 #ccc;
    color: #aaa;
}

.owl-stage,
.owl-item {
    overflow: hidden;
    border-radius: 1rem;
}

.owl-dots,
.owl-thumbs {
    display: none;
}
.btn-more {
  padding: 0;
  background-color: #F1A527;
}
CSS;

$this->registerCss($css) ?>
<hr class="mt-0">
<div class="mt-4 mb-4">
  <div class="container mt-4 mb-4">

    <?= $this->render('component/banner', [
      "banner" => \app\models\Berita::getbanner()
    ])
    ?>

    <form action="<?= \Yii::$app->request->baseUrl . "/news" ?>" method="get">
      <div class="input-group mb-4">
        <?php

        use richardfan\widget\JSRegister;
        use yii\helpers\Url;

        if (Yii::$app->request->queryParams) :
          foreach (Yii::$app->request->queryParams as $key => $item) :
            if ($key == "kategori") : ?>
              <input type="hidden" name="<?= $key ?>" value="<?= $item ?>">
        <?php endif;
          endforeach;
        endif ?>
        <input type="text" name="cari" class="form-control search-input" placeholder="Cari Berita" aria-label="Cari Berita" aria-describedby="button-addon2" value="<?= Yii::$app->request->queryParams['cari'] ?>">
        <button class="btn btn-search-input" type=submit" id="cari">
          <i class="fa fa-search"></i>
        </button>
      </div>
    </form>

    <div class="text-center mt-5 mb-4">
      <div class="row">
        <div class="col-lg-2 col-md-12  mt-1">
          <h3 class="text-primary text-left"><?= Yii::t("cruds", "Berita") ?></h3>
        </div>
        <div class="col-lg-7 col-md-12  mt-1">
          <!-- <ul class="header-list_kategori d-lg-block d-none">
            <li class="<?= $_GET['kategori'] == null ? "active" : "" ?>"><a class="font-weight-bold" href="<?= \Yii::$app->request->baseUrl . "/home/news" ?>"><?= Yii::t("cruds", "Semua") ?></a></td>
              <?php foreach ($categories as $kategori) {  ?>
            <li class="<?= $_GET['kategori'] == $kategori->nama ? "active" : "" ?>"><a class="font-weight-bold" href="<?= \Yii::$app->request->baseUrl . "/home/news?kategori=" . $kategori->nama ?>"><?= $kategori->nama ?> </a></td>
            <?php } ?>
          </ul>
          <select class="header-sort d-lg-none d-block" name="filter_kategori" id="filter_kategori">
            <option value="" <?= $_GET['kategori'] == "" ? "selected" : "" ?>><?= Yii::t("cruds", "Pilih kategori Berita") ?></option>
            <?php foreach ($categories as $kategori) {  ?>
              <option value=" <?= $kategori->nama ?>" <?= $_GET['kategori'] == $kategori->nama ? "selected" : "" ?>><?= $kategori->nama ?> </option>
            <?php } ?>
          </select> -->
        </div>
        <div class="col-lg-3 col-md-12 text-left mt-1">
          <select class="header-sort" name="_sort" id="_sort">
            <option value="" <?= $_GET['_sort'] == null ? "selected" : "" ?>><?= Yii::t("cruds", "Pilih Pengurutan Berita") ?></option>
            <option value="1" <?= $_GET['_sort'] == 1 ? "selected" : "" ?>><?= Yii::t("cruds", "Terbaru dibuat") ?></option>
            <option value="2" <?= $_GET['_sort'] == 2 ? "selected" : "" ?>><?= Yii::t("cruds", "Terbaru Diubah") ?></option>
            <option value="3" <?= $_GET['_sort'] == 3 ? "selected" : "" ?>><?= Yii::t("cruds", "Paling Banyak dilihat") ?></option>
            <option value="4" <?= $_GET['_sort'] == 4 ? "selected" : "" ?>><?= Yii::t("cruds", "Paling Lama") ?></option>
          </select>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <p style="font-size: .8rem; text-align:left">
            <?= $summary ?>
          </p>
        </div>
      </div>
    </div>

    <div class="row mt-2">
      <?php foreach ($news as $berita) { ?>
        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 mt-3">
          <!-- <a href="<?= \Yii::$app->request->baseUrl . "/detail-berita?id=" . $berita->slug ?>"> -->
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
                <?= $berita->getDescription() ?> <a href="<?= Url::to(['home/detail-berita', 'id' => $berita->slug]) ?>" style="color: #d07500;"><?= Yii::t("cruds", "Baca Selengkapnya") ?></a>
              </p>
              <div style="text-align: right;">
                <!-- <a href="<?= Url::to(['home/detail-berita', 'id' => $berita->slug]) ?>" class="btn btn-more"><?= Yii::t("cruds", "Baca Selengkapnya") ?></a> -->
              </div>
            </div>
          </div>
          <!-- </a> -->
        </div>
      <?php } ?>
    </div>
    <div class="row mt-4 mb-4 text-center">
      <div class="col-md-12">
        <div class='d-flex justify-content-center'>
          <?php echo \yii\widgets\LinkPager::widget([
            'pagination' => $pagination,
            'maxButtonCount' => 5
          ]); ?>
        </div>
      </div>
    </div>
  </div>
</div>

<?php JSRegister::begin(); ?>
<script>
  $("#_sort").on("change", (event) => {
    let params = <?= json_encode((Yii::$app->request->queryParams)) ?>;
    if (event.target.value == "") {
      delete params["_sort"];
    } else {
      params["_sort"] = event.target.value;
    }
    const url = new URL(`<?= Url::to(['/home/news'], true) ?>`);
    url.search = new URLSearchParams(params);
    console.log(url)
    window.location.href = url;
  })
  $("#filter_kategori").on("change", (event) => {
    let params = <?= json_encode((Yii::$app->request->queryParams)) ?>;
    if (event.target.value == "") {
      delete params["filter_kategori"];
    } else {
      params["filter_kategori"] = event.target.value;
    }
    const url = new URL(`<?= Url::to(['/home/news'], true) ?>`);
    url.search = new URLSearchParams(params);
    console.log(url)
    window.location.href = url;
  })
  $('.owl-carousel').owlCarousel({
    loop: true,
    margin: 10,
    nav: true,
    navText: ["<i class='fa fa-angle-double-left'></i>", "<i class='fa fa-angle-double-right'></i>"],
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 1
      },
      1000: {
        items: 1
      }
    }
  })
</script>
<?php JSRegister::end(); ?>