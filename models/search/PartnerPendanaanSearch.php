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
            [['id', 'pendanaan_id'], 'integer'],
            [['nama_partner', 'foto_ktp_partner', 'no_hp'], 'safe'],
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
            'pendanaan_id' => $this->pendanaan_id,
        ]);

        $query->andFilterWhere(['like', 'nama_partner', $this->nama_partner])
            ->andFilterWhere(['like', 'foto_ktp_partner', $this->foto_ktp_partner])
            ->andFilterWhere(['like', 'no_hp', $this->no_hp]);

        return $dataProvider;
    }
}
