<?php

namespace app\controllers\api;

/**
* This is the class for REST controller "BankController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class BankController extends \yii\rest\ActiveController
{
public $modelClass = 'app\models\Bank';
}
