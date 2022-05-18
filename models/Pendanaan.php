<?php

namespace app\models;

use Yii;
use \app\models\base\Pendanaan as BasePendanaan;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "pendanaan".
 */
class Pendanaan extends BasePendanaan
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
    public function getShowDescription()
    {
        if (strlen($this->deskripsi) <= 150) $text = strip_tags($this->deskripsi);
        else $text = strip_tags(substr($this->deskripsi, 0, 150) . "...");
        return $text;
    }
}
