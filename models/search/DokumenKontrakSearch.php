<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DokumenKontrak;

/**
* DokumenKontrakSearch represents the model behind the search form about `app\models\DokumenKontrak`.
*/
class DokumenKontrakSearch extends DokumenKontrak
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['id', 'id_pendanaan', 'id_user'], 'integer'],
            [['nama_file'], 'safe'],
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
$query = DokumenKontrak::find();

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
            'id_pendanaan' => $this->id_pendanaan,
            'id_user' => $this->id_user,
        ]);

        $query->andFilterWhere(['like', 'nama_file', $this->nama_file]);

return $dataProvider;
}
}