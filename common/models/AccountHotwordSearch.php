<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\AccountHotword;

/**
 * AccountHotwordSearch represents the model behind the search form of `common\models\AccountHotword`.
 */
class AccountHotwordSearch extends AccountHotword
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ah_id', 'ah_account_id', 'ah_creationUser_id', 'ah_updateUser_id', 'ah_sortOrder'], 'integer'],
            [['ah_city', 'ah_industry', 'ah_hotword', 'ah_creationDate', 'ah_updateDate'], 'safe'],
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
        $query = AccountHotword::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,        ]);
        
        $dataProvider->setSort([
                'defaultOrder' => ['ah_id'=>SORT_DESC],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'ah_id' => $this->ah_id,
            'ah_account_id' => $this->ah_account_id,
            'ah_creationDate' => $this->ah_creationDate,
            'ah_creationUser_id' => $this->ah_creationUser_id,
            'ah_updateDate' => $this->ah_updateDate,
            'ah_updateUser_id' => $this->ah_updateUser_id,
            'ah_sortOrder' => $this->ah_sortOrder,
        ]);

        $query->andFilterWhere(['like', 'ah_city', $this->ah_city])
            ->andFilterWhere(['like', 'ah_industry', $this->ah_industry])
            ->andFilterWhere(['like', 'ah_hotword', $this->ah_hotword]);

        return $dataProvider;
    }
}
