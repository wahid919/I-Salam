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

/**
 * This is the class for controller "BeritaController".
 */
class FrontendController extends Controller
{
    public function actionIndex()
    {

        $this->layout = false;

        $setting = Setting::find()->one();
        $icon = \Yii::$app->request->baseUrl . "/uploads/setting/" . $setting->logo;
        $bg_login = \Yii::$app->request->baseUrl . "/uploads/setting/" . $setting->bg_login;
        $bg = \Yii::$app->request->baseUrl . "/uploads/setting/" . $setting->bg_pin;
        $organisasis = Organisasi::find()->where(['flag'=>1])->all();
        $lembagas = LembagaPenerima::find()->where(['flag'=>1])->all();
        $count_program = Pendanaan::find()->count();
        $count_wakif = User::find()->where(['role_id'=>5])->count();
        $model = new HubungiKami;
        $testimonials = Testimonials::find()->all();


        if ($model->load($_POST)) {
            $model->status = 0;

            if ($model->save()) {
                Yii::$app->session->setFlash('success', "Data created successfully."); 
            } else {
                Yii::$app->session->setFlash('error', "Data not saved.");
            }
            return $this->redirect('frontend/index');
        }

        return $this->render('index', [
            'setting' => $setting,
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

    public function actionBerita()
    {
        $this->layout = false;
        $setting = Setting::find()->one();
        $categories = KategoriBerita::find()->all();
        $news = Berita::find()->all();
        $model = new HubungiKami;

        if ($model->load($_POST)) {
            $model->status = 0;

            if ($model->save()) {
                Yii::$app->session->setFlash('success', "Data created successfully."); 
            } else {
                Yii::$app->session->setFlash('error', "Data not saved.");
            }
            return $this->redirect('frontend/about_us');
        }
        return $this->render('berita',[
            'setting' => $setting,
            'categories' => $categories,
            'news' => $news,
            'model' => $model
        ]);
    }

    public function actionDetailBerita($id)
    {
        // var_dump($id);die;
        $this->layout = false;
        $berita = Berita::find()->where(['slug' => $id])->one();
        $setting = Setting::find()->one();
        return $this->render('detail-berita',[
            'setting' => $setting,
            'berita' => $berita
        ]);
    }

    public function actionAbout()
    {

        $this->layout = false;

        $setting = Setting::find()->one();
        $icon = \Yii::$app->request->baseUrl . "/uploads/setting/" . $setting->logo;
        $bg_login = \Yii::$app->request->baseUrl . "/uploads/setting/" . $setting->bg_login;
        $bg = \Yii::$app->request->baseUrl . "/uploads/setting/" . $setting->bg_pin;
        $organisasis = Organisasi::find()->where(['flag'=>1])->all();
        $lembagas = LembagaPenerima::find()->where(['flag'=>1])->all();
        $count_program = Pendanaan::find()->count();
        $count_wakif = User::find()->where(['role_id'=>5])->count();
        $model = new HubungiKami;


        if ($model->load($_POST)) {
            $model->status = 0;

            if ($model->save()) {
                Yii::$app->session->setFlash('success', "Data created successfully."); 
            } else {
                Yii::$app->session->setFlash('error', "Data not saved.");
            }
            return $this->redirect('frontend/about_us');
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

    public function actionNews()
    {

        $this->layout = false;

        $setting = Setting::find()->one();
        $icon = \Yii::$app->request->baseUrl . "/uploads/setting/" . $setting->logo;
        $bg_login = \Yii::$app->request->baseUrl . "/uploads/setting/" . $setting->bg_login;
        $bg = \Yii::$app->request->baseUrl . "/uploads/setting/" . $setting->bg_pin;
        $organisasis = Organisasi::find()->where(['flag'=>1])->all();
        $lembagas = LembagaPenerima::find()->where(['flag'=>1])->all();
        $count_program = Pendanaan::find()->count();
        $count_wakif = User::find()->where(['role_id'=>5])->count();
        $model = new HubungiKami;


        if ($model->load($_POST)) {
            $model->status = 0;

            if ($model->save()) {
                Yii::$app->session->setFlash('success', "Data created successfully."); 
            } else {
                Yii::$app->session->setFlash('error', "Data not saved.");
            }
            return $this->redirect('frontend/news');
        }

        return $this->render('news', [
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

    public function actionProgram()
    {

        $this->layout = false;

        $setting = Setting::find()->one();
        $icon = \Yii::$app->request->baseUrl . "/uploads/setting/" . $setting->logo;
        $bg_login = \Yii::$app->request->baseUrl . "/uploads/setting/" . $setting->bg_login;
        $bg = \Yii::$app->request->baseUrl . "/uploads/setting/" . $setting->bg_pin;
        $pendanaans = Pendanaan::find()->where(['status_id'=>2])->all();
        $organisasis = Organisasi::find()->where(['flag'=>1])->all();
        $kategori_pendanaans = KategoriPendanaan::find()->all();
        $count_program = Pendanaan::find()->count();
        $count_wakif = User::find()->where(['role_id'=>5])->count();
        $model = new HubungiKami;


        if ($model->load($_POST)) {
            $model->status = 0;

            if ($model->save()) {
                Yii::$app->session->setFlash('success', "Data created successfully."); 
            } else {
                Yii::$app->session->setFlash('error', "Data not saved.");
            }
            return $this->redirect('frontend/program');
        }

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
            'model' => $model
        ]);
    }
    public function actionUnduhFileUraian($id)
   {
   $model = Pendanaan::findOne(['id'=>$id]);
   $file = $model->file_uraian;
   // $model->tanggal_received=date('Y-m-d H:i:s');
   $path = Yii::getAlias("@app/web/uploads/uraian/") . $file;
   $arr = explode(".", $file);
   $extension = end($arr);
   $nama_file= "File Uraian  ".$model->nama_pendanaan.".".$extension;
   
       if (file_exists($path)) {
           return Yii::$app->response->sendFile($path, $nama_file);
       } else {
           throw new \yii\web\NotFoundHttpException("{$path} is not found!");
       }
   }
}
