<?php

namespace app\models\search;

use app\models\Presence;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * PresenceSearch represents the model behind the search form about `app\models\Presence`.
 */
class PresenceSearch extends Presence
{
    public $start_date;
    public $end_date;
/**
 * @inheritdoc
 */
    public function rules()
    {
        return [
            [['id', 'user_id', 'is_guest', 'is_late', 'time_late'], 'integer'],
            [['qr_code', 'name', 'photo_in', 'photo_out', 'date', 'time_in', 'time_out', 'start_date','end_date'], 'safe'],
            [['temperature_in', 'temperature_out'], 'number'],
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
        $user = Yii::$app->user->identity;
        if ($user->role_id == 1) // super admin
        {
            $query = Presence::find()
                ->orderBy(['date' => SORT_DESC, 'name' => SORT_ASC]);
        } else {
            $query = Presence::find()
                ->andWhere(['user_id' => $user->id])
                ->orderBy(['date' => SORT_DESC, 'name' => SORT_ASC]);
        }

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);
        
        if ($user->role_id == 1) // super admin
        {
            if($this->start_date == "" && $this->end_date == ""){
                $query->andWhere(['date' => date('Y-m-d')]);
            }else if($this->start_date == "" || $this->end_date == ""){
                $date = "";
                if($this->start_date != "") $date = $this->start_date;
                else  $date = $this->end_date;
    
                $query->andWhere(['date' => $date]);
            }else{
                $query->andWhere(['between','date', $this->start_date, $this->end_date]);
            }
        } else {
            if($this->start_date == "" && $this->end_date == ""){
            }else if($this->start_date == "" || $this->end_date == ""){
                $date = "";
                if($this->start_date != "") $date = $this->start_date;
                else  $date = $this->end_date;
    
                $query->andWhere(['date' => $date]);
            }else{
                $query->andWhere(['between','date', $this->start_date, $this->end_date]);
            }
        }

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'temperature_in' => $this->temperature_in,
            'temperature_out' => $this->temperature_out,
            'is_guest' => $this->is_guest,
            'is_late' => $this->is_late,
            // 'date' => ($this->date != "") ? date("Y-m-d", strtotime($this->date)) : date("Y-m-d"),
            'time_late' => $this->time_late,
        ]);

        $query->andFilterWhere(['like', 'qr_code', $this->qr_code])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'photo_in', $this->photo_in])
            ->andFilterWhere(['like', 'photo_out', $this->photo_out])
            ->andFilterWhere(['like', 'time_in', $this->time_in])
            ->andFilterWhere(['like', 'time_out', $this->time_out]);
        return $dataProvider;
    }
}
