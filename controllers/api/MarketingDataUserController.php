<?php

namespace app\controllers\api;

/**
* This is the class for REST controller "MarketingDataUserController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class MarketingDataUserController extends \yii\rest\ActiveController
{
public $modelClass = 'app\models\MarketingDataUser';
}
