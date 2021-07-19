<?php

namespace app\controllers;

// use Endroid\QrCode\QrCode;
// use Endroid\QrCode\ErrorCorrectionLevel;
//use app\components\NodeLogger;
use app\models\Action;
use app\components\Tanggal;
use app\models\Pendanaan;
use app\models\Pembayaran;
use app\models\LoginForm;
use app\models\User;
use kartik\mpdf\Pdf;
use Yii;
use yii\db\Expression;
use yii\web\Controller;
use yii\web\Response;
use yii\web\UploadedFile;

class SiteController extends Controller
{

    public function behaviors()
    {
        //NodeLogger::sendLog(Action::getAccess($this->id));
        //apply role_action table for privilege (doesn't apply to super admin)
        return Action::getAccess($this->id);
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        $user = Yii::$app->user->identity;
        if ($user->role_id == 8) {
            return $this->render('index_pegawai');
        }
        $userAll = User::find()->where(['status'=>1])->count();
        $investor = User::find()->where(['role_id' => 5])->count();
        $operator = User::find()->where(['role_id' => 2])->all();
        $marketing = User::find()->where(['role_id' => 3])->all();
        $user = User::find()->where(['role_id' => 4])->all();
        $pembayaran = Pembayaran::find()->all();
        $pendanaanAll = Pendanaan::find()->all();
        $countPendanaan = Pendanaan::find()->where(['status_id'=>4])->count();
        $pendanaanAktif = Pendanaan::find()->where(['status_id' => 2])->all();
        return $this->render('index',[
            'userAll' => $userAll,
            'investor' => $investor,
            'operator' => $operator,
            'marketing' => $marketing,
            'user' => $user,
            'pembayaran' => $pembayaran,
            'pendanaanAll' => $pendanaanAll,
            'countPendanaan' => $countPendanaan,
            'pendanaanAktif' => $pendanaanAktif,
        ]);
    }

    public function actionProfile()
    {
        $model = User::find()->where(["id" => Yii::$app->user->id])->one();
        $oldMd5Password = $model->password;
        $oldPhotoUrl = $model->photo_url;

        $model->password = "";

        if ($model->load($_POST)) {
            //password
            if ($model->password != "") {
                $model->password = md5($model->password);
            } else {
                $model->password = $oldMd5Password;
            }

            # get the uploaded file instance
            $image = UploadedFile::getInstance($model, 'photo_url');
            if ($image != null) {
                # store the source file name
                $model->photo_url = $image->name;
                $arr = explode(".", $image->name);
                $extension = end($arr);

                # generate a unique file name
                $model->photo_url = Yii::$app->security->generateRandomString() . ".{$extension}";

                # the path to save file
                $path = Yii::getAlias("@app/web/uploads/") . $model->photo_url;
                $image->saveAs($path);
            } else {
                $model->photo_url = $oldPhotoUrl;
            }

            
            if ($model->save()) {
                Yii::$app->session->addFlash("success", "Profile successfully updated.");
            } else {
                Yii::$app->session->addFlash("danger", "Profile cannot updated.");
            }
            return $this->redirect(["profile"]);
        }
        return $this->render('profile', [
            'model' => $model,
        ]);
    }

    public function actionRegister()
    {
        $this->layout = "main-login";

        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new RegisterForm();
        if ($model->load(Yii::$app->request->post()) && $model->register()) {
            Yii::$app->session->addFlash("success", "Register success, please login");
            return $this->redirect(["site/login"]);
        }
        return $this->render('register', [
            'model' => $model,
        ]);
    }

