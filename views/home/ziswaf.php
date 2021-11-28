<hr class="mt-0">
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="header-panel-wrap">
                <ul class="nav nav-tabs pb-0 border-d-program" id="isalam" role="tablist">
                    <li class="nav-item text-center">
                        <a class="nav-link font-weight-bold active" id="Wakaf-tab" data-toggle="tab" href="#wakaf" role="tab" aria-controls="infak" aria-selected="true"><i class="fas fa-hand-holding-usd"></i> Wakaf</a>
                    </li>
                    <li class="nav-item text-center">
                        <a class="nav-link font-weight-bold" id="wakaf-tab" data-toggle="tab" href="#infak" role="tab" aria-controls="infak" aria-selected="false"><i class="fas fa-money-bill-alt"></i> Infak</a>
                    </li>
                </ul>
                <div class="tab-content pt-4" id="myTabContent">
                    <div class="tab-pane fade show active" id="wakaf" role="tabpanel" aria-labelledby="wakaf-tab">
                        <img src="<?= \Yii::$app->request->BaseUrl ?>/uploads/Group77.png" class="pt-0">
                        <div class="row pt-4">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="text-left">
                                    <h3 class="text-isalam-1">Ayo Mulai Berwakaf</h3>
                                    <p class="font-weight-bold font-size-08">Silahkan Isi Jumlah Wakafmu Insyallah Berkah </p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12 text-category">
                                <label class="font-weight-600 font-size-1" for="wakaf">Pilih Kategori Wakaf</label>
                                <select class="form-control select-category ml-auto" id="select-category">
                                    <option class="font-weight-bold">Semua Kategori</option>
                                    <option class="font-weight-bold">Perdagangan</option>
                                    <option class="font-weight-bold">sedekah</option>
                                    <option class="font-weight-bold">wakaf</option>
                                    <option class="font-weight-bold">bencana alam</option>
                                </select>
                            </div>
                            <div class="col-12 pt-2">
                                <div class="form-group">
                                    <label for="">Isi Nominal Wakaf Anda</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend mr-2" style="height:calc(1.5em + .75rem + 2px);">
                                            <div class="input-group-text bg-white border-r5 font-weight-bold" style="color: #afafaf;">Rp</div>
                                        </div>
                                        <input type="text" class="form-control select-wakaf border-r5 mr-1" id="" placeholder="Minimal Wakaf Rp. 10.000">
                                        <button type="submit" class="btn-sm text-white btn-wakaf font-weight-bold">Wakaf Sekarang</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="infak" role="tabpanel" aria-labelledby="infak-tab">
                    <img src="<?= \Yii::$app->request->BaseUrl ?>/uploads/Group77.png" class="pt-0">
                        <div class="row pt-4">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="text-left">
                                    <h3 class="text-isalam-1">Ayo Mulai Berinfak</h3>
                                    <p class="font-weight-bold font-size-08">Silahkan Isi Jumlah infakmu Insyallah Berkah </p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12 text-category">
                                <label class="font-weight-600 font-size-1" for="infak">Pilih Kategori infak</label>
                                <select class="form-control select-category ml-auto" id="select-category">
                                    <option class="font-weight-bold">Semua Kategori</option>
                                    <option class="font-weight-bold">Perdagangan</option>
                                    <option class="font-weight-bold">sedekah</option>
                                    <option class="font-weight-bold">infak</option>
                                    <option class="font-weight-bold">bencana alam</option>
                                </select>
                            </div>
                            <div class="col-12 pt-2">
                                <div class="form-group">
                                    <label for="">Isi Nominal infak Anda</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend mr-2" style="height:calc(1.5em + .75rem + 2px);">
                                            <div class="input-group-text bg-white border-r5 font-weight-bold" style="color: #afafaf;">Rp</div>
                                        </div>
                                        <input type="text" class="form-control select-wakaf border-r5 mr-1" id="" placeholder="Minimal infak Rp. 10.000">
                                        <button type="submit" class="btn-sm text-white btn-wakaf font-weight-bold" style="background-color: #f1a502;height:calc(1.5em + .75rem + 2px);">Wakaf Sekarang</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div><!-- /.col-lg-12 -->
    </div><!-- /.row -->
</div>