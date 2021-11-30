<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Kontak;

/**
* KontakSearch represents the model behind the search form about `app\models\Kontak`.
*/
class KontakSearch extends Kontak
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['id'], 'integer'],
            [['nama_kontak', 'nomor_telepon'], 'safe'],
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
$query = Kontak::find();

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
        ]);

        $query->andFilterWhere(['like', 'nama_kontak', $this->nama_kontak])
            ->andFilterWhere(['like', 'nomor_telepon', $this->nomor_telepon]);

return $dataProvider;
}
}