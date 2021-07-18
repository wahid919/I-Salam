<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PettyCashBukti;

/**
* PettyCashBuktiSearch represents the model behind the search form about `app\models\PettyCashBukti`.
*/
class PettyCashBuktiSearch extends PettyCashBukti
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['id', 'id_user'], 'integer'],
            [['tanggal', 'no_bukti', 'departement'], 'safe'],
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
$query = PettyCashBukti::find();

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
            'id_user' => $this->id_user,
            'tanggal' => $this->tanggal,
        ]);

        $query->andFilterWhere(['like', 'no_bukti', $this->no_bukti])
            ->andFilterWhere(['like', 'departement', $this->departement]);

return $dataProvider;
}
}