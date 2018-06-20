<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Industry;

/**
 * IndustrySearch represents the model behind the search form of `common\models\Industry`.
 */
class IndustrySearch extends Industry
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['i_id', 'i_category_id', 'i_creationUser_id', 'i_updateUser_id', 'i_sortOrder'], 'integer'],
            [['i_title', 'i_desc', 'i_creationDate', 'i_updateDate'], 'safe'],
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
        $query = Industry::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,        ]);
        
        $dataProvider->setSort([
                'defaultOrder' => ['i_sortOrder'=>SORT_DESC],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'i_id' => $this->i_id,
            'i_category_id' => $this->i_category_id,
            'i_creationDate' => $this->i_creationDate,
            'i_creationUser_id' => $this->i_creationUser_id,
            'i_updateDate' => $this->i_updateDate,
            'i_updateUser_id' => $this->i_updateUser_id,
            'i_sortOrder' => $this->i_sortOrder,
        ]);

        $query->andFilterWhere(['like', 'i_title', $this->i_title])
            ->andFilterWhere(['like', 'i_desc', $this->i_desc]);

        return $dataProvider;
    }
}
