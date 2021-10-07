<?php

namespace app\controllers\api;

/**
* This is the class for REST controller "TestimonialsController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class TestimonialsController extends \yii\rest\ActiveController
{
public $modelClass = 'app\models\Testimonials';
}
