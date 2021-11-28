<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\KegiatanPendanaan;

/**
* KegiatanPendanaanSearch represents the model behind the search form about `app\models\KegiatanPendanaan`.
*/
class KegiatanPendanaanSearch extends KegiatanPendanaan
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['id', 'pendanaan_id'], 'integer'],
            [['kegiatan', 'foto'], 'safe'],
];
}

/**
* @inheritdoc
*/
public function scenarios()
{
// bypass scenarios() implementation in the parent class
return Model::scenarios();
}

/**
* Creates data provider instance with search query applied
*
* @param array $params
*
* @return ActiveDataProvider
*/
public function search($params)
{
$query = KegiatanPendanaan::find();

$dataProvider = new ActiveDataProvider([
'query' => $query,
]);

$this->load($params);

if (!$this->validate()) {
// uncomment the following line if you do not want to any records when validation fails
// $query->where('0=1');
return $dataProvider;
}

$query->andFilterWhere([
            'id' => $this->id,
            'pendanaan_id' => $this->pendanaan_id,
        ]);

        $query->andFilterWhere(['like', 'kegiatan', $this->kegiatan])
            ->andFilterWhere(['like', 'foto', $this->foto]);

return $dataProvider;
}
}