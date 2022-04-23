<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ContactTitleInfo;

/**
 * ContactTitleInfoSearch represents the model behind the search form of `common\models\ContactTitleInfo`.
 */
class ContactTitleInfoSearch extends ContactTitleInfo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'tel_number'], 'integer'],
            [['tel_icon', 'email_icon', 'gipes_icon', 'email', 'title', 'address'], 'safe'],
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
        $query = ContactTitleInfo::find()->joinWith('translations');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'attributes' => [
                    'tel_icon', 'email_icon', 'gipes_icon', 'email', 'title', 'address', 'tel_number'
                ]
            ]
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
            'tel_number' => $this->tel_number,
        ]);

        $query->andFilterWhere(['like', 'tel_icon', $this->tel_icon])
            ->andFilterWhere(['like', 'email_icon', $this->email_icon])
            ->andFilterWhere(['like', 'gipes_icon', $this->gipes_icon])
            ->andFilterWhere(['like', 'email', $this->email]);

        return $dataProvider;
    }
}
