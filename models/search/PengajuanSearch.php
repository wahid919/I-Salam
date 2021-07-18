<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pengajuan;

/**
* PengajuanSearch represents the model behind the search form about `app\models\Pengajuan`.
*/
class PengajuanSearch extends Pengajuan
{
    public $date_start;
    public $date_end;
/**
* @inheritdoc
*/
public function rules()
{
return [
[['id', 'id_user', 'status'], 'integer'],
            [['tujuan','date_start','date_end'], 'safe'],
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
    $user = \Yii::$app->user->identity;
    if($user->role_id == 1){
        $query = Pengajuan::find()->orderBy(['tanggal'=>SORT_DESC]);
    }else {
        $query = Pengajuan::find()->where(['id_user' => $user->id])->orderBy(['tanggal'=>SORT_DESC]);
    }
    if($user->role_id == 4){
        $query = Pengajuan::find()->where(['status' => '2'])->orWhere(['status' => 3,'status' => 4])->orderBy(['tanggal'=>SORT_DESC]);
    }
    if($user->role_id == 6){
        $query = Pengajuan::find()->where(['status' => '3'])->orWhere(['status'=>4])->orderBy(['tanggal'=>SORT_DESC]);
    }

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
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'tujuan', $this->tujuan]);
        if($this->date_start != null){
            $query->andWhere(['>=', 'tanggal', $this->date_start]);
            if($this->date_end != null){
                $query->andWhere(['<=', 'tanggal', $this->date_end]);
            }
        }

return $dataProvider;
}
}