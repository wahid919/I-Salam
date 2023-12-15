<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pendapatan as PendapatanModel;

/**
* Pendapatan represents the model behind the search form about `app\models\Pendapatan`.
*/
class Pendapatan extends PendapatanModel
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['id', 'id_pendanaan'], 'integer'],
            [['nominal', 'created_at'], 'safe'],
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
$query = PendapatanModel::find();

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
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'nominal', $this->nominal]);

return $dataProvider;
}
}