<?php

namespace ut8ia\slidermodule\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use  ut8ia\slidermodule\models\Sliders;

/**
 * SlidersSearch represents the model behind the search form about `common\models\Sliders`.
 */
class SlidersSearch extends Sliders
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id','slide_duration'], 'integer'],
            [['name'], 'safe'],
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
        $query = Sliders::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
