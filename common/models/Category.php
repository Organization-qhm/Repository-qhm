<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property integer $cat_id
 * @property string $cat_title
 * @property string $cat_desc
 * @property string $cat_creationDate
 * @property integer $cat_creationUser_id
 * @property string $cat_updateDate
 * @property integer $cat_updateUser_id
 * @property integer $cat_sortOrder
 *
 * @property Industry[] $industries
 */
class Category extends \common\components\CommonBased
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cat_title'], 'required'],
            [['cat_creationDate', 'cat_updateDate'], 'safe'],
            [['cat_creationUser_id', 'cat_updateUser_id', 'cat_sortOrder'], 'integer'],
            [['cat_title'], 'string', 'max' => 45],
            [['cat_desc'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cat_id' => 'ID',
            'cat_title' => '名称',
            'cat_desc' => 'Desc',
            'cat_creationDate' => '创建日期',
            'cat_creationUser_id' => 'Creation User ID',
            'cat_updateDate' => '更新日期',
            'cat_updateUser_id' => 'Update User ID',
            'cat_sortOrder' => '排序',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIndustries()
    {
        return $this->hasMany(Industry::className(), ['i_category_id' => 'cat_id']);
    }
}
