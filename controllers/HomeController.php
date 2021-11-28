<?php

namespace app\controllers;

use app\components\Constant;
use Yii;
use yii\web\Controller;
use yii\web\HttpException;
use yii\helpers\Url;
use yii\filters\AccessControl;
use dmstr\bootstrap\Tabs;
use app\models\Action;
use app\models\Berita;
use app\models\HubungiKami;
use app\models\KategoriBerita;
use yii\helpers\ArrayHelper;
use app\models\Setting;
use app\models\Organisasi;
use app\models\LembagaPenerima;
use app\models\Pendanaan;
use app\models\User;
use app\models\KategoriPendanaan;
use app\models\Pembayaran;
use app\models\Penyaluran;
use app\models\Rekening;
use app\models\search\RekeningSearchHome;
use app\models\Testimonials;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;
use Midtrans\Snap;
use Midtrans\Config;
use yii\web\Response;

/**
 * This is the class for controller "BeritaController".
 */
class HomeController extends Controller
{
    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;
        $this->layout = '@app/views/layouts-home/main';
        return parent::beforeAction($action);
    }

    public function actionPembayaran($id, $nominal)
    {
        $pendanaan = \app\models\Pendanaan::find()
            ->where(['id' => $id])->one();
        // Required
        if ($nominal) {
            // $name = \Yii::$app->user->identity->name;
            $name = "Tes";
            $model = new Pembayaran();

            $order_id_midtrans = rand();
            $model->pendanaan_id = $pendanaan->id;
            // $model->kode_transaksi = Yii::$app->security->generateRandomString(10) . date('dmYHis');
            $model->kode_transaksi = $order_id_midtrans;

            $transaction_details = array(
                'order_id' => $order_id_midtrans,
                'gross_amount' => 10000, // no decimal allowed for creditcard
            );



            // $model->nama = Yii::$app->user->identity->name;
            $model->nama = "Hamba Tuhan";



            $model->jumlah_lembaran = 0;
            $model->nominal = (int)$nominal;

            // Optional
            $item1_details = array(
                'id' => '1',
                'price' => (int)$nominal,
                'quantity' => 1,
                'name' => $pendanaan->nama_pendanaan . "(Non Lembaran)"
            );


            // $model->jenis_pembayaran_id = $val['jenis_pembayaran_id'] ?? '';
            // $model->user_id = \Yii::$app->user->identity->id;
            $model->user_id = 49;
            $model->status_id = 5;

            $shipping_address = array(
                'first_name'    => $pendanaan->nama_nasabah,
                'last_name'     => "(" . $pendanaan->nama_perusahaan . ")",
                // 'address'       => "Batu",
                //     'city'          => "Jakarta",
                //     'postal_code'   => "16602",
                //     'phone'         => "081122334455",
                'country_code'  => 'IDN'
            );

            $customer_details = array(
                'first_name'    => $name,
                'last_name'     => "(" . $name . ")",
                'email'         => "fachruwildan1@gmail.com",
                'phone'         => "089658798162",
                'billing_address'  => $shipping_address,
                'shipping_address' => $shipping_address
            );

            $hasil_code = \app\components\ActionMidtrans::toReadableOrder($item1_details, $transaction_details, $customer_details);
            $model->code = $hasil_code;
            $hasil = 'https://app.sandbox.midtrans.com/snap/v2/vtweb/' . $hasil_code;

            // var_dump($hasil_code);
            // die;
            if ($model->validate()) {
                $model->save();
                // $this->layout= false;
                return $this->redirect(['bayar', 'id' => $model->id]);
                // return ['success' => true, 'message' => 'success', 'data' => $model, 'code' => $hasil_code,'url'=>$hasil];
            } else {

                return $this->redirect(['detail_program', 'id' => $pendanaan->id]);
                // return ['success' => false, 'message' => 'gagal', 'data' => $model->getErrors()];
            }
        }

        return $this->redirect(['detail_program', 'id' => $pendanaan->id]);
        // return ["success" => false, "message" => "Nominal belum diatur"];



    }
    public function actionBayar($id){
        // $this->layout = false;
       
        // $pendanaan = Pendanaan::findOne(['pendanaan_id'=>$id]);

        // return $this->render('bayar', [
        //     'pembayaran' => $pembayaran,
        //     'pendanaan' => $pendanaan,
            
        // ]);
        $pembayaran = Pembayaran::findOne(['id'=>$id]);
        $setting = Setting::find()->one();
        $icon = \Yii::$app->request->baseUrl . "/uploads/setting/" . $setting->logo;
        $bg_login = \Yii::$app->request->baseUrl . "/uploads/setting/" . $setting->bg_login;
        $bg = \Yii::$app->request->baseUrl . "/uploads/setting/" . $setting->bg_pin;
        $organisasis = Organisasi::find()->where(['flag' => 1])->all();
        $lembagas = LembagaPenerima::find()->where(['flag' => 1])->all();
        $count_program = Pendanaan::find()->count();
        $count_wakif = User::find()->where(['role_id' => 5])->count();
        $model = new HubungiKami;
        $testimonials = Testimonials::find()->all();
        $pendanaans = Pendanaan::find()->where(['status_id' => 2])->limit(6)->all();
        
        $news = Berita::find()->limit(6)->all();


        if ($model->load($_POST)) {
            $model->status = 0;

            if ($model->save()) {
                Yii::$app->session->setFlash('success', "Data berhasil disimpan.");
            } else {
                Yii::$app->session->setFlash('error', "Data tidak berhasil disimpan.");
            }
            return $this->redirect(['home/index']);
        }

        return $this->render('bayar', [
            'pembayaran' => $pembayaran,
            'setting' => $setting,
            // 'snapToken' => $snapToken,
            'count_program' => $count_program,
            'count_wakif' => $count_wakif,
            'organisasis' => $organisasis,
            'lembagas' => $lembagas,
            'icon' => $icon,
            'bg_login' => $bg_login,
            'bg' => $bg,
            'testimonials' => $testimonials,
            'model' => $model,
            'pendanaans' => $pendanaans,
            'news' => $news,
        ]);

    }
    function printExampleWarningMessage()
    {
        if (strpos(Config::$serverKey, 'your ') != false) {
            echo "<code>";
            echo "<h4>Please set your server key from sandbox</h4>";
            echo "In file: " . __FILE__;
            echo "<br>";
            echo "<br>";
            echo htmlspecialchars('Config::$serverKey = \'<your server key>\';');
            die();
        }
    }

    public function actionRegistrasi()
    {
        $model = new User();
        if (Yii::$app->request->isAjax) {
            return $this->renderAjax("registrasi", compact("model"));
        }
        if ($model->load($_POST)) {
            $model->role_id = 5; // Pewakaf
            $model->nomor_handphone = Constant::purifyPhone($model->nomor_handphone);
            if ($model->validate()) {
                if ($model->pin != $model->konfirmasi_pin) {
                    Yii::$app->session->setFlash("error", "Pendaftaran gagal. Pin anda tidak sama");
                    return $this->redirect(Yii::$app->request->referrer);
                } else if ($model->password != $model->konfirmasi_password) {
                    Yii::$app->session->setFlash("error", "Pendaftaran gagal. Pin anda tidak sama");
                    return $this->redirect(Yii::$app->request->referrer);
                }

                $model->password = Yii::$app->security->generatePasswordHash($model->password);

                $model->save();
                Yii::$app->session->setFlash("success", "Pendaftaran berhasil. Silahkan login");
                return $this->redirect(Yii::$app->request->referrer);
            }
            Yii::$app->session->setFlash("error", "Pendaftaran gagal. Validasi data tidak valid : " . Constant::flattenError($model->getErrors()));
            return $this->redirect(Yii::$app->request->referrer);
        } else {
            Yii::$app->session->setFlash("error", "Pendaftaran gagal");
            return $this->redirect(Yii::$app->request->referrer);
        }
    }

    public function actionIndex()
    {
        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => 10000,
            )
        );

        // $snapToken = Snap::getSnapToken($params);
        $setting = Setting::find()->one();
        $icon = \Yii::$app->request->baseUrl . "/uploads/setting/" . $setting->logo;
        $bg_login = \Yii::$app->request->baseUrl . "/uploads/setting/" . $setting->bg_login;
        $bg = \Yii::$app->request->baseUrl . "/uploads/setting/" . $setting->bg_pin;
        $organisasis = Organisasi::find()->where(['flag' => 1])->all();
        $lembagas = LembagaPenerima::find()->where(['flag' => 1])->all();
        $count_program = Pendanaan::find()->count();
        $count_wakif = User::find()->where(['role_id' => 5])->count();
        $model = new HubungiKami;
        $testimonials = Testimonials::find()->all();
        $pendanaans = Pendanaan::find()->where(['status_id' => 2])->limit(6)->all();
        $news = Berita::find()->limit(6)->all();


        if ($model->load($_POST)) {
            $model->status = 0;

            if ($model->save()) {
                Yii::$app->session->setFlash('success', "Data berhasil disimpan.");
            } else {
                Yii::$app->session->setFlash('error', "Data tidak berhasil disimpan.");
            }
            return $this->redirect(['home/index']);
        }

        return $this->render('index', [
            'setting' => $setting,
            // 'snapToken' => $snapToken,
            'count_program' => $count_program,
            'count_wakif' => $count_wakif,
            'organisasis' => $organisasis,
            'lembagas' => $lembagas,
            'icon' => $icon,
            'bg_login' => $bg_login,
            'bg' => $bg,
            'testimonials' => $testimonials,
            'model' => $model,
            'pendanaans' => $pendanaans,
            'news' => $news
        ]);
    }

    public function actionCheckout()
    {

        $this->layout = false;
        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => 10000,
            )
        );

        // $snapToken = Snap::getSnapToken($params);
        $setting = Setting::find()->one();
        $icon = \Yii::$app->request->baseUrl . "/uploads/setting/" . $setting->logo;
        $bg_login = \Yii::$app->request->baseUrl . "/uploads/setting/" . $setting->bg_login;
        $bg = \Yii::$app->request->baseUrl . "/uploads/setting/" . $setting->bg_pin;
        $organisasis = Organisasi::find()->where(['flag' => 1])->all();
        $lembagas = LembagaPenerima::find()->where(['flag' => 1])->all();
        $count_program = Pendanaan::find()->count();
        $count_wakif = User::find()->where(['role_id' => 5])->count();
        $model = new HubungiKami;
        $testimonials = Testimonials::find()->all();


        // if ($model->load($_POST)) {
        //     $model->status = 0;

        //     if ($model->save()) {
        //         Yii::$app->session->setFlash('success', "Data created successfully."); 
        //     } else {
        //         Yii::$app->session->setFlash('error', "Data not saved.");
        //     }
        //     return $this->redirect('home/checkout');
        // }

        return $this->render('checkout', [
            'setting' => $setting,
            // 'snapToken' => $snapToken,
            'count_program' => $count_program,
            'count_wakif' => $count_wakif,
            'organisasis' => $organisasis,
            'lembagas' => $lembagas,
            'icon' => $icon,
            'bg_login' => $bg_login,
            'bg' => $bg,
            'testimonials' => $testimonials,
            'model' => $model
        ]);
    }

    public function actionNews()
    {
        $query = Berita::find();
        // find condition
        if (isset($_GET['cari'])) {
            $query->andWhere(['like', 'judul', $_GET['cari']]);
        }
        if (isset($_GET['kategori'])) {
            $kategori = KategoriBerita::find()->where(['nama' => $_GET['kategori']])->one();
            $query->andWhere(['kategori_berita_id' => $kategori->id]);
        }
        if (isset($_GET['sort'])) {
            switch (intval($_GET['sort'])) {
                case 1:
                    $query->orderBy(['created_at' => SORT_DESC]);
                    break;
                case 2:
                    $query->orderBy(['updated_at' => SORT_DESC]);
                    break;
                case 3:
                    $query->andWhere(['kategori_berita_id' => $kategori->id]);
                    break;
                case 4:
                    $query->orderBy(['created_at' => SORT_DESC]);
                    break;
            }
        }

        // generate pagination
        $cloned = clone $query;
        $count = $cloned->count();
        $pagination = new Pagination([
            "totalCount" => $count,
            "pageSize" => 9
        ]);
        $news = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        // generate pagination summary
        $summary = Constant::getPaginationSummary($pagination, $count);

        $categories = KategoriBerita::find()->all();
        $setting = Setting::find()->one();
        $bg_login = \Yii::$app->request->baseUrl . "/uploads/setting/" . $setting->bg_login;
        $icon = \Yii::$app->request->baseUrl . "/uploads/setting/" . $setting->logo;
        $model = new HubungiKami;

        if ($model->load($_POST)) {
            $model->status = 0;

            if ($model->save()) {
                Yii::$app->session->setFlash('success', "Data berhasil disimpan.");
            } else {
                Yii::$app->session->setFlash('error', "Data tidak berhasil disimpan.");
            }
            return $this->redirect(['home/news']);
        }
        return $this->render('berita', [
            'setting' => $setting,
            'categories' => $categories,
            'news' => $news,
            'model' => $model,
            'summary' => $summary,
            'pagination' => $pagination,
            'bg_login' => $bg_login,
            'icon' => $icon
        ]);
    }

    public function actionDetailBerita($id)
    {
        // var_dump($id);die;
        $this->layout = false;
        $berita = Berita::find()->where(['slug' => $id])->one();
        if ($berita == null) throw new HttpException(404);
        $news = Berita::find()->where(['kategori_berita_id' => $berita->kategori_berita_id])->limit(3)->all();
        $setting = Setting::find()->one();
        $bg_login = \Yii::$app->request->baseUrl . "/uploads/setting/" . $setting->bg_login;

        $already_view = Yii::$app->session->get('viewberita');
        if (is_array($already_view) == false) $already_view = [];
        if (in_array($berita->id, $already_view) == false) {
            $berita->view_count++;
            $berita->save(false);
            array_push($already_view, $berita->id);
        }

        Yii::$app->session->set('viewberita', $already_view);

        return $this->render('detail-berita', [
            'setting' => $setting,
            'berita' => $berita,
            'bg_login' => $bg_login,
            'news' => $news,
        ]);
    }

    public function actionAbout()
    {
        $setting = Setting::find()->one();
        $icon = \Yii::$app->request->baseUrl . "/uploads/setting/" . $setting->logo;
        $bg_login = \Yii::$app->request->baseUrl . "/uploads/setting/" . $setting->bg_login;
        $bg = \Yii::$app->request->baseUrl . "/uploads/setting/" . $setting->bg_pin;
        $organisasis = Organisasi::find()->where(['flag' => 1])->all();
        $lembagas = LembagaPenerima::find()->where(['flag' => 1])->all();
        $count_program = Pendanaan::find()->count();
        $count_wakif = User::find()->where(['role_id' => 5])->count();
        $model = new HubungiKami;


        if ($model->load($_POST)) {
            $model->status = 0;

            if ($model->save()) {
                Yii::$app->session->setFlash('success', "Data berhasil disimpan.");
            } else {
                Yii::$app->session->setFlash('error', "Data tidak berhasil disimpan.");
            }
            return $this->redirect(['home/about']);
        }

        return $this->render('about_us', [
            'setting' => $setting,
            'count_program' => $count_program,
            'count_wakif' => $count_wakif,
            'organisasis' => $organisasis,
            'lembagas' => $lembagas,
            'icon' => $icon,
            'bg_login' => $bg_login,
            'bg' => $bg,
            'model' => $model
        ]);
    }
    public function actionRekening()
    {
        $searchModel  = new RekeningSearchHome;
        $dataProvider = $searchModel->search($_GET);
        $dataProvider->setPagination(['pageSize' => 20]);
        $setting = Setting::find()->one();
        $icon = \Yii::$app->request->baseUrl . "/uploads/setting/" . $setting->logo;
        $bg_login = \Yii::$app->request->baseUrl . "/uploads/setting/" . $setting->bg_login;
        $bg = \Yii::$app->request->baseUrl . "/uploads/setting/" . $setting->bg_pin;
        $organisasis = Organisasi::find()->where(['flag' => 1])->all();
        $lembagas = LembagaPenerima::find()->where(['flag' => 1])->all();
        $rekenings = Rekening::find()->where(['flag' => 1])->all();
        $count_program = Pendanaan::find()->count();
        $count_wakif = User::find()->where(['role_id' => 5])->count();





        return $this->render('rekening', [
            'setting' => $setting,
            'count_program' => $count_program,
            'count_wakif' => $count_wakif,
            'organisasis' => $organisasis,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'lembagas' => $lembagas,
            'rekenings'  => $rekenings,
            'icon' => $icon,
            'bg_login' => $bg_login,
            'bg' => $bg
        ]);
    }
    public function actionReport()
    {
        $searchModel  = new RekeningSearchHome;
        $dataProvider = $searchModel->search($_GET);
        $dataProvider->setPagination(['pageSize' => 20]);
        $setting = Setting::find()->one();
        $penghimpunan = Pembayaran::find()->where(['status_id' => 6])->sum('nominal');
        $penyaluran = Penyaluran::find()->sum('nominal');
        // var_dump($penyaluran);die;
        $icon = \Yii::$app->request->baseUrl . "/uploads/setting/" . $setting->logo;
        $bg_login = \Yii::$app->request->baseUrl . "/uploads/setting/" . $setting->bg_login;
        $bg = \Yii::$app->request->baseUrl . "/uploads/setting/" . $setting->bg_pin;
        $organisasis = Organisasi::find()->where(['flag' => 1])->all();
        $lembagas = LembagaPenerima::find()->where(['flag' => 1])->all();
        $rekenings = Rekening::find()->where(['flag' => 1])->all();
        $count_program = Pendanaan::find()->count();
        $count_wakif = User::find()->where(['role_id' => 5])->count();

        $rows_himpunans = (new \yii\db\Query())
            ->select(['sum(nominal) as nominal', 'month(tanggal_konfirmasi) as bulan', 'year(tanggal_konfirmasi) as tahun'])
            ->from('pembayaran')
            ->where(['status_id' => 6])
            // ->andWhere(['<>', 'State', null])
            ->andWhere(['not', ['tanggal_konfirmasi' => null]])
            ->groupBy('bulan,tahun')
            ->orderBy([
                'tahun' => SORT_ASC
            ])
            ->all();

        $rows_penyalurans = (new \yii\db\Query())
            ->select(['sum(nominal) as nominal', 'month(tanggal_penyaluran) as bulan', 'year(tanggal_penyaluran) as tahun'])
            ->from('penyaluran')
            // ->andWhere(['<>', 'State', null])
            ->andWhere(['not', ['tanggal_penyaluran' => null]])
            ->groupBy('bulan,tahun')
            ->orderBy([
                'tahun' => SORT_ASC
            ])
            ->all();
        //     $a=[];
        // for ($m=1; $m<=12; $m++) {
        //     $month = date('m', mktime(0,0,0,$m));
        //     $a[$m] = $month;
        //     // $month = date('F', mktime(0,0,0,$m, 1, date('Y')));
        //     // echo $month. '<br>';
        //     }
        // var_dump($rows->createCommand()->sql);die;
        // var_dump($rows_penyalurans);die;





        return $this->render('report', [
            'setting' => $setting,
            'rows_himpunans' => $rows_himpunans,
            'rows_penyalurans' => $rows_penyalurans,
            'penghimpunan' => $penghimpunan,
            'penyaluran' => $penyaluran,
            'count_program' => $count_program,
            'count_wakif' => $count_wakif,
            'organisasis' => $organisasis,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'lembagas' => $lembagas,
            'rekenings'  => $rekenings,
            'icon' => $icon,
            'bg_login' => $bg_login,
            'bg' => $bg
        ]);
    }
    // public function actionNews()
    // {

    //     $this->layout = false;

    //     $setting = Setting::find()->one();
    //     $icon = \Yii::$app->request->baseUrl . "/uploads/setting/" . $setting->logo;
    //     $bg_login = \Yii::$app->request->baseUrl . "/uploads/setting/" . $setting->bg_login;
    //     $bg = \Yii::$app->request->baseUrl . "/uploads/setting/" . $setting->bg_pin;
    //     $organisasis = Organisasi::find()->where(['flag'=>1])->all();
    //     $lembagas = LembagaPenerima::find()->where(['flag'=>1])->all();
    //     $count_program = Pendanaan::find()->count();
    //     $count_wakif = User::find()->where(['role_id'=>5])->count();
    //     $model = new HubungiKami;


    //     if ($model->load($_POST)) {
    //         $model->status = 0;

    //         if ($model->save()) {
    //             Yii::$app->session->setFlash('success', "Data created successfully."); 
    //         } else {
    //             Yii::$app->session->setFlash('error', "Data not saved.");
    //         }
    //         return $this->redirect('home/news');
    //     }

    //     return $this->render('news', [
    //         'setting' => $setting,
    //         'count_program' => $count_program,
    //         'count_wakif' => $count_wakif,
    //         'organisasis' => $organisasis,
    //         'lembagas' => $lembagas,
    //         'icon' => $icon,
    //         'bg_login' => $bg_login,
    //         'bg' => $bg,
    //         'model' => $model
    //     ]);
    // }
    public function actionZiswaf()
    {
        $setting = Setting::find()->one();
        $icon = \Yii::$app->request->baseUrl . "/uploads/setting/" . $setting->logo;

        return $this->render('ziswaf', [
            'setting' => $setting,
            'icon' => $icon,
        ]);
    }

    public function actionLaporanWakaf()
    {
        $setting = Setting::find()->one();
        $icon = \Yii::$app->request->baseUrl . "/uploads/setting/" . $setting->logo;

        return $this->render('laporan-wakaf', [
            'setting' => $setting,
            'icon' => $icon,
        ]);
    }

    public function actionNotifikasi()
    {
        $setting = Setting::find()->one();
        $icon = \Yii::$app->request->baseUrl . "/uploads/setting/" . $setting->logo;

        return $this->render('notifikasi', [
            'setting' => $setting,
            'icon' => $icon,
        ]);
    }

    public function actionProfile()
    {
        $setting = Setting::find()->one();
        $icon = \Yii::$app->request->baseUrl . "/uploads/setting/" . $setting->logo;

        return $this->render('profile', [
            'setting' => $setting,
            'icon' => $icon,
        ]);
    }

    public function actionEditProfile()
    {
        $setting = Setting::find()->one();
        $icon = \Yii::$app->request->baseUrl . "/uploads/setting/" . $setting->logo;

        return $this->render('edit-profile', [
            'setting' => $setting,
            'icon' => $icon,
        ]);
    }

    public function actionDetailProgram($id)
    {
        $setting = Setting::find()->one();
        $icon = \Yii::$app->request->baseUrl . "/uploads/setting/" . $setting->logo;
        $pendanaan = Pendanaan::findOne($id);
        if ($pendanaan == null) throw new HttpException(404);

        return $this->render('detail-program', [
            'setting' => $setting,
            'icon' => $icon,
            'pendanaan' => $pendanaan,
        ]);
    }

    public function actionProgram()
    {

        // $this->layout = false;
        // $this->title = "Isalam - Program";

        $setting = Setting::find()->one();
        $icon = \Yii::$app->request->baseUrl . "/uploads/setting/" . $setting->logo;
        $bg_login = \Yii::$app->request->baseUrl . "/uploads/setting/" . $setting->bg_login;
        $bg = \Yii::$app->request->baseUrl . "/uploads/setting/" . $setting->bg_pin;


        if (isset($_GET['kategori'])) {
            $kategori = $_GET['kategori'];
            $get_id = KategoriPendanaan::find()->where(['name' => $kategori])->one();
            $query = Pendanaan::find()->where(['status_id' => 2, 'kategori_pendanaan_id' => $get_id]);
            $count = $query->count();
            $pagination = new Pagination(['totalCount' => $count, 'pageSize' => 9]);
            $pendanaans = $query->offset($pagination->offset)
                ->limit($pagination->limit)
                ->all();
        } else {
            $query = Pendanaan::find()->where(['status_id' => 2]);
            $count = $query->count();
            $pagination = new Pagination(['totalCount' => $count, 'pageSize' => 9]);
            $pendanaans = $query->offset($pagination->offset)
                ->limit($pagination->limit)
                ->all();
        }

        $summary = Constant::getPaginationSummary($pagination, $count);

        $organisasis = Organisasi::find()->where(['flag' => 1])->all();
        $kategori_pendanaans = KategoriPendanaan::find()->all();
        $count_program = Pendanaan::find()->count();
        $count_wakif = User::find()->where(['role_id' => 5])->count();

        return $this->render('program', [
            'setting' => $setting,
            'count_program' => $count_program,
            'count_wakif' => $count_wakif,
            'organisasis' => $organisasis,
            'pendanaans' => $pendanaans,
            'kategori_pendanaans' => $kategori_pendanaans,
            'icon' => $icon,
            'bg_login' => $bg_login,
            'bg' => $bg,
            'pagination' => $pagination,
            'summary' => $summary,
        ]);
    }
    public function actionUnduhFileUraian($id)
    {
        $model = Pendanaan::findOne(['id' => $id]);
        $file = $model->file_uraian;
        // $model->tanggal_received=date('Y-m-d H:i:s');
        $path = Yii::getAlias("@app/web/uploads/") . $file;
        $arr = explode(".", $file);
        $extension = end($arr);
        $nama_file = "File Uraian  " . $model->nama_pendanaan . "." . $extension;

        if (file_exists($path)) {
            return Yii::$app->response->sendFile($path, $nama_file);
        } else {
            throw new \yii\web\NotFoundHttpException("{$path} is not found!");
        }
    }
    public function actionUnduhFileWakaf()
    {
        $model = Setting::find()->one();
        //    var_dump($model);die;
        $file = $model->ikut_wakaf;
        // $model->tanggal_received=date('Y-m-d H:i:s');
        $path = Yii::getAlias("@app/web/uploads/setting/") . $file;
        $arr = explode(".", $file);
        $extension = end($arr);
        $nama_file = "Cara Mengikuti Wakaf ." . $extension;

        if (file_exists($path)) {
            return Yii::$app->response->sendFile($path, $nama_file);
        } else {
            throw new \yii\web\NotFoundHttpException("{$path} is not found!");
        }
    }
}
