<?php

namespace app\models;

use Yii;
use \app\models\base\Status as BaseStatus;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "status".
 */
class Status extends BaseStatus
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
