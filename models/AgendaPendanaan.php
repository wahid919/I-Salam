<?php

namespace app\models;

use Yii;
use \app\models\base\AgendaPendanaan as BaseAgendaPendanaan;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "agenda_pendanaan".
 */
class AgendaPendanaan extends BaseAgendaPendanaan
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
