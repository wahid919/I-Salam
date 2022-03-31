<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AmanahPendanaan as AmanahPendanaanModel;

/**
* AmanahPendanaan represents the model behind the search form about `app\models\AmanahPendanaan`.
*/
class AmanahPendanaan extends AmanahPendanaanModel
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['id', 'pendanaan_id', 'flag'], 'integer'],
            [['amanah'], 'safe'],
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
$query = AmanahPendanaanModel::find();

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
            'pendanaan_id' => $this->pendanaan_id,
            'flag' => $this->flag,
        ]);

        $query->andFilterWhere(['like', 'amanah', $this->amanah]);

return $dataProvider;
}
}