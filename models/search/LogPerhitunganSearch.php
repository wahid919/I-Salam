<?php

namespace app\models\search;

use app\models\LogActivity;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * LogActivitySearch represents the model behind the search form about `app\models\LogActivity`.
 */
class LogPerhitunganSearch extends LogActivity
{
/**
 * @inheritdoc
 */
    public function rules()
    {
        return [
            [['id_log'], 'integer'],
            [['name', 'debit', 'kredit', 'tanggal', 'keterangan'], 'safe'],
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
        // (new \yii\db\Query)
        //     ->select(['tanggal', 'sum(kredit) as kredit', 'sum(debit) as debit'])
        //     ->from('log_activity')
        //     ->where(['and', ['>=', 'tanggal', "$year-$month-01"], ['<=', 'tanggal', "$datenow"]])
        //     ->groupBy(['tanggal']);
        $query = LogActivity::find()
        ->where(['and', ['>=', 'tanggal', "$year-$month-01"], ['<=', 'tanggal', "$datenow"]])
        ->select(['tanggal', 'sum(kredit) as kredit', 'sum(debit) as debit'])
        ->groupBy(['tanggal']);

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
            'id_log' => $this->id_log,
            'tanggal' => $this->tanggal,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'debit', $this->debit])
            ->andFilterWhere(['like', 'kredit', $this->kredit])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan]);

        return $dataProvider;
    }
}
