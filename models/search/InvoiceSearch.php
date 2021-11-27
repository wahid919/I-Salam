<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Invoice;

/**
* InvoiceSearch represents the model behind the search form about `app\models\Invoice`.
*/
class InvoiceSearch extends Invoice
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['id', 'id_pengajuan','quantity', 'price', 'total'], 'integer'],
            [['keterangan'], 'safe'],
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
$query = Invoice::find();

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
            'quantity' => $this->quantity,
            'price' => $this->price,
            'total' => $this->total,
        ]);

        $query->andFilterWhere(['like', 'keterangan', $this->keterangan]);

return $dataProvider;
}
}