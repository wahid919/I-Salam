<?php

namespace app\controllers\api;

/**
* This is the class for REST controller "HubungiKamiController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class HubungiKamiController extends \yii\rest\ActiveController
{
public $modelClass = 'app\models\HubungiKami';
}
