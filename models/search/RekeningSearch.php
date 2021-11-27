<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Rekening;

/**
* RekeningSearch represents the model behind the search form about `app\models\Rekening`.
*/
class RekeningSearch extends Rekening
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['id', 'flag'], 'integer'],
            [['jenis_bank', 'nomor_rekening', 'nama_rekening', 'jenis_rekening'], 'safe'],
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
$query = Rekening::find();

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
            'flag' => $this->flag,
        ]);

        $query->andFilterWhere(['like', 'jenis_bank', $this->jenis_bank])
            ->andFilterWhere(['like', 'nomor_rekening', $this->nomor_rekening])
            ->andFilterWhere(['like', 'nama_rekening', $this->nama_rekening])
            ->andFilterWhere(['like', 'jenis_rekening', $this->jenis_rekening]);

return $dataProvider;
}
}