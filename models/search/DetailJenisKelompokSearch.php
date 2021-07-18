<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DetailJenisKelompok;

/**
* DetailJenisKelompokSearch represents the model behind the search form about `app\models\DetailJenisKelompok`.
*/
class DetailJenisKelompokSearch extends DetailJenisKelompok
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['id', 'jenis_kelompok_rekening_id'], 'integer'],
            [['detail_jenis', 'kategori_transaksi'], 'safe'],
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
$query = DetailJenisKelompok::find();

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
            'jenis_kelompok_rekening_id' => $this->jenis_kelompok_rekening_id,
        ]);

        $query->andFilterWhere(['like', 'detail_jenis', $this->detail_jenis])
            ->andFilterWhere(['like', 'kategori_transaksi', $this->kategori_transaksi]);

return $dataProvider;
}
}