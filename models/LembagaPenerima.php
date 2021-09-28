<?php

namespace app\models;

use Yii;
use \app\models\base\LembagaPenerima as BaseLembagaPenerima;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "lembaga_penerima".
 */
class LembagaPenerima extends BaseLembagaPenerima
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
