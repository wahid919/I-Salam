<?php

namespace app\models;

use Yii;
use \app\models\base\Organisasi as BaseOrganisasi;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "organisasi".
 */
class Organisasi extends BaseOrganisasi
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
