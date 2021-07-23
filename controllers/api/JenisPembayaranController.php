<?php

namespace app\controllers\api;

/**
* This is the class for REST controller "JenisPembayaranController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class JenisPembayaranController extends \yii\rest\ActiveController
{
public $modelClass = 'app\models\JenisPembayaran';
}
