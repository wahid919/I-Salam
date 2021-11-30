<?php

namespace app\controllers\api;

/**
* This is the class for REST controller "KontakController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class KontakController extends \yii\rest\ActiveController
{
public $modelClass = 'app\models\Kontak';
}
