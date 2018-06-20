<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Hotword;

/**
 * HotwordSearch represents the model behind the search form of `common\models\Hotword`.
 */
class HotwordSearch extends Hotword
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['h_id', 'h_industry_id', 'h_creationUser_id', 'h_updateUser_id', 'h_sortOrder'], 'integer'],
            [['h_title', 'h_desc', 'h_creationDate', 'h_updateDate'], 'safe'],
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
        $query = Hotword::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,        
            'pagination' => [
                    'pageSize' => 60,
            ],
        ]);
        
        $dataProvider->setSort([
                'defaultOrder' => ['h_id'=>SORT_DESC],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'h_id' => $this->h_id,
            'h_industry_id' => $this->h_industry_id,
            'h_creationDate' => $this->h_creationDate,
            'h_creationUser_id' => $this->h_creationUser_id,
            'h_updateDate' => $this->h_updateDate,
            'h_updateUser_id' => $this->h_updateUser_id,
            'h_sortOrder' => $this->h_sortOrder,
        ]);

        $query->andFilterWhere(['like', 'h_title', $this->h_title])
            ->andFilterWhere(['like', 'h_desc', $this->h_desc]);

        return $dataProvider;
    }
}
