<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PartnerPendanaan;

/**
* PartnerPendanaanSearch represents the model behind the search form about `app\models\PartnerPendanaan`.
*/
class PartnerPendanaanSearch extends PartnerPendanaan
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['id', 'bank_partner'], 'integer'],
            [['nama_partner', 'no_rekening_partner'], 'safe'],
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
$query = PartnerPendanaan::find();

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
            'bank_partner' => $this->bank_partner,
        ]);

        $query->andFilterWhere(['like', 'nama_partner', $this->nama_partner])
            ->andFilterWhere(['like', 'no_rekening_partner', $this->no_rekening_partner]);

return $dataProvider;
}
}