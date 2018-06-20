<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "industry".
 *
 * @property integer $i_id
 * @property integer $i_category_id
 * @property string $i_title
 * @property string $i_desc
 * @property string $i_creationDate
 * @property integer $i_creationUser_id
 * @property string $i_updateDate
 * @property integer $i_updateUser_id
 * @property integer $i_sortOrder
 *
 * @property Hotword[] $hotwords
 * @property Category $iCategory
 */
class Industry extends \common\components\CommonBased
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'industry';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['i_category_id', 'i_title'], 'required'],
            [['i_category_id', 'i_creationUser_id', 'i_updateUser_id', 'i_sortOrder'], 'integer'],
            [['i_creationDate', 'i_updateDate'], 'safe'],
            [['i_title'], 'string', 'max' => 45],
            [['i_desc'], 'string', 'max' => 500],
            [['i_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['i_category_id' => 'cat_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'i_id' => 'ID',
            'i_category_id' => '分类',
            'i_title' => '名称',
            'i_desc' => 'Desc',
            'i_creationDate' => '创建日期',
            'i_creationUser_id' => 'Creation User ID',
            'i_updateDate' => '更新日期',
            'i_updateUser_id' => 'Update User ID',
            'i_sortOrder' => '排序',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHotwords()
    {
        return $this->hasMany(Hotword::className(), ['h_industry_id' => 'i_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getICategory()
    {
        return $this->hasOne(Category::className(), ['cat_id' => 'i_category_id']);
    }
    
    
    /**
     * load jfield list for dropdown
     * @return ActiveQuery
     */
    public static function loadDDList($showHide = false, $blackTitle = false){
    
        $pkName = self::getTableSchema()->primaryKey;
        if (is_array($pkName)) {
            $pkName = $pkName[0];
        }
        $titleName = str_replace ( 'id', 'title', $pkName );
        $shownName = str_replace ( 'id', 'shown', $pkName );
        $sortName = str_replace ( 'id', 'sortOrder', $pkName );
    
    
        $cols = self::getTableSchema()->columns;
    
        $models = self::find();
        if ($showHide === false && is_array($cols)) {
            // do not load hide if the AR have shown attributes
            if (isset($cols[$shownName])) {
                $models->where([$shownName => 1]);
            }
        }
    
        $models = $models->orderBy("i_category_id Desc, $sortName Desc")->all();
    
    
        $returnArr = [];
        if ($blackTitle !== false) {
            if ($blackTitle === true) {
                $blackTitle = '请选择';
            }// default title
            $returnArr[''] = $blackTitle;
        }
        
        $tmpRoundCategoryId = null;
        $tmpRoundCategoryTitle = null;
        $tmpRoundItems = [];
        foreach ($models as $value) {
            if ($value->i_category_id != $tmpRoundCategoryId) {
                //new round or start round
                if (!empty($tmpRoundItems) && !empty($tmpRoundCategoryTitle)) {
                    //add to list
                    $returnArr[$tmpRoundCategoryTitle] = $tmpRoundItems;
                }
                
                //clean
                $tmpRoundItems = [];
                
                //cache new round category info
                $tmpRoundCategoryId = $value->i_category_id;
                $tmpRoundCategoryTitle = $value->iCategory->cat_title;
            }
            
            $tmpRoundItems[$value->i_id] = $value->i_title;
//             var_dump($tmpRoundItems);
        }
        //for the end round
        $returnArr[$tmpRoundCategoryTitle] = $tmpRoundItems;
        
//         $returnArr += ArrayHelper::map($models, $pkName, $titleName);
    
    
        return $returnArr;
    }
}
