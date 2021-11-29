<?php

namespace app\models;

use Yii;
use \app\models\base\Berita as BaseBerita;
use yii\helpers\ArrayHelper;
use yii\helpers\HtmlPurifier;
use yii\helpers\Url;

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

    public static function getBanner()
    {
        $berita = Berita::find()
            ->limit(4)
            ->orderBy(new \yii\db\Expression('rand()'))
            ->all();

        return $berita;
    }

    public function getShowTitle()
    {
        if (strlen($this->judul) <= 75) return $this->judul;
        return substr($this->judul, 0, 75) . "...";
    }

    public function getDescription()
    {
        if (strlen($this->isi) <= 200) $text = strip_tags($this->isi);
        else $text = strip_tags(substr($this->isi, 0, 200) . "...");
        return $text;
    }
    public function getDescriptions($berita)
    {
        if (strlen($this->isi) <= 200) $text = strip_tags($this->isi);
        else $text = strip_tags(substr($this->isi, 0, 200) . "...");
        return $text;
    }
}
