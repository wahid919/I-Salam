<?php

namespace app\models;

use Yii;
use \app\models\base\Berita as BaseBerita;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "berita".
 */
class Berita extends BaseBerita
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
