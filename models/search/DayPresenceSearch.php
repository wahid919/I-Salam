<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DayPresence;

/**
* DayPresenceSearch represents the model behind the search form about `app\models\DayPresence`.
*/
class DayPresenceSearch extends DayPresence
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['id', 'is_active'], 'integer'],
            [['day_name', 'day_alias'], 'safe'],
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
$query = DayPresence::find();

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
            'is_active' => $this->is_active,
        ]);

        $query->andFilterWhere(['like', 'day_name', $this->day_name])
            ->andFilterWhere(['like', 'day_alias', $this->day_alias]);

return $dataProvider;
}
}