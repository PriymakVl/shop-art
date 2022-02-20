<?php

namespace app\models\dimensions;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\dimensions\Dimensions;

/**
 * DimensionsSearch represents the model behind the search form of `app\models\dimensions\Dimensions`.
 */
class DimensionsSearch extends Dimensions
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'unit', 'status'], 'integer'],
            [['values'], 'safe'],
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
        $query = Dimensions::find();

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
            'unit' => $this->unit,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'values', $this->values]);

        return $dataProvider;
    }
}
