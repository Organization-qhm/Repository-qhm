<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "accountHotword".
 *
 * @property integer $ah_id
 * @property integer $ah_account_id
 * @property string $ah_city
 * @property string $ah_industry
 * @property string $ah_hotword
 * @property string $ah_creationDate
 * @property integer $ah_creationUser_id
 * @property string $ah_updateDate
 * @property integer $ah_updateUser_id
 * @property integer $ah_sortOrder
 *
 * @property Account $ahAccount
 */
class AccountHotword extends \common\components\CommonBased
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'accountHotword';
    }
    
    public function scenarios()
    {
        return [
                'default' => [],
                'web-record' => [],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ah_account_id'], 'required'],
            [['ah_account_id', 'ah_creationUser_id', 'ah_updateUser_id', 'ah_sortOrder'], 'integer'],
            [['ah_creationDate', 'ah_updateDate'], 'safe'],
            [['ah_city', 'ah_industry'], 'string', 'max' => 45],
            [['ah_hotword'], 'string', 'max' => 100],
            [['ah_account_id'], 'exist', 'skipOnError' => true, 'targetClass' => Account::className(), 'targetAttribute' => ['ah_account_id' => 'a_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ah_id' => 'ID',
            'ah_account_id' => 'Account ID',
            'ah_city' => '城市',
            'ah_industry' => '行业',
            'ah_hotword' => '好名',
            'ah_creationDate' => '起名时间',
            'ah_creationUser_id' => 'Creation User ID',
            'ah_updateDate' => '更新日期',
            'ah_updateUser_id' => 'Update User ID',
            'ah_sortOrder' => '排序',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAhAccount()
    {
        return $this->hasOne(Account::className(), ['a_id' => 'ah_account_id']);
    }
}
