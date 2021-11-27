<?php

namespace app\controllers\api;

/**
* This is the class for REST controller "PenyaluranController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class PenyaluranController extends \yii\rest\ActiveController
{
public $modelClass = 'app\models\Penyaluran';
}
