<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pembayaran;

/**
* PembayaranSearch represents the model behind the search form about `app\models\Pembayaran`.
*/
class PembayaranSearch extends Pembayaran
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['id', 'nominal', 'user_id', 'marketing_id', 'bank_id', 'pendanaan_id', 'status_id'], 'integer'],
            [['nama', 'bukti_transaksi'], 'safe'],
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
$query = Pembayaran::find();

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
            'nominal' => $this->nominal,
            'user_id' => $this->user_id,
            'marketing_id' => $this->marketing_id,
            'bank_id' => $this->bank_id,
            'pendanaan_id' => $this->pendanaan_id,
            'status_id' => $this->status_id,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'bukti_transaksi', $this->bukti_transaksi]);

return $dataProvider;
}
}