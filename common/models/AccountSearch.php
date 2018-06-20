<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Account;

/**
 * AccountSearch represents the model behind the search form about `common\models\Account`.
 */
class AccountSearch extends Account
{
    
    public $_startDate;
    public $_endDate;
    
    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['a_id', 'a_type_id', 'a_sexy_id', 'a_creationUser_id', 'a_updateUser_id', 'a_isDeleted'], 'integer'],
            [['a_title', 'a_cityTitle', 'a_sourceKeyword', 'a_phone', 'a_pass', 'a_authKey', 'a_email', 'a_lastLoginDate', 'a_creationDate', 'a_updateDate', '_startDate', '_endDate'], 'safe'],
            [['_startDate'], 'eeCheckStartDate'],
        ];
    }

        
    public function eeCheckStartDate($attribute_name, $params) {
        
        if (strtotime($this->_startDate) > strtotime($this->_endDate)) {
            $this->addErrors(['_startDate'=>'开始时间应早于结束时间']);
            return false;
        }
    
        return true;
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
        $query = Account::find();

        // add conditions that should always apply here
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['a_id'=>SORT_DESC]]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'a_id' => $this->a_id,
            'a_type_id' => $this->a_type_id,
            'a_sexy_id' => $this->a_sexy_id,
            'a_creationUser_id' => $this->a_creationUser_id,
            'a_updateUser_id' => $this->a_updateUser_id,
            'a_isDeleted' => $this->a_isDeleted,
        ]);
        
        if (!empty($this->_startDate)) {
            //apply to condition
            $query->andFilterWhere(['>=', 'a_creationDate', $this->_startDate]);
            
        }
        
        if (!empty($this->_endDate)) {
            //apply to condition
            $query->andFilterWhere(['<=', 'a_creationDate', $this->_endDate]);
            
        }

        $query->andFilterWhere(['like', 'a_title', $this->a_title])
            ->andFilterWhere(['like', 'a_phone', $this->a_phone])
            ->andFilterWhere(['like', 'a_pass', $this->a_pass])
            ->andFilterWhere(['like', 'a_authKey', $this->a_authKey])
            ->andFilterWhere(['like', 'a_cityTitle', $this->a_cityTitle])
            ->andFilterWhere(['like', 'a_sourceKeyword', $this->a_sourceKeyword])
            ->andFilterWhere(['like', 'a_creationDate', $this->a_creationDate])
//             ->andFilterWhere(['like', 'a_desc', $this->a_desc])
        ;

        return $dataProvider;
    }
}
