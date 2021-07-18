<?php

namespace app\models;

use Yii;
use \app\models\base\Bank as BaseBank;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "bank".
 */
class Bank extends BaseBank
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
