<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pendanaan;

/**
* PendanaanSearch represents the model behind the search form about `app\models\Pendanaan`.
*/
class PendanaanSearch extends Pendanaan
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['id', 'nominal', 'user_id', 'kategori_pendanaan_id', 'status_id'], 'integer'],
            [['nama_pendanaan', 'foto', 'uraian', 'pendanaan_berakhir'], 'safe'],
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
$query = Pendanaan::find()->orderBy(['status_id'=>SORT_ASC]);

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
            'nominal' => $this->nominal,
            'pendanaan_berakhir' => $this->pendanaan_berakhir,
            'user_id' => $this->user_id,
            'kategori_pendanaan_id' => $this->kategori_pendanaan_id,
            'status_id' => $this->status_id,
        ]);

        $query->andFilterWhere(['like', 'nama_pendanaan', $this->nama_pendanaan])
            ->andFilterWhere(['like', 'foto', $this->foto])
            ->andFilterWhere(['like', 'uraian', $this->uraian]);

return $dataProvider;
}
}