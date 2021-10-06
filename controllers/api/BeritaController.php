<?php

namespace app\controllers\api;

/**
* This is the class for REST controller "BeritaController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class BeritaController extends \yii\rest\ActiveController
{
public $modelClass = 'app\models\Berita';
}
