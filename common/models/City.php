<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "city".
 *
 * @property integer $c_id
 * @property string $c_title
 * @property string $c_desc
 * @property string $c_creationDate
 * @property integer $c_creationUser_id
 * @property string $c_updateDate
 * @property integer $c_updateUser_id
 * @property integer $c_sortOrder
 */
class City extends \common\components\CommonBased
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'city';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['c_title'], 'required'],
            [['c_creationDate', 'c_updateDate'], 'safe'],
            [['c_creationUser_id', 'c_updateUser_id', 'c_sortOrder'], 'integer'],
            [['c_title'], 'string', 'max' => 45],
            [['c_desc'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'c_id' => 'ID',
            'c_title' => '名称',
            'c_desc' => 'Desc',
            'c_creationDate' => '创建日期',
            'c_creationUser_id' => 'Creation User ID',
            'c_updateDate' => '更新日期',
            'c_updateUser_id' => 'Update User ID',
            'c_sortOrder' => '排序',
        ];
    }
}
