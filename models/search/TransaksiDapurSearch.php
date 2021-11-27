<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TransaksiDapur;

/**
* TransaksiDapurSearch represents the model behind the search form about `app\models\TransaksiDapur`.
*/
class TransaksiDapurSearch extends TransaksiDapur
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['id', 'tanggal', 'user_id'], 'integer'],
            [['tanggal'], 'safe'],
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
$query = TransaksiDapur::find();

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
            'tanggal' => $this->tanggal,
            'user_id' => $this->user_id,
        ]);

        // $query->andFilterWhere(['like', 'keterangan_transaksi', $this->keterangan_transaksi]);
            

return $dataProvider;
}
}