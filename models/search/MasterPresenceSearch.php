<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MasterPresence;

/**
* MasterPresenceSearch represents the model behind the search form about `app\models\MasterPresence`.
*/
class MasterPresenceSearch extends MasterPresence
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['id', 'created_at', 'updated_at'], 'integer'],
            [['time_in_min', 'time_in_max', 'time_out_min', 'time_out_max'], 'safe'],
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
$query = MasterPresence::find();

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
            'time_in_min' => $this->time_in_min,
            'time_in_max' => $this->time_in_max,
            'time_out_min' => $this->time_out_min,
            'time_out_max' => $this->time_out_max,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

return $dataProvider;
}
}