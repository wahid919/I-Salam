<?php

namespace app\models;

use Yii;
use \app\models\base\Pencairan as BasePencairan;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "pencairan".
 */
class Pencairan extends BasePencairan
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
