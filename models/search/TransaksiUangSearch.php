<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TransaksiUang as TransaksiUangModel;

/**
* TransaksiUang represents the model behind the search form about `app\models\TransaksiUang`.
*/
class TransaksiUangSearch extends TransaksiUangModel
{
    public $date_start;
    public $date_end;
/**
* @inheritdoc
*/
public function rules()
{
return [
[['id', 'id_user','id_perusahaan'], 'integer'],
            [[ 'debit', 'kredit', 'tanggal', 'keterangan','date_start','date_end'], 'safe'],
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
    $month = date('m');
    $year = date('Y');
    $datenow = date('Y-m-d');
  
    $query = TransaksiUang::find()
    ->where(['and', ['>=', 'tanggal', "$year-$month-01"], ['<=', 'tanggal', "$datenow"]])
    ->select(['id_jenis_transaksi','id_perusahaan','id_kelompok_rekening','tanggal', 'sum(kredit) as kredit', 'sum(debit) as debit'])
    ->groupBy(['id_jenis_transaksi','id_perusahaan','tanggal','id_kelompok_rekening']);
    
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
            // 'id' => $this->id,
            // 'id_user' => $this->id_user,
            // 'tanggal' => $this->tanggal,
        ]);

        $query
        ->andFilterWhere(['like', 'id_perusahaan', $this->id_perusahaan])
            ->andFilterWhere(['like', 'debit', $this->debit])
            ->andFilterWhere(['like', 'kredit', $this->kredit])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan]);

            if($this->date_start != null){
                $query->andWhere(['>=', 'tanggal', $this->date_start]);
                if($this->date_end != null){
                    $query->andWhere(['<=', 'tanggal', $this->date_end]);
                }
            }

return $dataProvider;
}
}