<?php

namespace app\controllers;

date_default_timezone_set('Asia/Jakarta');

use app\components\Constant;
use Yii;
use yii\web\Controller;
use yii\web\HttpException;
use yii\helpers\Url;
use yii\filters\AccessControl;
use dmstr\bootstrap\Tabs;
use app\models\Action;
use app\models\AgendaPendanaan;
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
use DateTime;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;
use Midtrans\Snap;
use Midtrans\Config;
use yii\filters\VerbFilter;
use yii\web\Response;
use app\components\UploadFile;
use app\models\AmanahPendanaan;
use app\models\home\Registrasi as HomeRegistrasi;
use app\models\KegiatanPendanaan;
use app\models\Kontak;
use app\models\LoginForm;
use app\models\Notifikasi;
use app\models\Otp;
use app\models\Slides;
use kartik\mpdf\Pdf;
use yii\db\Expression;
use yii\web\UploadedFile;

/**
 * This is the class for controller "BeritaController".
 */
class HomeController extends Controller
{
    use UploadFile;

    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;
        $this->layout = '@app/views/layouts-home/main';
        return parent::beforeAction($action);
    }

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                // 'only' => ['logout', 'design-bangunan'],
                'rules' => [
                    [
                        'actions' => ['login', 'registrasi', 'error', 'index', 'news', 'detail-berita', 'about', 'report', 'ziswaf', 'program', 'detail-program','program-zakat', 'detail-program-zakat','program-infak', 'detail-program-infak','program-sedekah', 'detail-program-sedekah', 'unduh-file-uraian', 'unduh-file-wakaf', 'lupa-password', 'ganti-password', 'visi', 'organisasi','lupa','kontak','cetak','latar-belakang','alamat-kantor','telp','map','pesan','medsos','privacy-policy'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index', 'verifikasi-akun', 'kirim-otp', 'profile', 'edit-profile', 'bayar', 'pembayaran', 'pembayarans', 'chechkout', 'laporan-wakaf', 'notifikasi', 'cancel-transaksi'], // add all actions to take guest to login page
                        'allow' => true,
                        'roles' => ['@'],
                    ],

                ],

            ],

        ];
    }
    public function actionPrivacyPolicy(){
        return $this->render('privacy', [
        ]);
    }

    public function actionPembayaran($id, $nominal,$amanah_pendanaan ,$ket)
    {
        $confirm = Yii::$app->user->identity->confirm;
        $status = Yii::$app->user->identity->status;
        if ($confirm != 1 || $status != 1) {
            return $this->redirect(["home/index"]);
        }
        $pendanaan = \app\models\Pendanaan::find()
            ->where(['id' => $id])->one();
        // Required
        if ($pendanaan != null) {
            if ($nominal) {
                $name = \Yii::$app->user->identity->name;
                // $name = "Tes";
                $model = new Pembayaran();

                $order_id_midtrans = rand();
                $model->pendanaan_id = $pendanaan->id;
                // $model->kode_transaksi = Yii::$app->security->generateRandomString(10) . date('dmYHis');
                $model->kode_transaksi = $order_id_midtrans;

                // $model->nama = Yii::$app->user->identity->name;
                $model->nama = $name;
                if ($ket == "lembar") {

                    $model->jumlah_lembaran = (int)$nominal;
                    $total = (int)$nominal * $pendanaan->nominal_lembaran;
                    $model->nominal = (int)$total;
                    $transaction_details = array(
                        'order_id' => $order_id_midtrans,
                        'gross_amount' => (int)$total, // no decimal allowed for creditcard
                    );
                    // Optional 
                    $item1_details = array(
                        'id' => '1',
                        'price' => (int)$total,
                        'quantity' => 1,
                        'name' => $pendanaan->nama_pendanaan . "(Lembaran)"
                    );
                } elseif($ket = "nominal") {
                    $model->jumlah_lembaran = 0;
                    $model->nominal = (int)$nominal;
                    $transaction_details = array(
                        'order_id' => $order_id_midtrans,
                        'gross_amount' => (int)$nominal, // no decimal allowed for creditcard
                    );
                    // Optional
                    $item1_details = array(
                        'id' => '1',
                        'price' => (int)$nominal,
                        'quantity' => 1,
                        'name' => $pendanaan->nama_pendanaan . "(Non Lembaran)"
                    );
                } elseif($ket = "lembar-zakat") {
                    $model->jumlah_lembaran = 0;
                    $model->nominal = (int)$nominal;
                    $transaction_details = array(
                        'order_id' => $order_id_midtrans,
                        'gross_amount' => (int)$nominal, // no decimal allowed for creditcard
                    );
                    // Optional
                    $item1_details = array(
                        'id' => '1',
                        'price' => (int)$nominal,
                        'quantity' => 1,
                        'name' => $pendanaan->nama_pendanaan . "(Lembaran Zakat)"
                    );
                } elseif($ket = "nominal-zakat") {
                    $model->jumlah_lembaran = 0;
                    $model->nominal = (int)$nominal;
                    $transaction_details = array(
                        'order_id' => $order_id_midtrans,
                        'gross_amount' => (int)$nominal, // no decimal allowed for creditcard
                    );
                    // Optional
                    $item1_details = array(
                        'id' => '1',
                        'price' => (int)$nominal,
                        'quantity' => 1,
                        'name' => $pendanaan->nama_pendanaan . "(Non Lembaran Zakat)"
                    );
                }elseif($ket = "lembar-infak") {
                    $model->jumlah_lembaran = 0;
                    $model->nominal = (int)$nominal;
                    $transaction_details = array(
                        'order_id' => $order_id_midtrans,
                        'gross_amount' => (int)$nominal, // no decimal allowed for creditcard
                    );
                    // Optional
                    $item1_details = array(
                        'id' => '1',
                        'price' => (int)$nominal,
                        'quantity' => 1,
                        'name' => $pendanaan->nama_pendanaan . "(Lembaran Infak)"
                    );
                } elseif($ket = "nominal-infak") {
                    $model->jumlah_lembaran = 0;
                    $model->nominal = (int)$nominal;
                    $transaction_details = array(
                        'order_id' => $order_id_midtrans,
                        'gross_amount' => (int)$nominal, // no decimal allowed for creditcard
                    );
                    // Optional
                    $item1_details = array(
                        'id' => '1',
                        'price' => (int)$nominal,
                        'quantity' => 1,
                        'name' => $pendanaan->nama_pendanaan . "(Non Lembaran Infak)"
                    );
                }elseif($ket = "lembar-sedekah") {
                    $model->jumlah_lembaran = 0;
                    $model->nominal = (int)$nominal;
                    $transaction_details = array(
                        'order_id' => $order_id_midtrans,
                        'gross_amount' => (int)$nominal, // no decimal allowed for creditcard
                    );
                    // Optional
                    $item1_details = array(
                        'id' => '1',
                        'price' => (int)$nominal,
                        'quantity' => 1,
                        'name' => $pendanaan->nama_pendanaan . "(Lembaran Sedekah)"
                    );
                } elseif($ket = "nominal-sedekah") {
                    $model->jumlah_lembaran = 0;
                    $model->nominal = (int)$nominal;
                    $transaction_details = array(
                        'order_id' => $order_id_midtrans,
                        'gross_amount' => (int)$nominal, // no decimal allowed for creditcard
                    );
                    // Optional
                    $item1_details = array(
                        'id' => '1',
                        'price' => (int)$nominal,
                        'quantity' => 1,
                        'name' => $pendanaan->nama_pendanaan . "(Non Lembaran Sedekah)"
                    );
                }

                // $model->jenis_pembayaran_id = $val['jenis_pembayaran_id'] ?? '';
                // $model->user_id = \Yii::$app->user->identity->id;
                $model->user_id = \Yii::$app->user->identity->id;;
                $model->status_id = 5;
                
                $model->jenis = "wakaf";
                $model->amanah_pendanaan = $amanah_pendanaan;
                $shipping_address = array(
                    'first_name'    => $pendanaan->nama_nasabah,
                    'last_name'     => "(" . $pendanaan->nama_perusahaan . ")",
                    // 'address'       => $amanah_pendanaan,
                    //     'city'          => "Jakarta",
                    //     'postal_code'   => "16602",
                    //     'phone'         => "081122334455",
                    'country_code'  => 'IDN'
                );
                $email = Yii::$app->user->identity->username;
                $nomor_handphone = Yii::$app->user->identity->nomor_handphone;
                $customer_details = array(
                    'first_name'    => $name,
                    'last_name'     => "(" . $name . ")",
                    'email'         => $email,
                    'phone'         => $nomor_handphone,
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

        } else {
            return $this->redirect('program');
        }
    }
    public function actionPembayarans($id, $nominal, $keterangan)
    {
        $confirm = Yii::$app->user->identity->confirm;
        $status = Yii::$app->user->identity->status;
        if ($confirm != 1 || $status != 1) {
            return $this->redirect(["home/index"]);
        }
        $pendanaan = \app\models\Pendanaan::find()
            ->where(['id' => $id])->one();
        // Required
        if ($pendanaan != null) {
            if ($nominal) {
                $name = \Yii::$app->user->identity->name;
                // $name = "Tes";
                $model = new Pembayaran();

                $order_id_midtrans = rand();
                $model->pendanaan_id = $pendanaan->id;
                // $model->kode_transaksi = Yii::$app->security->generateRandomString(10) . date('dmYHis');
                $model->kode_transaksi = $order_id_midtrans;

                $transaction_details = array(
                    'order_id' => $order_id_midtrans,
                    'gross_amount' => (int)$nominal, // no decimal allowed for creditcard
                );



                // $model->nama = Yii::$app->user->identity->name;
                $model->nama = $name;



                $model->jumlah_lembaran = 0;
                $model->nominal = (int)$nominal;

                // Optional
                if ($keterangan == "infak") {
                    $item1_details = array(
                        'id' => '1',
                        'price' => (int)$nominal,
                        'quantity' => 1,
                        'name' => $pendanaan->nama_pendanaan . "(Infak)"
                    );
                } elseif ($keterangan == "wakaf") {
                    $item1_details = array(
                        'id' => '1',
                        'price' => (int)$nominal,
                        'quantity' => 1,
                        'name' => $pendanaan->nama_pendanaan . "(Wakaf)"
                    );
                } else {

                    return $this->redirect('index');
                }



                // $model->jenis_pembayaran_id = $val['jenis_pembayaran_id'] ?? '';
                // $model->user_id = \Yii::$app->user->identity->id;
                $model->user_id = \Yii::$app->user->identity->id;
                $model->status_id = 5;
                $model->jenis = $keterangan;
                $shipping_address = array(
                    'first_name'    => $pendanaan->nama_nasabah,
                    'last_name'     => "(" . $pendanaan->nama_perusahaan . ")",
                    // 'address'       => "Batu",
                    //     'city'          => "Jakarta",
                    //     'postal_code'   => "16602",
                    //     'phone'         => "081122334455",
                    'country_code'  => 'IDN'
                );
                $email = Yii::$app->user->identity->username;
                $nomor_handphone = Yii::$app->user->identity->nomor_handphone;
                $customer_details = array(
                    'first_name'    => $name,
                    'last_name'     => "(" . $name . ")",
                    'email'         => $email,
                    'phone'         => $nomor_handphone,
                    'billing_address'  => $shipping_address,
                    'shipping_address' => $shipping_address
                );

                $hasil_code = \app\components\ActionMidtrans::toReadableOrder($item1_details, $transaction_details, $customer_details);
                $model->code = $hasil_code;
                $hasil = 'https://app.midtrans.com/snap/v2/vtweb/' . $hasil_code;

                // var_dump($model);
                // die;
                if ($model->validate()) {
                    $model->save();
                    Yii::$app->session->setFlash('success', "Data berhasil disimpan.");
                    return $this->redirect(['bayar', 'id' => $model->id]);
                    // return ['success' => true, 'message' => 'success', 'data' => $model, 'code' => $hasil_code,'url'=>$hasil];
                } else {
                    Yii::$app->session->setFlash('error', "Data tidak berhasil disimpan.");
                    return $this->redirect(['detail_program', 'id' => $pendanaan->id]);
                    // return ['success' => false, 'message' => 'gagal', 'data' => $model->getErrors()];
                }
            }
            Yii::$app->session->setFlash('error', "Nominal Belum Diatur");
            return $this->redirect(['detail_program', 'id' => $pendanaan->id]);
            // return ["success" => false, "message" => "Nominal belum diatur"];

        } else {
            return $this->redirect('ziswaf');
        }
    }
    public function actionBayar($id)
    {
        $confirm = Yii::$app->user->identity->confirm;
        $status = Yii::$app->user->identity->status;
        if ($confirm != 1 || $status != 1) {
            return $this->redirect(["home/index"]);
        }

        $pembayaran = Pembayaran::findOne(['id' => $id]);
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
        $pendanaans = Pendanaan::find()->where(['status_tampil' => 1])->limit(6)->all();

        $list_pendanaans = Pendanaan::find()->where(['status_tampil' => 1])->all();
        $news = Berita::find()->limit(6)->all();

        $slides = Slides::find()->where(['status' => 1])->orderBy(new Expression('rand()'))->one();

        if ($model->load($_POST)) {
            $model->status = 0;

            if ($model->save()) {
                Yii::$app->session->setFlash('success', "Data berhasil disimpan.");
                return $this->redirect(['home/index']);
            } else {
                Yii::$app->session->setFlash('error', "Data tidak berhasil disimpan.");
                return $this->redirect(['home/index']);
            }
        }

        return $this->render('bayar', [
            'setting' => $setting,
            // 'snapToken' => $snapToken,
            'pembayaran' => $pembayaran,
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
            'list_pendanaans' => $list_pendanaans,
            'news' => $news,
            'slides' => $slides
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
        $model = new HomeRegistrasi();
        if (Yii::$app->request->isAjax) {
            return $this->renderAjax("registrasi", compact("model"));
        }

        if ($model->load($_POST)) {
            if ($model->registrasi()) {
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

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if (Yii::$app->request->isAjax) {
            return $this->renderAjax("login", compact("model"));
        }
        if ($model->load($_POST)) {
            if ($model->login()) {
                Yii::$app->session->setFlash("success", "Login berhasil");
                return $this->redirect(Yii::$app->request->referrer);
            }
            
            Yii::$app->session->setFlash("error", "Login gagal. Validasi data tidak valid");
            // Yii::$app->session->setFlash("error", "Login gagal. Validasi data tidak valid : " . Constant::flattenError($model->getErrors()));
            return $this->redirect(Yii::$app->request->referrer);
        } else {
            Yii::$app->session->setFlash("error", "Login gagal");
            return $this->redirect(Yii::$app->request->referrer);
        }
    }

    public function actionLupa()
    {
        // if (!\Yii::$app->user->isGuest) {
        //     return $this->goHome();
        // }
        // var_dump("tes");die;
        if (Yii::$app->request->isAjax) {
            return $this->renderAjax("lupa");
        }
        $getEmail = $_POST['Lupa']['email'];
        $getModel = \app\models\User::find()->where(['username' => $getEmail])->one();
        if (isset($_POST['Lupa'])) {
            if ($getModel != null) {
                // if ($detik >= 01 || $getModel->is_used == 0) {
                $getToken = rand(0, 99999);
                $getTime = date("Y-m-d H:i:s");
                $getModel->secret_link = md5($getToken . $getTime);
                $getModel->secret_at = $getTime;
                $getModel->secret_is_used = 1;
                $subjek = "Reset Password";
                $text = "Klik link berikut untuk mengatur ulang Password. 
                    <b>Harap diperhatikan bahwa link berikut hanya berlaku 5 menit.</b><br>
                    Abaikan jika Anda tidak mengatur ulang password!<br/> 
                    <a href='
                    http://" . Url::base('http') . "/site/ganti-password?token=" . $getModel->secret_link . "'>Klik Disini</a>
                    <br/> Jika link tidak dapat dibuka salin teks berikut dan tempel di url browser : <br/>
                    " . Url::base('http') . "/site/ganti-password?token=" . $getModel->secret_link;
                if ($getModel->validate()) {

                    // $getModel->token_created_at = null;
                    Yii::$app->mailer->compose()
                        ->setTo($getModel->username)
                        ->setFrom(['adminIsalam@gmail.com' => 'Isalam'])
                        ->setSubject($subjek)
                        ->setHtmlBody($text)
                        ->send();
                    $getModel->save();

                    // \Yii::$app->getSession()->setFlash(
                    //     'success',
                    //     ''
                    // );
                    Yii::$app->session->setFlash("success", "Link untuk mereset Password Anda telah dikirim ke email Anda. Mohon <b>Cek Spam</b> jika tidak ada di kotak masuk!");
                return $this->redirect(Yii::$app->request->referrer);
                }
                
            } else {
                // \Yii::$app->getSession()->setFlash(
                //     'error',
                //     'Email Tidak Terdaftar'
                // );
                Yii::$app->session->setFlash("false", "Email Tidak Terdaftar");
                return $this->redirect(Yii::$app->request->referrer);
            }
        }
        // Yii::$app->session->setFlash("false", "Email Tidak Terdaftar");
                return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionIndex()
    {
        date_default_timezone_set('Asia/Jakarta');
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
        // $model = new HubungiKami;
        $testimonials = Testimonials::find()->all();
        $pendanaans = Pendanaan::find()->where(['status_tampil' => 1])->limit(6)->all();
        $slides = Slides::find()->where(['status' => 1])->orderBy(new Expression('rand()'))->one();

        $list_pendanaans = Pendanaan::find()->where(['status_tampil' => 1])->all();
        $news = Berita::find()->limit(6)->all();


        // if ($model->load($_POST)) {
        //     $model->status = 0;

        //     if ($model->save()) {
        //         Yii::$app->session->setFlash('success', "Data berhasil disimpan.");
        //     } else {
        //         Yii::$app->session->setFlash('error', "Data tidak berhasil disimpan.");
        //     }
        //     return $this->redirect(['home/index']);
        // }

        $user = Yii::$app->user->identity;
        if (!\Yii::$app->user->isGuest) {
            if ($user->status != 1 && $user->confirm != 1) {
                $model = Otp::findOne(['id_user' => \Yii::$app->user->identity->id, 'is_used' => 0]);
    
                if ($model == null) {
                    $model = new Otp();
    
                    $model->id_user = \Yii::$app->user->identity->id;
                    $model->kode_otp = (string) random_int(1000, 9999);
                    $model->created_at = date('Y-m-d H:i:s');
                    $model->is_used = 0;
    
                    $model->save();
                    $text = "
                        hai,\nini adalah kode OTP untuk Login anda.\n
                        {$model->kode_otp}
                        \nJangan bagikan kode ini dengan siapapun.
                        \nKode akan Kadaluarsa dalam 5 Menit
                        ";
                    Yii::$app->mailer->compose()
                        ->setTo(\Yii::$app->user->identity->username)
                        ->setFrom(['Inisiatorsalam@gmail.com'])
                        ->setSubject('Kode OTP')
                        ->setTextBody($text)
                        ->send();
                    Yii::$app->session->setFlash("success", "Kode OTP Telah Dikirimkan Melalui Email");
                }
                $kode = $model->kode_otp;
                $tanggal_otp = $model->created_at;
    
                if ($model->load($_POST)) {
                    if ($kode == $model->kode_otp) {
                        $now = time();
                        $validasi = strtotime($tanggal_otp) + (60 * 5);
                        if ($now < $validasi) {
                            $model->is_used = 1;
                            $model->save();
    
                            $user = User::findOne(['id' => $model->id_user]);
                            $user->confirm = 1;
                            $user->status = 1;
                            $user->save();
    
                            Yii::$app->session->setFlash("success", "Akun Berhasil Diverifikasi");
                            return $this->redirect(["home/index"]);
                        } else {
                            Yii::$app->session->setFlash("error", "OTP Tidak Valid");
                            return $this->redirect(["home/index"]);
                        }
                    } else {
                        Yii::$app->session->setFlash("error", "OTP Tidak Valid");
                        return $this->redirect(["home/index"]);
                    }
                }
                end:
                $model->kode_otp = "";
            }
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
            'list_pendanaans' => $list_pendanaans,
            'news' => $news,
            'slides' => $slides
        ]);
    }

    public function actionKirimOtp()
    {
        date_default_timezone_set('Asia/Jakarta');

        $otp = Otp::findOne(['id_user' => \Yii::$app->user->identity->id, 'is_used' => 0]);

        $now = time();
        $validasi = strtotime($otp->created_at) + 60;

        // var_dump($now . " " . $validasi);die;
        if ($now > $validasi) {
            $otp->kode_otp = (string) random_int(1000, 9999);
            $text = "
                hai,\nini adalah kode OTP untuk Login anda.\n
                {$otp->kode_otp}
                \nJangan bagikan kode ini dengan siapapun.
                \nKode akan Kadaluarsa dalam 5 Menit
                ";
            Yii::$app->mailer->compose()
                ->setTo(\Yii::$app->user->identity->username)
                ->setFrom(['Inisiatorsalam@gmail.com'])
                ->setSubject('Kode OTP')
                ->setTextBody($text)
                ->send();

            if ($otp->save()) {
                Yii::$app->session->setFlash("success", "OTP Berhasil Dikirim");
                return $this->redirect(["home/index"]);
            } else {
                Yii::$app->session->setFlash("error", "OTP Gagal Dikirim");
                return $this->redirect(["home/index"]);
            }
        } else {
            Yii::$app->session->setFlash("error", "Tunggu 1 Menit");
            return $this->redirect(["home/index"]);
        }
    }

    public function actionVerifikasiAkun()
    {
        date_default_timezone_set('Asia/Jakarta');

        $setting = Setting::find()->one();
        $icon = \Yii::$app->request->baseUrl . "/uploads/setting/" . $setting->logo;
        $user = Yii::$app->user->identity;
        if ($user->status != 1 && $user->confirm != 1) {
            $model = Otp::findOne(['id_user' => \Yii::$app->user->identity->id, 'is_used' => 0]);

            if ($model == null) {
                $model = new Otp();

                $model->id_user = \Yii::$app->user->identity->id;
                $model->kode_otp = (string) random_int(1000, 9999);
                $model->created_at = date('Y-m-d H:i:s');
                $model->is_used = 0;

                $model->save();
                $text = "
                    Hay,\nini adalah kode OTP untuk Login anda.\n
                    {$model->kode_otp}
                    \nJangan bagikan kode ini dengan siapapun.
                    \nKode akan Kadaluarsa dalam 5 Menit
                    ";
                Yii::$app->mailer->compose()
                    ->setTo(\Yii::$app->user->identity->username)
                    ->setFrom(['Inisiatorsalam@gmail.com'])
                    ->setSubject('Kode OTP')
                    ->setTextBody($text)
                    ->send();
                Yii::$app->session->setFlash("success", "Kode OTP Telah Dikirimkan Melalui Email");
            }
            $kode = $model->kode_otp;
            $tanggal_otp = $model->created_at;

            if ($model->load($_POST)) {
                if ($kode == $model->kode_otp) {
                    $now = time();
                    $validasi = strtotime($tanggal_otp) + (60 * 5);
                    if ($now < $validasi) {
                        $model->is_used = 1;
                        $model->save();

                        $user = User::findOne(['id' => $model->id_user]);
                        $user->confirm = 1;
                        $user->status = 1;
                        $user->save();

                        Yii::$app->session->setFlash("success", "Akun Berhasil Diverifikasi");
                        return $this->redirect(["home/index"]);
                    } else {
                        Yii::$app->session->setFlash("error", "OTP Tidak Valid");
                        return $this->redirect(["home/verifikasi-akun"]);
                    }
                } else {
                    Yii::$app->session->setFlash("error", "OTP Tidak Valid");
                    return $this->redirect(["home/verifikasi-akun"]);
                }
            }
            end:
            $model->kode_otp = "";
            return $this->render('validasi-akun', [
                'model' => $model,
                'setting' => $setting,
                'icon' => $icon,
            ]);
        } else {
            Yii::$app->session->setFlash("success", "Akun Berhasil Diverifikasi");
            return $this->redirect(["home/index"]);
        }
    }

    public function actionCheckout()
    {
        $confirm = Yii::$app->user->identity->confirm;
        $status = Yii::$app->user->identity->status;
        if ($confirm != 1 || $status != 1) {
            return $this->redirect(["home/index"]);
        }
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


    public function actionVisi()
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
            return $this->redirect(['home/visi']);
        }

        return $this->render('visi', [
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

    public function actionLatarBelakang()
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
            return $this->redirect(['home/visi']);
        }

        return $this->render('latar_belakang', [
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

    public function actionOrganisasi()
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
            return $this->redirect(['home/organisasi']);
        }

        return $this->render('struktur_organisasi', [
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

    public function actionKontak()
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
        $kontaks = Kontak::find()->all();


        if ($model->load($_POST)) {
            $model->status = 0;

            if ($model->save()) {
                Yii::$app->session->setFlash('success', "Data berhasil disimpan.");
            } else {
                Yii::$app->session->setFlash('error', "Data tidak berhasil disimpan.");
            }
            return $this->redirect(['home/kontak']);
        }

        return $this->render('kontak', [
            'kontaks' => $kontaks,
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

    public function actionAlamatKantor()
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
        $kontaks = Kontak::find()->all();


        // if ($model->load($_POST)) {
        //     $model->status = 0;

        //     if ($model->save()) {
        //         Yii::$app->session->setFlash('success', "Data berhasil disimpan.");
        //     } else {
        //         Yii::$app->session->setFlash('error', "Data tidak berhasil disimpan.");
        //     }
        //     return $this->redirect(['home/kontak']);
        // }

        return $this->render('alamat_kantor', [
            'kontaks' => $kontaks,
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

    public function actionTelp()
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
        $kontaks = Kontak::find()->all();


        // if ($model->load($_POST)) {
        //     $model->status = 0;

        //     if ($model->save()) {
        //         Yii::$app->session->setFlash('success', "Data berhasil disimpan.");
        //     } else {
        //         Yii::$app->session->setFlash('error', "Data tidak berhasil disimpan.");
        //     }
        //     return $this->redirect(['home/kontak']);
        // }

        return $this->render('telp', [
            'kontaks' => $kontaks,
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

    public function actionMap()
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
        $kontaks = Kontak::find()->all();


        // if ($model->load($_POST)) {
        //     $model->status = 0;

        //     if ($model->save()) {
        //         Yii::$app->session->setFlash('success', "Data berhasil disimpan.");
        //     } else {
        //         Yii::$app->session->setFlash('error', "Data tidak berhasil disimpan.");
        //     }
        //     return $this->redirect(['home/kontak']);
        // }

        return $this->render('map', [
            'kontaks' => $kontaks,
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

    public function actionPesan()
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
        $kontaks = Kontak::find()->all();


        // if ($model->load($_POST)) {
        //     $model->status = 0;

        //     if ($model->save()) {
        //         Yii::$app->session->setFlash('success', "Data berhasil disimpan.");
        //     } else {
        //         Yii::$app->session->setFlash('error', "Data tidak berhasil disimpan.");
        //     }
        //     return $this->redirect(['home/kontak']);
        // }

        return $this->render('pesan', [
            'kontaks' => $kontaks,
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

    public function actionMedsos()
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
        $kontaks = Kontak::find()->all();


        // if ($model->load($_POST)) {
        //     $model->status = 0;

        //     if ($model->save()) {
        //         Yii::$app->session->setFlash('success', "Data berhasil disimpan.");
        //     } else {
        //         Yii::$app->session->setFlash('error', "Data tidak berhasil disimpan.");
        //     }
        //     return $this->redirect(['home/kontak']);
        // }

        return $this->render('medsos', [
            'kontaks' => $kontaks,
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

    public function actionZiswaf()
    {
        $setting = Setting::find()->one();
        $pendanaans = Pendanaan::find()->where(['status_tampil' => 1])->all();
        $icon = \Yii::$app->request->baseUrl . "/uploads/setting/" . $setting->logo;

        return $this->render('ziswaf', [
            'pendanaans' => $pendanaans,
            'setting' => $setting,
            'icon' => $icon,
        ]);
    }

    public function actionLaporanWakaf()
    {
        $setting = Setting::find()->one();
        $icon = \Yii::$app->request->baseUrl . "/uploads/setting/" . $setting->logo;
        $jumlah_pembayaran = Pembayaran::find()->where(['user_id' => Yii::$app->user->identity->id])->andWhere(['status_id' => 6])->sum('nominal');
        $pembayaran_sukses = Pembayaran::find()->where(['user_id' => Yii::$app->user->identity->id])->andWhere(['status_id' => 6])->count('status_id');
        $proyek_didanai = Pembayaran::find()->select('pendanaan_id')->where(['user_id' => Yii::$app->user->identity->id])->andWhere(['status_id' => 6])->groupBy('pendanaan_id')->all();

        $query = Pembayaran::find()->where(['user_id' => Yii::$app->user->identity->id]);
        $count = $query->count();
        $pagination = new Pagination(['totalCount' => $count, 'pageSize' => 6]);
        $pembayarans = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        return $this->render('laporan-wakaf', [
            'setting' => $setting,
            'icon' => $icon,
            'jumlah_pembayaran' => $jumlah_pembayaran,
            'pembayaran_sukses' => $pembayaran_sukses,
            'pagination' => $pagination,
            'pembayarans' => $pembayarans,
            'proyek_didanai' => $proyek_didanai
        ]);
    }

    public function actionNotifikasi()
    {
        $confirm = Yii::$app->user->identity->confirm;
        $status = Yii::$app->user->identity->status;
        if ($confirm != 1 || $status != 1) {
            return $this->redirect(["home/index"]);
        }

        $user = Yii::$app->user->identity->id;
        $setting = Setting::find()->one();
        $pembayaran = Pembayaran::find()->where(['user_id' => $user])->limit(4)->orderBy(['id' => SORT_DESC])->all();
        $notifs = Notifikasi::find()->where(['user_id' => $user])->limit(6)->orderBy(['id' => SORT_DESC])->all();
        $icon = \Yii::$app->request->baseUrl . "/uploads/setting/" . $setting->logo;

        return $this->render('notifikasi', [
            'setting' => $setting,
            'notifs' => $notifs,
            'pembayaran' => $pembayaran,
            'icon' => $icon,
        ]);
    }

    public function actionProfile()
    {
        $confirm = Yii::$app->user->identity->confirm;
        $status = Yii::$app->user->identity->status;
        if ($confirm != 1 || $status != 1) {
            return $this->redirect(["home/index"]);
        }
        $setting = Setting::find()->one();
        $icon = \Yii::$app->request->baseUrl . "/uploads/setting/" . $setting->logo;
        $data_all = Pembayaran::find()->where(['user_id' => Yii::$app->user->identity->id])->all();

        $query = Pembayaran::find()->where(['user_id' => Yii::$app->user->identity->id]);
        $count = $query->count();
        $pagination = new Pagination(['totalCount' => $count, 'pageSize' => 6]);
        $pembayarans = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->orderBy(['id' => SORT_DESC])
            ->all();
        foreach ($data_all as $data) {
            $wf = Pembayaran::find()->where(['id' => $data->id])->one();
            // $a = $this->findMidtrans($wf->kode_transaksi);
            $a = $this->findMidtransProduction($wf->kode_transaksi);

            if ($a->status_code == "404") {
                $wf->status_id = $wf->status_id;
            } else {
                if ($a->transaction_status == "pending") {
                    $wf->status_id = 5;
                } elseif ($a->transaction_status == "capture" || $a->transaction_status == "settlement") {
                    $wf->status_id = 6;
                    $wf->tanggal_konfirmasi = date('Y-m-d H:i:s');
                } elseif ($a->transaction_status == "deny" || $a->transaction_status == "cancel" || $a->transaction_status == "expire") {
                    $wf->status_id = 8;
                    $wf->tanggal_konfirmasi = date('Y-m-d H:i:s');
                }
            }

            if ($a->status_code == "404") {
                $wf->jenis_pembayaran_id = "Tidak Ditemukan";
            } else {
                if ($a->payment_type == "cstore") {
                    $wf->jenis_pembayaran_id = $a->store;
                } else {
                    $wf->jenis_pembayaran_id = $a->payment_type;
                }
            }
            $wf->save();
        }

        return $this->render('profile', [
            'setting' => $setting,
            'icon' => $icon,
            'pagination' => $pagination,
            'pembayarans' => $pembayarans
        ]);
    }

    public function actionCancelTransaksi($id){
        $confirm = Yii::$app->user->identity->confirm;
        $status = Yii::$app->user->identity->status;
        $usr = Yii::$app->user->identity->id;
        if ($confirm != 1 || $status != 1 || $usr == null) {
            return $this->redirect(["home/index"]);
        }
        $wf = Pembayaran::findOne(['id'=>$id]);
        $a = $this->findMidtransProductionCancel($wf->kode_transaksi);
            $wf->status_id = 8;
            $wf->tanggal_konfirmasi = date('Y-m-d H:i:s');
            // if ($a->status_code == "404") {
            //     $wf->status_id = 5;
            // } else {
            //     if ($a->transaction_status == "pending") {
            //         $wf->status_id = 5;
            //     } elseif ($a->transaction_status == "capture" || $a->transaction_status == "settlement") {
            //         $wf->status_id = 6;
            //         $wf->tanggal_konfirmasi = date('Y-m-d H:i:s');
            //     } elseif ($a->transaction_status == "deny" || $a->transaction_status == "cancel" || $a->transaction_status == "expire") {
            //         $wf->status_id = 8;
            //         $wf->tanggal_konfirmasi = date('Y-m-d H:i:s');
            //     }
            // }

            if ($a->status_code == "404") {
                $wf->jenis_pembayaran_id = "Tidak Ditemukan";
            } else {
                if ($a->payment_type == "cstore") {
                    $wf->jenis_pembayaran_id = $a->store;
                } else {
                    $wf->jenis_pembayaran_id = $a->payment_type;
                }
            }
            if($wf->save()){
                
                Yii::$app->session->setFlash("success", "Berhasil Cancel Transaksi");
            return $this->redirect(["home/profile"]);
            }
            
            return $this->redirect(["home/profile"]);


    }

    public function actionEditProfile()
    {
        $confirm = Yii::$app->user->identity->confirm;
        $status = Yii::$app->user->identity->status;
        if ($confirm != 1 || $status != 1) {
            return $this->redirect(["home/index"]);
        }
        $model = User::find()->where(["id" => Yii::$app->user->id])->one();
        $setting = Setting::find()->one();
        $icon = \Yii::$app->request->baseUrl . "/uploads/setting/" . $setting->logo;

        $oldMd5Password = $model->password;
        $model->password = "";
        $oldPhotoUrl = $model->photo_url;

        if ($model->load($_POST)) {
            //password
            if ($model->password != "") {
                $model->password = \Yii::$app->security->generatePasswordHash($model->password);
            } else {
                $model->password = $oldMd5Password;
            }

            # get the uploaded file instance
            $image = UploadedFile::getInstance($model, 'photo_url');
            if ($image != null) {
                $response = $this->uploadImage($image, "user_image");

                // dd($response);
                if ($response->success == false) {
                    Yii::$app->session->setFlash("error", "Gambar Tidak Dapat Diunggah");
                    goto end;
                }
                $model->photo_url = $response->filename;
                if ($model->photo_url != null) {
                    unlink(Yii::getAlias("@app/web/uploads/") . $oldPhotoUrl);
                }
                $this->deleteOne($oldPhotoUrl);
            } else {
                $model->photo_url = $oldPhotoUrl;
            }

            // if ($model->validate()) {
            if ($model->save(false)) {
                Yii::$app->session->setFlash("success", "Profile berhasil diubah");
                // }
            } else {
                Yii::$app->session->setFlash("error", "Profile gagal diubah");
            }
            return $this->redirect(["profile"]);
        }
        end:
        $model->password = "";
        return $this->render('edit-profile', [
            'model' => $model,
            'setting' => $setting,
            'icon' => $icon,
        ]);
    }

    public function actionDetailProgram($id)
    {
        $setting = Setting::find()->one();
        $icon = \Yii::$app->request->baseUrl . "/uploads/setting/" . $setting->logo;
        $pendanaan = Pendanaan::findOne($id);
        $dana = Pembayaran::find()->where(['status_id' => 6, 'pendanaan_id' => $id])->sum('nominal');
        $agenda = AgendaPendanaan::find()->where(['pendanaan_id' => $id])->all();
        $kegiatans = KegiatanPendanaan::find()->where(['pendanaan_id' => $id])->orderBy(['id' => SORT_DESC])->one();
        $amanah_pendanaan = AmanahPendanaan::find()->where(['pendanaan_id' => $id])->all();

        $kegiatan_pendanaans = KegiatanPendanaan::find()->where(['pendanaan_id' => $id])->orderBy(['id' => SORT_DESC])->limit(3)->all();
        $donatur = Pembayaran::find()->where(['status_id' => 6, 'pendanaan_id' => $id])->all();
        $persen = $dana / $pendanaan->nominal * 100;
        $datetime1 =  new DateTime($pendanaan->pendanaan_berakhir);
        $datetime2 =  new Datetime(date("Y-m-d H:i:s"));
        $interval = $datetime1->diff($datetime2)->days;

        if ($pendanaan == null) throw new HttpException(404);
        // var_dump($kegiatan_pendanaans);die;
        return $this->render('detail-program', [
            'setting' => $setting,
            'amanah_pendanaan' => $amanah_pendanaan,
            'kegiatans' => $kegiatans,
            'kegiatan_pendanaans' => $kegiatan_pendanaans,
            'donatur' => $donatur,
            'dana' => $dana,
            'agenda' => $agenda,
            'persen' => $persen,
            'interval' => $interval,
            'icon' => $icon,
            'pendanaan' => $pendanaan,
        ]);
    }
    public function actionDetailProgramZakat($id)
    {
        $setting = Setting::find()->one();
        $icon = \Yii::$app->request->baseUrl . "/uploads/setting/" . $setting->logo;
        $pendanaan = Pendanaan::findOne($id);
        $dana = Pembayaran::find()->where(['status_id' => 6, 'pendanaan_id' => $id])->sum('nominal');
        $agenda = AgendaPendanaan::find()->where(['pendanaan_id' => $id])->all();
        $kegiatans = KegiatanPendanaan::find()->where(['pendanaan_id' => $id])->orderBy(['id' => SORT_DESC])->one();
        $amanah_pendanaan = AmanahPendanaan::find()->where(['pendanaan_id' => $id])->all();

        $kegiatan_pendanaans = KegiatanPendanaan::find()->where(['pendanaan_id' => $id])->orderBy(['id' => SORT_DESC])->limit(3)->all();
        $donatur = Pembayaran::find()->where(['status_id' => 6, 'pendanaan_id' => $id])->all();
        $persen = $dana / $pendanaan->nominal * 100;
        $datetime1 =  new DateTime($pendanaan->pendanaan_berakhir);
        $datetime2 =  new Datetime(date("Y-m-d H:i:s"));
        $interval = $datetime1->diff($datetime2)->days;

        if ($pendanaan == null) throw new HttpException(404);
        // var_dump($kegiatan_pendanaans);die;
        return $this->render('detail-program-zakat', [
            'setting' => $setting,
            'amanah_pendanaan' => $amanah_pendanaan,
            'kegiatans' => $kegiatans,
            'kegiatan_pendanaans' => $kegiatan_pendanaans,
            'donatur' => $donatur,
            'dana' => $dana,
            'agenda' => $agenda,
            'persen' => $persen,
            'interval' => $interval,
            'icon' => $icon,
            'pendanaan' => $pendanaan,
        ]);
    }
    public function actionDetailProgramInfak($id)
    {
        $setting = Setting::find()->one();
        $icon = \Yii::$app->request->baseUrl . "/uploads/setting/" . $setting->logo;
        $pendanaan = Pendanaan::findOne($id);
        $dana = Pembayaran::find()->where(['status_id' => 6, 'pendanaan_id' => $id])->sum('nominal');
        $agenda = AgendaPendanaan::find()->where(['pendanaan_id' => $id])->all();
        $kegiatans = KegiatanPendanaan::find()->where(['pendanaan_id' => $id])->orderBy(['id' => SORT_DESC])->one();
        $amanah_pendanaan = AmanahPendanaan::find()->where(['pendanaan_id' => $id])->all();

        $kegiatan_pendanaans = KegiatanPendanaan::find()->where(['pendanaan_id' => $id])->orderBy(['id' => SORT_DESC])->limit(3)->all();
        $donatur = Pembayaran::find()->where(['status_id' => 6, 'pendanaan_id' => $id])->all();
        $persen = $dana / $pendanaan->nominal * 100;
        $datetime1 =  new DateTime($pendanaan->pendanaan_berakhir);
        $datetime2 =  new Datetime(date("Y-m-d H:i:s"));
        $interval = $datetime1->diff($datetime2)->days;

        if ($pendanaan == null) throw new HttpException(404);
        // var_dump($kegiatan_pendanaans);die;
        return $this->render('detail-program-infak', [
            'setting' => $setting,
            'amanah_pendanaan' => $amanah_pendanaan,
            'kegiatans' => $kegiatans,
            'kegiatan_pendanaans' => $kegiatan_pendanaans,
            'donatur' => $donatur,
            'dana' => $dana,
            'agenda' => $agenda,
            'persen' => $persen,
            'interval' => $interval,
            'icon' => $icon,
            'pendanaan' => $pendanaan,
        ]);
    }
    public function actionDetailProgramSedekah($id)
    {
        $setting = Setting::find()->one();
        $icon = \Yii::$app->request->baseUrl . "/uploads/setting/" . $setting->logo;
        $pendanaan = Pendanaan::findOne($id);
        $dana = Pembayaran::find()->where(['status_id' => 6, 'pendanaan_id' => $id])->sum('nominal');
        $agenda = AgendaPendanaan::find()->where(['pendanaan_id' => $id])->all();
        $kegiatans = KegiatanPendanaan::find()->where(['pendanaan_id' => $id])->orderBy(['id' => SORT_DESC])->one();
        $amanah_pendanaan = AmanahPendanaan::find()->where(['pendanaan_id' => $id])->all();

        $kegiatan_pendanaans = KegiatanPendanaan::find()->where(['pendanaan_id' => $id])->orderBy(['id' => SORT_DESC])->limit(3)->all();
        $donatur = Pembayaran::find()->where(['status_id' => 6, 'pendanaan_id' => $id])->all();
        $persen = $dana / $pendanaan->nominal * 100;
        $datetime1 =  new DateTime($pendanaan->pendanaan_berakhir);
        $datetime2 =  new Datetime(date("Y-m-d H:i:s"));
        $interval = $datetime1->diff($datetime2)->days;

        if ($pendanaan == null) throw new HttpException(404);
        // var_dump($kegiatan_pendanaans);die;
        return $this->render('detail-program-sedekah', [
            'setting' => $setting,
            'amanah_pendanaan' => $amanah_pendanaan,
            'kegiatans' => $kegiatans,
            'kegiatan_pendanaans' => $kegiatan_pendanaans,
            'donatur' => $donatur,
            'dana' => $dana,
            'agenda' => $agenda,
            'persen' => $persen,
            'interval' => $interval,
            'icon' => $icon,
            'pendanaan' => $pendanaan,
        ]);
    }

    public function actionProgram()
    {
        $setting = Setting::find()->one();
        $icon = \Yii::$app->request->baseUrl . "/uploads/setting/" . $setting->logo;
        $bg_login = \Yii::$app->request->baseUrl . "/uploads/setting/" . $setting->bg_login;
        $bg = \Yii::$app->request->baseUrl . "/uploads/setting/" . $setting->bg_pin;


        if (isset($_GET['kategori'])) {
            $kategori = $_GET['kategori'];
            $get_id = KategoriPendanaan::find()->where(['name' => $kategori])->one();
            $query = Pendanaan::find()->where(['status_tampil' => 1, 'kategori_pendanaan_id' => $get_id]);
            $count = $query->count();
            $pagination = new Pagination(['totalCount' => $count, 'pageSize' => 9]);
            $pendanaans = $query->offset($pagination->offset)
                ->limit($pagination->limit)
                ->all();
        } else {
            $query = Pendanaan::find()->where(['status_tampil' => 1]);
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
    public function actionProgramZakat()
    {
        $setting = Setting::find()->one();
        $icon = \Yii::$app->request->baseUrl . "/uploads/setting/" . $setting->logo;
        $bg_login = \Yii::$app->request->baseUrl . "/uploads/setting/" . $setting->bg_login;
        $bg = \Yii::$app->request->baseUrl . "/uploads/setting/" . $setting->bg_pin;


        if (isset($_GET['kategori'])) {
            $kategori = $_GET['kategori'];
            $get_id = KategoriPendanaan::find()->where(['name' => $kategori])->one();
            $query = Pendanaan::find()->where(['status_tampil' => 1, 'kategori_pendanaan_id' => $get_id]);
            $count = $query->count();
            $pagination = new Pagination(['totalCount' => $count, 'pageSize' => 9]);
            $pendanaans = $query->offset($pagination->offset)
                ->limit($pagination->limit)
                ->all();
        } else {
            $query = Pendanaan::find()->where(['status_tampil' => 1]);
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

        return $this->render('program-zakat', [
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
    public function actionProgramInfak()
    {
        $setting = Setting::find()->one();
        $icon = \Yii::$app->request->baseUrl . "/uploads/setting/" . $setting->logo;
        $bg_login = \Yii::$app->request->baseUrl . "/uploads/setting/" . $setting->bg_login;
        $bg = \Yii::$app->request->baseUrl . "/uploads/setting/" . $setting->bg_pin;


        if (isset($_GET['kategori'])) {
            $kategori = $_GET['kategori'];
            $get_id = KategoriPendanaan::find()->where(['name' => $kategori])->one();
            $query = Pendanaan::find()->where(['status_tampil' => 1, 'kategori_pendanaan_id' => $get_id]);
            $count = $query->count();
            $pagination = new Pagination(['totalCount' => $count, 'pageSize' => 9]);
            $pendanaans = $query->offset($pagination->offset)
                ->limit($pagination->limit)
                ->all();
        } else {
            $query = Pendanaan::find()->where(['status_tampil' => 1]);
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

        return $this->render('program-infak', [
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
    public function actionProgramSedekah()
    {
        $setting = Setting::find()->one();
        $icon = \Yii::$app->request->baseUrl . "/uploads/setting/" . $setting->logo;
        $bg_login = \Yii::$app->request->baseUrl . "/uploads/setting/" . $setting->bg_login;
        $bg = \Yii::$app->request->baseUrl . "/uploads/setting/" . $setting->bg_pin;


        if (isset($_GET['kategori'])) {
            $kategori = $_GET['kategori'];
            $get_id = KategoriPendanaan::find()->where(['name' => $kategori])->one();
            $query = Pendanaan::find()->where(['status_tampil' => 1, 'kategori_pendanaan_id' => $get_id]);
            $count = $query->count();
            $pagination = new Pagination(['totalCount' => $count, 'pageSize' => 9]);
            $pendanaans = $query->offset($pagination->offset)
                ->limit($pagination->limit)
                ->all();
        } else {
            $query = Pendanaan::find()->where(['status_tampil' => 1]);
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

        return $this->render('program-sedekah', [
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
    public function actionCetak($id) {
        $formatter = \Yii::$app->formatter;
        $model = Pembayaran::findOne(['kode_transaksi' => $id]);
        $content = $this->renderPartial('view-print',[
            'model' => $model,
    ]);
        
        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_CORE, 
            //Name file
            'filename' => 'Akad Wakaf'."pdf",
            // LEGAL paper format
            'format' => Pdf::FORMAT_LEGAL, 
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT, 
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER, 
            // your html content input
            'content' => $content,  
            'marginHeader' => 0,
            'marginFooter' => 1,
            'marginTop' => 1,
            'marginBottom' => 5,
            'marginLeft' => 0,
            'marginRight' => 0,
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting 
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/src/assets/kv-mpdf-bootstrap.min.css',
            // any css to be embedded if required
            // 'cssInline' => '.kv-heading-1{font-size:25px}', 
            'cssInline' => 'body { font-family: irannastaliq; font-size: 17px; }.page-break {display: none;};
            .kv-heading-1{font-size:17px}table{width: 100%;line-height: inherit;text-align: left; border-collapse: collapse;}table, td, th {margin-left:50px;margin-right:50px;},fa { font-family: fontawesome;} @media print{
                .page-break{display: block;page-break-before: always;}
            }',
             // set mPDF properties on the fly
             'options' => [               
                'defaultheaderline' => 0,  //for header
                 'defaultfooterline' => 0,  //for footer
            ],
             // call mPDF methods on the fly
            'methods' => [
                'SetTitle'=>'Print', 
                'SetHeader' => $this->renderPartial('header_gambar'),
              //   // 'SetHeader'=>['AMONG TANI FOUNDATION'],
              //   'SetFooter'=>$this->renderPartial('footer_gambar'),
                
            ]
        ]);
        return $pdf->render(); 
    }
    protected function findMidtrans($id)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.sandbox.midtrans.com/v2/" . $id . "/status",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_POSTFIELDS => "\n\n",
            CURLOPT_HTTPHEADER => array(
                "Accept: application/json",
                "Content-Type: application/json",
                "Authorization: Basic U0ItTWlkLXNlcnZlci1MV1RfNVJHdkhsUk9sSWJtYUU4SzBudGI6"
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $a = json_decode($response);
        return $a;
    }
    protected function findMidtransProduction($id)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.midtrans.com/v2/" . $id . "/status",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_POSTFIELDS => "\n\n",
            CURLOPT_HTTPHEADER => array(
                "Accept: application/json",
                "Content-Type: application/json",
                "Authorization: Basic TWlkLXNlcnZlci1oV3hSekx0a3NmX0s4SUNhY3RjZ0Fwdl86"
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $a = json_decode($response);
        return $a;
    }
    protected function findMidtransProductionCancel($id)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.midtrans.com/v2/" . $id . "/cancel",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "\n\n",
            CURLOPT_HTTPHEADER => array(
                "Accept: application/json",
                "Content-Type: application/json",
                "Authorization: Basic TWlkLXNlcnZlci1oV3hSekx0a3NmX0s4SUNhY3RjZ0Fwdl86"
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $a = json_decode($response);
        return $a;
    }

    // public function actionLupaPassword()
    // {
    //     $this->layout = '@app/views/layouts/main-login';
    //     if (Yii::$app->user->isGuest) {
    //         $model = new \app\models\LoginForm();
    //         return $this->render('lupa-password', [
    //             'model' => $model
    //         ]);
    //     } else {
    //         return $this->redirect(["home/index"]);
    //     }
    // }

    // public function actionGantiPassword()
    // {
    //     $this->layout = '@app/views/layouts/main-login';
    //     if (Yii::$app->user->isGuest) {
    //         $model = new \app\models\LoginForm();
    //         return $this->render('ganti-password', [
    //             'model' => $model
    //         ]);
    //     } else {
    //         return $this->redirect(["home/index"]);
    //     }
    // }
}
