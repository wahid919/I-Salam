<?php

namespace app\controllers\api;

/**
* This is the class for REST controller "SettingController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class SettingController extends \yii\rest\ActiveController
{
public $modelClass = 'app\models\Setting';
}
