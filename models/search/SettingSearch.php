<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Setting;

/**
* SettingSearch represents the model behind the search form about `app\models\Setting`.
*/
class SettingSearch extends Setting
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['id', 'pin'], 'integer'],
            [['logo', 'bg_login', 'bg_pin', 'link_download_apk', 'nama_web', 'alamat', 'slogan_web'], 'safe'],
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
$query = Setting::find();

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
            'pin' => $this->pin,
        ]);

        $query->andFilterWhere(['like', 'logo', $this->logo])
            ->andFilterWhere(['like', 'bg_login', $this->bg_login])
            ->andFilterWhere(['like', 'bg_pin', $this->bg_pin])
            ->andFilterWhere(['like', 'link_download_apk', $this->link_download_apk])
            ->andFilterWhere(['like', 'nama_web', $this->nama_web])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'slogan_web', $this->slogan_web]);

return $dataProvider;
}
}