<?php

namespace app\models;

use Yii;
use \app\models\base\DokumenKontrak as BaseDokumenKontrak;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "dokumen_kontrak".
 */
class DokumenKontrak extends BaseDokumenKontrak
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
