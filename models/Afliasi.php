<?php

namespace app\models;

use Yii;
use \app\models\base\Afliasi as BaseAfliasi;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "afliasi".
 */
class Afliasi extends BaseAfliasi
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
