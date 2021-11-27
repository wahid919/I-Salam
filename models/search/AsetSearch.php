<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Aset;

/**
* AsetSearch represents the model behind the search form about `app\models\Aset`.
*/
class AsetSearch extends Aset
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['id', 'nilai_peralatan', 'umur', 'beban_penyusutan_tahun', 'beban_penyusutan_bulan'], 'integer'],
            [['jenis_peralatan', 'no_bukti', 'tanggal_perolehan', 'metode_penyusutan'], 'safe'],
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
$query = Aset::find();

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
            'tanggal_perolehan' => $this->tanggal_perolehan,
            'nilai_peralatan' => $this->nilai_peralatan,
            'umur' => $this->umur,
            'beban_penyusutan_tahun' => $this->beban_penyusutan_tahun,
            'beban_penyusutan_bulan' => $this->beban_penyusutan_bulan,
        ]);

        $query->andFilterWhere(['like', 'jenis_peralatan', $this->jenis_peralatan])
            ->andFilterWhere(['like', 'no_bukti', $this->no_bukti])
            ->andFilterWhere(['like', 'metode_penyusutan', $this->metode_penyusutan]);

return $dataProvider;
}
}