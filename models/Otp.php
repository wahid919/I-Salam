<?php

namespace app\models;

use Yii;
use \app\models\base\Otp as BaseOtp;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "otp".
 */
class Otp extends BaseOtp
{

    public function behaviors()
    {
        return ArrayHelper::merge(
            parent::behaviors(),
            [
                # custom behaviors
            ]
        );
    }

    public function rules()
    {
        return ArrayHelper::merge(
            parent::rules(),
            [
                # custom validation rules
            ]
        );
    }
}
