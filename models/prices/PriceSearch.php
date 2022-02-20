<?php

namespace app\models\prices;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\prices\Price;

/**
 * PriceSearch represents the model behind the search form of `app\models\prices\Price`.
 */
class PriceSearch extends Price
{

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'currency', 'figure_id', 'state', 'status'], 'integer'],
            [['value', 'options'], 'safe'],
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
        $this->figure_id = $params['figure_id'];
        $query = Price::find()->where(['figure_id' => $this->figure_id, 'status' => self::STATUS_ACTIVE])->orderBy('value');

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
            'currency' => $this->currency,
            'figure_id' => $this->figure_id,
            'state' => $this->state,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'value', $this->value])
            ->andFilterWhere(['like', 'options', $this->options]);

        return $dataProvider;
    }
}
