<?php

namespace common\models;

use Yii;
use common\components\CommonConst;

/**
 * This is the model class for table "hotword".
 *
 * @property integer $h_id
 * @property integer $h_industry_id
 * @property string $h_title
 * @property string $h_desc
 * @property string $h_creationDate
 * @property integer $h_creationUser_id
 * @property string $h_updateDate
 * @property integer $h_updateUser_id
 * @property integer $h_sortOrder
 *
 * @property Industry $hIndustry
 */
class Hotword extends \common\components\CommonBased
{
    
    public $_successSavedCnt = 0;
    public $_failSavedCnt = 0;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hotword';
    }
    
    public function scenarios()
    {
        return [
                'default' => [],
                'b-create' => ['h_industry_id', 'h_title'],
                'b-update' => ['h_industry_id', 'h_title'],
                'b-import' => ['h_industry_id', 'h_title'],
                'b-createBatch' => ['h_industry_id', 'h_title'],
                'b-split-save' => ['h_industry_id', 'h_title'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['h_industry_id', 'h_title'], 'required'],
            [['h_title'], 'checkUnique'],
            [['h_industry_id', 'h_creationUser_id', 'h_updateUser_id', 'h_sortOrder'], 'integer'],
            [['h_creationDate', 'h_updateDate'], 'safe'],
            [['h_title'], 'string', 'max' => 45],
            [['h_desc'], 'string', 'max' => 500],
            [['h_industry_id'], 'exist', 'skipOnError' => true, 'targetClass' => Industry::className(), 'targetAttribute' => ['h_industry_id' => 'i_id']],
        ];
    }
    
    public function checkUnique(){
        $tmpCnt = Hotword::find()->where(['h_title'=>$this->h_title, 'h_industry_id'=>$this->h_industry_id])->count();

        if ($tmpCnt >= 1){
            $this->addError('h_title', '已存在');
            return false;
        }
        
        return true;
    }
    

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'h_id' => 'ID',
            'h_industry_id' => '行业',
            'h_title' => '内容',
            'h_desc' => 'Desc',
            'h_creationDate' => '创建日期',
            'h_creationUser_id' => 'Creation User ID',
            'h_updateDate' => '更新日期',
            'h_updateUser_id' => 'Update User ID',
            'h_sortOrder' => '排序',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHIndustry()
    {
        return $this->hasOne(Industry::className(), ['i_id' => 'h_industry_id']);
    }
    
    /**
     * do something before save
     * 
     */
    public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {
            
            if ($this->isNewRecord) {
                if (empty($this->h_sortOrder)) {
                    $this->h_sortOrder = CommonConst::SORT_NORMAL;
                }
            }
            
            
            return true;
        }else{
            return false;
        };
    }
    
    public function afterSave($insert, $changedAttributes){
        parent::afterSave($insert, $changedAttributes);
        
        $this->_successSavedCnt++;
        
        
    }
    
    /**
     * check multi title based on h_title, if user input xxxx, yyyy, cccc we have to save 3 items instand of 1
     */
    public function saveMultiTitle() {
        //try split
        $tmpArr = explode(',', $this->h_title);
        
        foreach ($tmpArr as $key=>$value) {
            
            $tmpModel = new Hotword();
            $tmpModel->scenario = 'b-split-save';
            $tmpModel->h_title = $value;
            $tmpModel->h_industry_id = $this->h_industry_id;
//             var_dump($tmpModel->save());
//             exit;
            if ($tmpModel->save()) {
                $this->_successSavedCnt++;
            }else{
                $this->_failSavedCnt++;
            }
        }
        
    }
    
}
