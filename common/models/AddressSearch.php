<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Address;

/**
 * AddressSearch represents the model behind the search form of `common\models\Address`.
 */
class AddressSearch extends Address
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'order_id', 'region_id', 'district_id', 'quarters_id', 'created_at', 'updated_at', 'deliver_type_id', 'deliver_type_amount', 'status'], 'integer'],
            [['bosting', 'phone'], 'safe'],
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
        $query = Address::find();

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
            'order_id' => $this->order_id,
            'region_id' => $this->region_id,
            'district_id' => $this->district_id,
            'quarters_id' => $this->quarters_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deliver_type_id' => $this->deliver_type_id,
            'deliver_type_amount' => $this->deliver_type_amount,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'bosting', $this->bosting])
            ->andFilterWhere(['like', 'phone', $this->phone]);

        return $dataProvider;
    }
}
