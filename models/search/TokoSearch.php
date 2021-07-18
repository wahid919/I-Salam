<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Toko;

/**
* TokoSearch represents the model behind the search form about `app\models\Toko`.
*/
class TokoSearch extends Toko
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['id', 'id_perusahaan'], 'integer'],
            [['nama_toko'], 'safe'],
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
$query = Toko::find();

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
            'id_perusahaan' => $this->id_perusahaan,
        ]);

        $query->andFilterWhere(['like', 'nama_toko', $this->nama_toko]);

return $dataProvider;
}
}