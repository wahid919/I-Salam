<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\HutangPiutang as HutangPiutangModel;

/**
* HutangPiutang represents the model behind the search form about `app\models\HutangPiutang`.
*/
class HutangPiutangSearch extends HutangPiutangModel
{
    public $date_start;
    public $date_end;
/**
* @inheritdoc
*/
public function rules()
{
return [
[['id', 'id_user'], 'integer'],
            [['perusahaan', 'kelompok', 'piutang', 'hutang', 'tanggal_tempo', 'created_at', 'updated_at','date_start','date_end'], 'safe'],
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
$query = HutangPiutangModel::find()->orderBy(['status' => SORT_ASC]);

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
            'tanggal_tempo' => $this->tanggal_tempo,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'perusahaan', $this->perusahaan])
            ->andFilterWhere(['like', 'kelompok', $this->kelompok])
            ->andFilterWhere(['like', 'piutang', $this->piutang])
            ->andFilterWhere(['like', 'hutang', $this->hutang]);

            if($this->date_start != null){
                $query->andWhere(['>=', 'created_at', $this->date_start]);
                if($this->date_end != null){
                    $query->andWhere(['<=', 'created_at', $this->date_end]);
                }
            }

return $dataProvider;
}
}