<?php

namespace app\models;

use Yii;
use \app\models\base\TemaHubungiKami as BaseTemaHubungiKami;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "tema_hubungi_kami".
 */
class TemaHubungiKami extends BaseTemaHubungiKami
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
