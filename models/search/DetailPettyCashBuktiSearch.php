<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DetailPettyCashBukti;

/**
* DetailPettyCashBuktiSearch represents the model behind the search form about `app\models\DetailPettyCashBukti`.
*/
class DetailPettyCashBuktiSearch extends DetailPettyCashBukti
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['id', 'id_petty_cash', 'jumlah', 'harga', 'total'], 'integer'],
            [['deskripsi'], 'safe'],
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
$query = DetailPettyCashBukti::find();

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
            'id_petty_cash' => $this->id_petty_cash,
            'jumlah' => $this->jumlah,
            'harga' => $this->harga,
            'total' => $this->total,
        ]);

        $query->andFilterWhere(['like', 'deskripsi', $this->deskripsi]);

return $dataProvider;
}
}