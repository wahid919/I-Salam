<?php

namespace app\models;

use Yii;
use \app\models\base\KategoriBerita as BaseKategoriBerita;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "kategori_berita".
 */
class KategoriBerita extends BaseKategoriBerita
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
