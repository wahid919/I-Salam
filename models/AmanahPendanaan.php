<?php

namespace app\models;

use Yii;
use \app\models\base\AmanahPendanaan as BaseAmanahPendanaan;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "amanah_pendanaan".
 */
class AmanahPendanaan extends BaseAmanahPendanaan
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
