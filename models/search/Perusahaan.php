<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Perusahaan as PerusahaanModel;

/**
* Perusahaan represents the model behind the search form about `app\models\Perusahaan`.
*/
class Perusahaan extends PerusahaanModel
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['id_perusahaan'], 'integer'],
            [['nama_perusahaan'], 'safe'],
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
$query = PerusahaanModel::find();

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
            'id_perusahaan' => $this->id_perusahaan,
        ]);

        $query->andFilterWhere(['like', 'nama_perusahaan', $this->nama_perusahaan]);

return $dataProvider;
}
}