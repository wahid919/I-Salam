<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DetailTransaksiDapur;

/**
* DetailTransaksiDapurSearch represents the model behind the search form about `app\models\DetailTransaksiDapur`.
*/
class DetailTransaksiDapurSearch extends DetailTransaksiDapur
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['id', 'transaksi_dapur_id', 'detail_jenis_kelompok_id', 'quantity', 'harga', 'total'], 'integer'],
            [['keterangan', 'deskripsi_barang'], 'safe'],
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
$query = DetailTransaksiDapur::find();

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
            'transaksi_dapur_id' => $this->transaksi_dapur_id,
            'detail_jenis_kelompok_id' => $this->detail_jenis_kelompok_id,
            'quantity' => $this->quantity,
            'harga' => $this->harga,
            'total' => $this->total,
        ]);

        $query->andFilterWhere(['like', 'keterangan', $this->keterangan])
            ->andFilterWhere(['like', 'deskripsi_barang', $this->deskripsi_barang]);

return $dataProvider;
}
}