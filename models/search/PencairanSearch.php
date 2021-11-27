<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pencairan;

/**
* PencairanSearch represents the model behind the search form about `app\models\Pencairan`.
*/
class PencairanSearch extends Pencairan
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['id', 'pendanaan_id', 'nominal', 'tanggal'], 'integer'],
            [['created_at'], 'safe'],
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
$query = Pencairan::find();

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
            'nominal' => $this->nominal,
            'tanggal' => $this->tanggal,
            'created_at' => $this->created_at,
        ]);

return $dataProvider;
}
}