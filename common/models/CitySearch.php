<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\City;

/**
 * CitySearch represents the model behind the search form of `common\models\City`.
 */
class CitySearch extends City
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['c_id', 'c_creationUser_id', 'c_updateUser_id', 'c_sortOrder'], 'integer'],
            [['c_title', 'c_desc', 'c_creationDate', 'c_updateDate'], 'safe'],
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
        $query = City::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,        ]);
        
        
        $dataProvider->setSort([
                'defaultOrder' => ['c_sortOrder'=>SORT_DESC],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'c_id' => $this->c_id,
            'c_creationDate' => $this->c_creationDate,
            'c_creationUser_id' => $this->c_creationUser_id,
            'c_updateDate' => $this->c_updateDate,
            'c_updateUser_id' => $this->c_updateUser_id,
            'c_sortOrder' => $this->c_sortOrder,
        ]);

        $query->andFilterWhere(['like', 'c_title', $this->c_title])
            ->andFilterWhere(['like', 'c_desc', $this->c_desc]);

        return $dataProvider;
    }
}
