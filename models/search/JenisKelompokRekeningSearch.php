<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\JenisKelompokRekening;

/**
* JenisKelompokRekeningSearch represents the model behind the search form about `app\models\JenisKelompokRekening`.
*/
class JenisKelompokRekeningSearch extends JenisKelompokRekening
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['id', 'kelompok_rekening_id'], 'integer'],
            [['nama_jenis'], 'safe'],
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
$query = JenisKelompokRekening::find();

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
            'kelompok_rekening_id' => $this->kelompok_rekening_id,
        ]);

        $query->andFilterWhere(['like', 'nama_jenis', $this->nama_jenis]);

return $dataProvider;
}
}