    public function actionLogin()
    {
        $this->layout = "main-login";

        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {

            //log last login column
            $user = Yii::$app->user->identity;
            $user->last_login = new Expression("NOW()");
            $user->save();

            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        //log last login column
        $user = Yii::$app->user->identity;
        $user->last_logout = new Expression("NOW()");
        $user->save();

        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
    public function actionPemasukkan()
    {
        return $this->render('_chart_transaksi_masuk.php');
    }
    public function actionPengeluaran()
    {
        return $this->render('_chart_transaksi_keluar.php');
    }
    public function actionListPerhitungan()
    {
        $searchModel = new TransaksiUangSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('list-perhitungan', [
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionListHutang()
    {
        $searchModel = new \app\models\search\HutangPiutangSearch();
        $month = date('m');
        $year = date('Y');
        $mm = date('F');
        $datenow = date('Y-m-d');
        // $searchModel = HutangPiutang::find()->all();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('list-hutang', [
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionJurnal()
    {
        $searchModel = new JurnalSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('jurnal', [
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionNeraca()
    {
        $searchModel = new NeracaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('neraca', [
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionArusKas()
    {
        $searchModel = new ArusKasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('arus-kas', [
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionProyeksi()
    {
        $searchModel = new ProyeksiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('proyeksi', [
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionCetakNeraca()
    {
        // get your HTML raw content without any layouts or scripts
        // $session = Yii::$app->session;
        // $session->open();
        // $queryParams = isset($session['query_params']) ? json_decode($session['query_params'], true) : [];
        // $session->close();
        // $searchModel = new TransaksiUangSearch();
        // $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        // Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
        $formatter = \Yii::$app->formatter;
        $content = $this->renderPartial('cetak-neraca');

        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // 'default_font_size' => 9,
            // set to use core fonts only
            'mode' => Pdf::MODE_CORE,
            // LEGAL paper format
            'format' => Pdf::FORMAT_LEGAL,
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT,
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER,
            // your html content input
            'content' => $content,
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/src/assets/kv-mpdf-bootstrap.min.css',
            // any css to be embedded if required
            // 'cssInline' => '.kv-heading-1{font-size:100px}',
            'cssInline' => 'body, p { font-family: irannastaliq; font-size: 15px; };
              .kv-heading-1{font-size:20px}table{width: 100%;line-height: inherit;text-align: left; border-collapse: collapse;}table, td, th {}',
            // set mPDF properties on the fly
            'options' => ['shrink_tables_to_fit' => 0],
            // call mPDF methods on the fly
            'methods' => [
                'SetTitle' => 'Print',
                'SetHeader' => ['BATU TRACKING 19: ' . $formatter->asDate(date("r"))],
                // 'SetHeader'=>['BATU TRACKING 19'],
                'SetFooter' => ['{PAGENO}'],

            ],
        ]);
        // $pdf->SetDefaultFontSize(9);
        return $pdf->render();
    }
    public function actionCetakListPerhitungan()
    {
        // get your HTML raw content without any layouts or scripts
        // $session = Yii::$app->session;
        // $session->open();
        // $queryParams = isset($session['query_params']) ? json_decode($session['query_params'], true) : [];
        // $session->close();
        // $searchModel = new TransaksiUangSearch();
        // $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        // Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
        $searchModel = new TransaksiUangSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $formatter = \Yii::$app->formatter;
        $content = $this->renderPartial('list-perhitungan', ['searchModel' => $searchModel, 'dataProvider' => $dataProvider]);

        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_CORE,
            // LEGAL paper format
            'format' => Pdf::FORMAT_LEGAL,
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT,
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER,
            // your html content input
            'content' => $content,
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/src/assets/kv-mpdf-bootstrap.min.css',
            // any css to be embedded if required
            // 'cssInline' => '.kv-heading-1{font-size:25px}',
            'cssInline' => 'body, p { font-family: irannastaliq; font-size: 15px; };
              .kv-heading-1{font-size:20px}table{width: 100%;line-height: inherit;text-align: left; border-collapse: collapse;}table, td, th {}',
            // set mPDF properties on the fly
            'options' => [],
            // call mPDF methods on the fly
            'methods' => [
                'SetTitle' => 'Print',
                'SetHeader' => ['BATU TRACKING 19: ' . $formatter->asDate(date("r"))],
                // 'SetHeader'=>['BATU TRACKING 19'],
                'SetFooter' => ['{PAGENO}'],

            ],
        ]);
        return $pdf->render();
    }
    public function actionCetakArusKas()
    {
        // get your HTML raw content without any layouts or scripts
        // $session = Yii::$app->session;
        // $session->open();
        // $queryParams = isset($session['query_params']) ? json_decode($session['query_params'], true) : [];
        // $session->close();
        // $searchModel = new TransaksiUangSearch();
        // $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        // Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
        $formatter = \Yii::$app->formatter;
        $content = $this->renderPartial('cetak-arus-kas');

        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_CORE,
            // LEGAL paper format
            'format' => Pdf::FORMAT_LEGAL,
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT,
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER,
            // your html content input
            'content' => $content,
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/src/assets/kv-mpdf-bootstrap.min.css',
            // any css to be embedded if required
            // 'cssInline' => '.kv-heading-1{font-size:25px}',
            'cssInline' => 'body, p { font-family: irannastaliq; font-size: 17px; };
              .kv-heading-1{font-size:17px}table{width: 100%;line-height: inherit;text-align: left; border-collapse: collapse;}table, td, th {}',
            // set mPDF properties on the fly
            'options' => [],
            // call mPDF methods on the fly
            'methods' => [
                'SetTitle' => 'Print',
                'SetHeader' => ['BATU TRACKING 19: ' . $formatter->asDate(date("r"))],
                // 'SetHeader'=>['BATU TRACKING 19'],
                'SetFooter' => ['{PAGENO}'],

            ],
        ]);
        return $pdf->render();
    }
    public function actionCetakProyeksi()
    {
        // get your HTML raw content without any layouts or scripts
        // $session = Yii::$app->session;
        // $session->open();
        // $queryParams = isset($session['query_params']) ? json_decode($session['query_params'], true) : [];
        // $session->close();
        // $searchModel = new TransaksiUangSearch();
        // $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        // Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
        $formatter = \Yii::$app->formatter;
        $content = $this->renderPartial('cetak-proyeksi');

        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_CORE,
            // LEGAL paper format
            'format' => Pdf::FORMAT_LEGAL,
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT,
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER,
            // your html content input
            'content' => $content,
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/src/assets/kv-mpdf-bootstrap.min.css',
            // any css to be embedded if required
            // 'cssInline' => '.kv-heading-1{font-size:25px}',
            'cssInline' => 'body, p { font-family: irannastaliq; font-size: 15px; };
              .kv-heading-1{font-size:20px}table{width: 100%;line-height: inherit;text-align: left; border-collapse: collapse;}table, td, th {}',
            // set mPDF properties on the fly
            'options' => [],
            // call mPDF methods on the fly
            'methods' => [
                'SetTitle' => 'Print',
                'SetHeader' => ['BATU TRACKING 19: ' . $formatter->asDate(date("r"))],
                // 'SetHeader'=>['BATU TRACKING 19'],
                'SetFooter' => ['{PAGENO}'],

            ],
        ]);
        return $pdf->render();
    }

    public function actionGenerate()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $date = date('Y-m-d');
        $check = Presence::findOne(['date' => $date]);
        if ($check) {
            return [
                "success" => false,
                "message" => "telah tersedia data untuk tanggal " . Tanggal::toReadableDate($date, false),
            ];
        }

        $users = User::find()->where(["and", ['is not', 'qr_code', null], ['!=', 'qr_code', ""]])->all();
        $transaction = Yii::$app->db->beginTransaction();

        try {
            foreach ($users as $user) {
                $presence = new Presence();
                $presence->qr_code = $user->qr_code;
                $presence->user_id = $user->id;
                $presence->name = $user->name;
                $presence->date = $date;

                if ($presence->validate() == false) {
                    $transaction->rollBack();
                    var_dump($user->qr_code);
                    die;
                    return [
                        "success" => false,
                        "message" => "Terjadi masalah saat men-generate data.". json_encode($presence->getErrors()),
                    ];
                }
                $presence->save();
            }
            $transaction->commit();
            return [
                "success" => true,
                "message" => "Data berhasil di generate.",
            ];
        } catch (\Throwable $th) {
            $transaction->rollBack();
            return [
                "success" => false,
                "message" => "Terjadi kesalahan". $th,
            ];
        }
    }
}
