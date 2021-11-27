<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Penyaluran;

/**
* PenyaluranSearch represents the model behind the search form about `app\models\Penyaluran`.
*/
class PenyaluranSearch extends Penyaluran
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['id', 'id_pendanaan', 'nominal'], 'integer'],
            [['tanggal_penyaluran'], 'safe'],
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
$query = Penyaluran::find();

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
            'id_pendanaan' => $this->id_pendanaan,
            'nominal' => $this->nominal,
            'tanggal_penyaluran' => $this->tanggal_penyaluran,
        ]);

return $dataProvider;
}
}