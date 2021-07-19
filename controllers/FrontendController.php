<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\HttpException;
use yii\helpers\Url;
use yii\filters\AccessControl;
use dmstr\bootstrap\Tabs;
use app\models\Action;
use yii\helpers\ArrayHelper;
use app\models\Setting;
/**
* This is the class for controller "BeritaController".
*/
class FrontendController extends Controller
{
    public function actionIndex()
    {

        $this->layout=false;
        // $profile_desas = ProfilDesa::find()->one();
        // $slider = SliderGambar::findOne(['deleted_status'=>0]);
        // $galeris = Galeri::find()->where(['deleted_status'=>0])->limit(5)->all();
        // $beritas = Berita::find()->where(['deleted_status'=>0])->limit(3)->all();

        // $desa = \Yii::$app->request->baseUrl."/uploads/profil_desa/logo/".$profile_desas->logo;
        // $gambar = \Yii::$app->request->baseUrl."/uploads/slider-gambar/".$slider->gambar;
        $setting = Setting::find()->one();
        $icon = \Yii::$app->request->baseUrl."/uploads/setting/".$setting->logo;
        $bg = \Yii::$app->request->baseUrl."/uploads/setting/".$setting->bg_pin;
    return $this->render('index',[
        'setting' => $setting,
        'icon' => $icon,
        'bg' => $bg,
    ]);
    }
}
