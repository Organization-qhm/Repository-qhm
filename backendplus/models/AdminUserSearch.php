<?php

namespace backendplus\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backendplus\models\AdminUser;

/**
 * AdminUserSearch represents the model behind the search form about `backendplus\models\AdminUser`.
 */
class AdminUserSearch extends AdminUser
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['u_id', 'u_emailValidated', 'u_sendEmail', 'u_userSource_id', 'u_authRole_id', 'u_avatar', 'u_appLocale_id', 'u_creationUser_id', 'u_updateUser_id', 'u_actived', 'u_deleted'], 'integer'],
            [['u_username', 'u_password', 'u_email', 'u_phone', 'u_firstName', 'u_lastName', 'u_displayName', 'u_weChat', 'u_qq', 'u_creationDate', 'u_updateDate', 'u_lastPassChangeDate'], 'safe'],
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
        $query = AdminUser::find();

        // add conditions that should always apply here
        $query->orderBy('u_id Desc');

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
            'u_id' => $this->u_id,
            'u_emailValidated' => $this->u_emailValidated,
            'u_sendEmail' => $this->u_sendEmail,
            'u_userSource_id' => $this->u_userSource_id,
            'u_authRole_id' => $this->u_authRole_id,
            'u_avatar' => $this->u_avatar,
            'u_appLocale_id' => $this->u_appLocale_id,
            'u_creationDate' => $this->u_creationDate,
            'u_creationUser_id' => $this->u_creationUser_id,
            'u_updateDate' => $this->u_updateDate,
            'u_updateUser_id' => $this->u_updateUser_id,
            'u_lastPassChangeDate' => $this->u_lastPassChangeDate,
//             'u_leftGrabCount' => $this->u_leftGrabCount,
//             'u_usedGrabCount' => $this->u_usedGrabCount,
            'u_actived' => $this->u_actived,
            'u_deleted' => $this->u_deleted,
        ]);

        $query->andFilterWhere(['like', 'u_username', $this->u_username])
            ->andFilterWhere(['like', 'u_displayName', $this->u_displayName])
//             ->andFilterWhere(['like', 'u_password', $this->u_password])
            ->andFilterWhere(['like', 'u_email', $this->u_email])
            ->andFilterWhere(['like', 'u_phone', $this->u_phone])
            ->andFilterWhere(['like', 'u_firstName', $this->u_firstName])
            ->andFilterWhere(['like', 'u_lastName', $this->u_lastName])
            ->andFilterWhere(['like', 'u_weChat', $this->u_weChat])
            ->andFilterWhere(['like', 'u_qq', $this->u_qq]);

        return $dataProvider;
    }
}
