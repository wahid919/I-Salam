<?php

namespace app\controllers\api;

/**
* This is the class for REST controller "PencairanController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class PencairanController extends \yii\rest\ActiveController
{
public $modelClass = 'app\models\Pencairan';
}
