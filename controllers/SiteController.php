<?php

namespace app\controllers;

// use Endroid\QrCode\QrCode;
// use Endroid\QrCode\ErrorCorrectionLevel;
//use app\components\NodeLogger;
use app\models\Action;
use app\components\Tanggal;
use app\models\ContactForm;
use app\models\Pendanaan;
use app\models\Pembayaran;
use app\models\Pencairan;
use app\models\LoginForm;
use app\models\Penyaluran;
use app\models\Setting;
use app\models\User;
use kartik\mpdf\Pdf;
use Yii;
use yii\db\Expression;
use yii\helpers\Url;
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
            // 'error' => [
            //     'class' => 'yii\web\ErrorAction',
            // ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
    public function actionError()
    {
        $exception = Yii::$app->errorHandler->exception;
        $setting = Setting::find()->one();
        if ($exception !== null) {
            $this->layout = false;
            return $this->render('errors', ['exception' => $exception,'setting' => $setting]);
        }
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
        $pembayaran_diterima = Pembayaran::find()->where(['status_id'=>6])->sum("nominal");
        $pendanaan_cair = Pencairan::find()->sum("nominal");
        $penyaluran = Penyaluran::find()->sum("nominal");
        $pendanaanAll = Pendanaan::find()->all();
        $countPendanaan = Pendanaan::find()->where(['status_id'=>3])->count();
        $pendanaanAktif = Pendanaan::find()->where(['status_id' => 2])->all();


        
        $month = date('m');
        $year = date('Y');
        $datenow = date('Y-m-d');
        $harian = Pembayaran::find()
        ->where(['and', ['>=', 'tanggal_konfirmasi', "$year-$month-01"], ['<=', 'tanggal_konfirmasi', "$datenow"]])
        ->andWhere(['status_id' => 6])
        ->select(['status_id','tanggal_konfirmasi', 'sum(nominal) as nominal'])
        ->groupBy(['tanggal_konfirmasi'])->all();
        // var_dump($harian);
        // die;
       


        return $this->render('index',[
            'userAll' => $userAll,
            'investor' => $investor,
            'operator' => $operator,
            'marketing' => $marketing,
            'penyaluran' => $penyaluran,
            'user' => $user,
            'harian' => $harian,
            'pembayaran' => $pembayaran,
            'pendanaanAll' => $pendanaanAll,
            'countPendanaan' => $countPendanaan,
            'pendanaanAktif' => $pendanaanAktif,
            'pembayaran_diterima' => $pembayaran_diterima,
            'pendanaan_cair' => $pendanaan_cair,
        ]);
    }

    public function actionProfile()
    {
        $model = User::find()->where(["id" => Yii::$app->user->id])->one();
        $oldMd5Password = $model->password;
        $oldPhotoUrl = $model->photo_url;

        $model->password = "";
        $model->pin = "";

        if ($model->load($_POST)) {
            //password
            if ($model->password != "") {
                $model->password = Yii::$app->security->generatePasswordHash($model->password);
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
                $path = Yii::getAlias("@app/web/uploads/user_image/") . $model->photo_url;
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

    // public function actionRegister()
    // {
    //     $this->layout = "main-login";

    //     if (!\Yii::$app->user->isGuest) {
    //         return $this->goHome();
    //     }

    //     $model = new RegisterForm();
    //     if ($model->load(Yii::$app->request->post()) && $model->register()) {
    //         Yii::$app->session->addFlash("success", "Register success, please login");
    //         return $this->redirect(["site/login"]);
    //     }
    //     return $this->render('register', [
    //         'model' => $model,
    //     ]);
    // }

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
    public function actionLupaPassword()
    {
        // var_dump("tes");die;
        $this->view->title = 'Lupa Password';
        
        $this->layout = "main-login";
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

                    \Yii::$app->getSession()->setFlash(
                        'success',
                        'Link untuk mereset Password Anda telah dikirim ke email Anda. Mohon <b>Cek Spam</b> jika tidak ada di kotak masuk!'
                    );
                    return $this->redirect(["site/lupa-password"]);
                }
                
            } else {
                \Yii::$app->getSession()->setFlash(
                    'error',
                    'Email Tidak Terdaftar'
                );
                return $this->redirect(["site/lupa-password"]);
            }
        }
        return $this->render('lupa-password');
    }

    public function actionGantiPassword($token)
    {
        $this->view->title = 'Ganti Password';

        $this->layout = "main-login";
        $model = \app\models\User::find()->where(['secret_link' => $token])->one();

        if ($model == null) {
            Yii::$app->session->addFlash("error", "Token Tidak Valid");
            return $this->redirect(["site/login"]);
        } else {
            $now = strtotime(date('Y-m-d H:i:s'));
            $validasi = strtotime($model->secret_at) + (60 * 5);
            if ($now > $validasi) {
                $model->secret_link = null;
                $model->secret_at = null;
                $model->secret_is_used = 0;
                $model->save();
                \Yii::$app->getSession()->setFlash(
                    'error',
                    'Link kadaluwarsa, silahkan masukkan kembali Email Anda.'
                );
                return $this->redirect(["site/lupa-password"]);
            } else {
                if (isset($_POST['Ganti'])) {
                    if ($model->secret_link == $_POST['Ganti']['tokenhid']) {
                        $model->password = \Yii::$app->security->generatePasswordHash($_POST['Ganti']['password']);
                        $model->secret_link = null;
                        $model->save();
                        Yii::$app->session->addFlash("success", "Password Telah Diubah, Silahkan Login");
                        return $this->redirect(["site/login"]);
                        $this->refresh();
                    }
                }
                return $this->render('ganti-password', array(
                    'model' => $model,
                ));
            }
        }
    }
}
