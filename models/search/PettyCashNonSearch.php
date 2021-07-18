<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PettyCashNon;

/**
* PettyCashNonSearch represents the model behind the search form about `app\models\PettyCashNon`.
*/
class PettyCashNonSearch extends PettyCashNon
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['id', 'id_user'], 'integer'],
            [['alasan_kegunaan', 'no_voucher', 'tanggal'], 'safe'],
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
$query = PettyCashNon::find();

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
            'tanggal' => $this->tanggal,
            'id_user' => $this->id_user,
        ]);

        $query->andFilterWhere(['like', 'alasan_kegunaan', $this->alasan_kegunaan])
            ->andFilterWhere(['like', 'no_voucher', $this->no_voucher]);

return $dataProvider;
}
}