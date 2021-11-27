<?php

namespace app\controllers\api;

/**
* This is the class for REST controller "DokumenKontrakController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class DokumenKontrakController extends \yii\rest\ActiveController
{
public $modelClass = 'app\models\DokumenKontrak';
}
