<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Notifikasi;

/**
* NotifikasiSearch represents the model behind the search form about `app\models\Notifikasi`.
*/
class NotifikasiSearch extends Notifikasi
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['id', 'flag', 'user_id'], 'integer'],
            [['message', 'date'], 'safe'],
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
$query = Notifikasi::find();

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
            'date' => $this->date,
            'flag' => $this->flag,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'message', $this->message]);

return $dataProvider;
}
}