<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Order;

/**
* OrderSearch represents the model behind the search form about `app\models\Order`.
*/
class OrderSearch extends Order
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['id', 'ditagihkan_kepada', 'ditagihkan_oleh', 'issued_by'], 'integer'],
            [['order_no', 'cust_name', 'address', 'tanggal_order','tujuan'], 'safe'],
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
$query = Order::find();

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
            'ditagihkan_kepada' => $this->ditagihkan_kepada,
            'ditagihkan_oleh' => $this->ditagihkan_oleh,
            'tanggal_order' => $this->tanggal_order,
            'issued_by' => $this->issued_by,
        ]);

        $query->andFilterWhere(['like', 'order_no', $this->order_no])
            ->andFilterWhere(['like', 'cust_name', $this->cust_name])
            ->andFilterWhere(['like', 'address', $this->address]);

return $dataProvider;
}
}