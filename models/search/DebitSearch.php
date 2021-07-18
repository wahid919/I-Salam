<?php

namespace app\models\search;

use app\models\Debit;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * DebitSearch represents the model behind the search form about `app\models\Debit`.
 */
class DebitSearch extends Debit
{
    public $date_start;
    public $date_end;
    public $month;
/**
 * @inheritdoc
 */
    public function rules()
    {
        return [
            [['id_debit', 'id_user'], 'integer'],
            [['nominal', 'tanggal', 'keterangan', 'date_start', 'date_end'], 'safe'],
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
        $month=date('m');
        $year=date('Y');
        $datenow=date('Y-m-d');
        $query = Debit::find()->where(['and', ['>=', 'tanggal', "$year-$month-01"], ['<=', 'tanggal', "$datenow"]]);


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
            'id_debit' => $this->id_debit,
            'id_user' => $this->id_user,
            'tanggal' => $this->tanggal,
        ]);

        $query->andFilterWhere(['like', 'nominal', $this->nominal])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan]);
        if ($this->date_start != null) {
            $query->andWhere(['>=', 'tanggal', $this->date_start]);
            if ($this->date_end != null) {
                $query->andWhere(['<=', 'tanggal', $this->date_end]);
            }
        }
        return $dataProvider;
    }
}
