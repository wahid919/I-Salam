<?php

namespace app\models;

use Yii;
use \app\models\base\PartnerPendanaan as BasePartnerPendanaan;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "partner_pendanaan".
 */
class PartnerPendanaan extends BasePartnerPendanaan
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
