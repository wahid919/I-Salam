<?php

namespace app\models;

use Yii;
use \app\models\base\Penyaluran as BasePenyaluran;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "penyaluran".
 */
class Penyaluran extends BasePenyaluran
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
