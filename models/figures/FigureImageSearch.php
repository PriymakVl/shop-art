<?php

namespace app\models\figures;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\figures\FigureImage;

/**
 * FigureImageSearch represents the model behind the search form of `app\models\figures\FigureImage`.
 */
class FigureImageSearch extends FigureImage
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'figure_id', 'status'], 'integer'],
            [['url', 'alt', 'title'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = FigureImage::find()->where(['figure_id' => $params['figure_id'], 'status' => self::STATUS_ACTIVE]);

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
            'figure_id' => $this->figure_id,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'url', $this->url])
            ->andFilterWhere(['like', 'alt', $this->alt])
            ->andFilterWhere(['like', 'title', $this->title]);

        return $dataProvider;
    }
}
