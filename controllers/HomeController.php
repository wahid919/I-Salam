<?php

namespace app\controllers;

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
use app\models\Testimonials;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;
use Midtrans\Snap;

/**
 * This is the class for controller "BeritaController".
 */
class HomeController extends Controller
{
    public function actionIndex()
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
            'model' => $model
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
        $this->layout = false;
        if (isset($_GET['cari'])) {
            $cari = $_GET['cari'];
            $news = Berita::find()->where(['like', 'judul', $cari])->all();
            // var_dump($news);die;
        } else {
            $news = Berita::find()->all();
        }
        if (isset($_GET['kategori'])) {
            $cat = $_GET['kategori'];

            $kategori = KategoriBerita::find()->where(['nama' => $cat])->one();
            $news = Berita::find()->where(['kategori_berita_id' => $kategori->id])->all();
            // var_dump($news);die;
        } else {
            $news = Berita::find()->all();
        }
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
            'bg_login' => $bg_login,
            'icon' => $icon
        ]);
    }

    public function actionDetailBerita($id)
    {
        // var_dump($id);die;
        $this->layout = false;
        $berita = Berita::find()->where(['slug' => $id])->one();
        $setting = Setting::find()->one();
        $bg_login = \Yii::$app->request->baseUrl . "/uploads/setting/" . $setting->bg_login;
        return $this->render('detail-berita', [
            'setting' => $setting,
            'berita' => $berita,
            'bg_login' => $bg_login
        ]);
    }

    public function actionAbout()
    {

        $this->layout = false;

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

    public function actionProgram()
    {

        $this->layout = false;

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
            'pagination' => $pagination
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
