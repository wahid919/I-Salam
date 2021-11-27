<?php

namespace app\controllers\api;

/**
* This is the class for REST controller "StatusController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class StatusController extends \yii\rest\ActiveController
{
public $modelClass = 'app\models\Status';
}
