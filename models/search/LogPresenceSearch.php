<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\LogPresence;

/**
* LogPresenceSearch represents the model behind the search form about `app\models\LogPresence`.
*/
class LogPresenceSearch extends LogPresence
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['id', 'user_id', 'is_success', 'is_guest', 'is_late'], 'integer'],
            [['qr_code', 'name', 'photo', 'date', 'time', 'timestamp'], 'safe'],
            [['temperature'], 'number'],
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
$query = LogPresence::find();

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
            'user_id' => $this->user_id,
            'temperature' => $this->temperature,
            'is_success' => $this->is_success,
            'is_guest' => $this->is_guest,
            'is_late' => $this->is_late,
            'date' => $this->date,
            'time' => $this->time,
            'timestamp' => $this->timestamp,
        ]);

        $query->andFilterWhere(['like', 'qr_code', $this->qr_code])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'photo', $this->photo]);

return $dataProvider;
}
}