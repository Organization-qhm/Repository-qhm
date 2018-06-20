<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Category;

/**
 * CategorySearch represents the model behind the search form of `common\models\Category`.
 */
class CategorySearch extends Category
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cat_id', 'cat_creationUser_id', 'cat_updateUser_id', 'cat_sortOrder'], 'integer'],
            [['cat_title', 'cat_desc', 'cat_creationDate', 'cat_updateDate'], 'safe'],
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
        $query = Category::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,        ]);
        
        $dataProvider->setSort([
                'defaultOrder' => ['cat_sortOrder'=>SORT_DESC],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'cat_id' => $this->cat_id,
            'cat_creationDate' => $this->cat_creationDate,
            'cat_creationUser_id' => $this->cat_creationUser_id,
            'cat_updateDate' => $this->cat_updateDate,
            'cat_updateUser_id' => $this->cat_updateUser_id,
            'cat_sortOrder' => $this->cat_sortOrder,
        ]);

        $query->andFilterWhere(['like', 'cat_title', $this->cat_title])
            ->andFilterWhere(['like', 'cat_desc', $this->cat_desc]);

        return $dataProvider;
    }
}
