<?php

namespace ut8ia\slidermodule\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use Slides;

/**
 * SlidesSearch represents the model behind the search form about `common\models\Slides`.
 */
class SlidesSearch extends Slides
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'slider_id', 'priority'], 'integer'],
            [['title', 'text', 'url', 'image'], 'safe'],
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
        $query = Slides::find();

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
            'slider_id' => $this->slider_id,
            'priority' => $this->priority,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'text', $this->text])
            ->andFilterWhere(['like', 'url', $this->url])
            ->andFilterWhere(['like', 'image', $this->image]);

        return $dataProvider;
    }
}
