<?php

namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use common\components\CommonConst;
use yii\web\IdentityInterface;
use common\components\MediaBased;

/**
 * This is the model class for table "account".
 *
 * @property integer $a_id
 * @property string $a_title
 * @property integer $a_type_id
 * @property integer $a_sexy_id
 * @property string $a_phone
 * @property string $a_pass
 * @property string $a_authKey
 * @property string $a_qq
 * @property string $a_wechat
 * @property string $a_email
 * @property integer $a_province_id
 * @property integer $a_city_id
 * @property integer $a_cityTitle
 * @property integer $a_district_id
 * @property string $a_add
 * @property integer $a_sourceKeyword
 * @property string $a_lastLoginDate
 * @property string $a_creationDate
 * @property integer $a_creationUser_id
 * @property string $a_updateDate
 * @property integer $a_updateUser_id
 * @property integer $a_isDeleted
 *
 * @property School $aSchool
 * @property AccountInfo $aAccountInfo
 * @property AccountContact $aFirstContact
 * @property AccountHotword $aFirstHotword
 * @property Location $aProvince
 * @property Location $aCity
 * @property Location $aDistrict
 * @property AccountStudent[] $accountStudents
 */
class Account extends MediaBased implements IdentityInterface
{
    
    public $filePath;
    
    public $password_change_old;
    public $password_change_new;
    public $password_change_new_repeat;
    
    public $agreeTeam = true;
    
    
    public $_firstCity;
    public $_firstIndusty;
    public $_searchCount;
    
    public function init() {
        parent::init();
        $this->uploadFileAttrs['a_filePath'] = 'filePath';
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'account';
    }
    
    public function scenarios()
    {
        return [
                'default' => [],
                'web-ajax-signup' => [
                    'a_phone',
                    'a_title',
                ],
                'web-signup' => [
                    'a_phone',
                    'a_title',
                ],
                'web-mark-login' => [],
                'web-uc-update-user-info' => [
                    'a_qq',
                    'a_wechat',
                    'a_email',
                    'a_province_id',
                    'a_city_id',
                    'a_district_id',
                    'a_add',
                ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['a_phone', 'a_pass', 'a_title'], 'required'],
            [['a_email' ,'a_province_id','a_city_id','a_district_id', 'a_add'], 'required', 'on'=>'web-uc-update-user-info'],
            [['a_qq', 'a_wechat'], 'eeExistCheck', 'skipOnEmpty'=>false],
            [['a_phone'], 'unique', 'message'=>9680202],
            [['a_phone'], 'number', 'max'=>20000000000, 'min'=>10000000000, 'tooSmall'=>9680201, 'tooBig'=>9680201],
                
                
            [[ 'a_type_id', 'a_sexy_id', 'a_edu_id', 'a_updateUser_id', 'a_isDeleted','a_province_id','a_city_id','a_district_id'], 'integer'],
            [['a_lastLoginDate', 'a_creationDate', 'a_updateDate'], 'safe'],
                
            [['a_title', 'a_authKey', 'a_eduPro', 'a_qualifications'], 'string', 'max' => 45],
            [['a_phone', 'a_qq'], 'string', 'max' => 20],
            [['a_pass'], 'string', 'max' => 80],
            [['a_email', 'a_add'], 'string', 'max' => 255],
            [['a_desc'], 'string', 'max' => 500],
        ];
    }
    
    public function eeExistCheck($attribute_name, $params) {
        if (empty($this->a_qq) && empty($this->a_wechat)) {
            $this->addErrors(['a_qq'=>'', 'a_wechat'=>'']);
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
            'a_id' => 'ID',
            'a_title' => '姓名',
            'a_filePath' => '头像',
            'filePath' => '头像',
            'a_type_id' => '类型',
            'a_sexy_id' => '性别',
            'a_cityTitle' => '注册城市',
            '_searchCount' => '好名次数',
            '_firstCity' => '首次搜索城市',
            '_firstIndusty' => '首次搜索行业',
            'a_sourceKeyword' => 'Keyword',
            'a_phone' => '电话',
            'a_pass' => 'Pass',
            'a_qq' => 'QQ',
            'a_email' => 'Email',
            'a_add' => '详细地址',
            'a_wechat' => 'WeChat',
            'password_change_new' => '新密码',
            'password_change_new_repeat' => '新密码重复',
            'a_authKey' => 'Auth Key',
            'a_email' => 'Email',
            'a_qualifications' => 'Qualifications',
            'a_desc' => 'Desc',
            'a_lastLoginDate' => '最后登录时间',
            'a_creationDate' => '创建时间',
            'a_creationUser_id' => 'Creation User ID',
            'a_updateDate' => '更新时间',
            'a_updateUser_id' => 'Update User ID',
            'a_isDeleted' => '已删除',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAFirstHotword()
    {
        return $this->hasOne(AccountHotword::className(), ['ah_account_id' => 'a_id'])->limit(1);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountHotwords()
    {
        return $this->hasMany(AccountHotword::className(), ['ah_account_id' => 'a_id']);
    }
    
    // behavior
    /**
     * do something before save
     *
     */
    public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {
    
    
            if (in_array($this->scenario, ['web-signup'])) {
                //encrypt new pass before save
                $this->a_pass = $this->encodePassword($this->a_pass);
            }
    
    
    
//             if (in_array($this->scenario, ['b-update', 'web-self-change-pass'])) {
//                 if (!empty($this->password_change_new)) {
//                     //encrypt new pass before save
//                     $this->a_pass = $this->encodePassword($this->password_change_new);
//                 }//pass changed
//             }
    
    
    
    
    
            if ($this->isNewRecord) {
                //default values
                if (empty($this->a_type_id)) {
                    $this->a_type_id = CommonConst::F_USERTYPE_NORMAL;
                }
                if (empty($this->a_isDeleted)) {
                    $this->a_isDeleted = CommonConst::COMSTATUS_NO;
                }
            }
    
    
            return true;
        }else{
            return false;
        };
    }
    
    public function afterSave($insert, $changedAttributes){
        parent::afterSave($insert, $changedAttributes);
    
        
        //auto create accountInfo after create success
//         if ($this->scenario == 'signup') {
//             // sms used after success signup
//             $this->sms->s_used = 1;
//             $this->sms->save();
    
//         }
    }
    
    // actions
    public function resetPass(){
        $thisAccount = Account::findByPhone($this->a_phone);
        $thisAccount->a_pass = $this->a_pass;
        $thisAccount->scenario = 'reset-pass';
        return $thisAccount->save();
    }
    
    
    
    
    // actions for interface
    
    /**
     * login cur user instant
     */
    public function loginUser($duration = 0){
        
        $loginResult = \Yii::$app->user->login($this, $duration);
        
        if ($loginResult) {
            //after successful login, set login info
            $this->markLoginInfo();
        }
        
        return $loginResult;
    }
    
    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }
    
    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['a_id' => $id]);
    }
    
    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }
    
    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        //         return $this->auth_key;
        return $this->a_authKey;
    }
    
    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->a_authKey = Yii::$app->security->generateRandomString();
    }
    
    /**
     * Generates "remember me" authentication key
     */
    public function updateAuthKey()
    {
        $this->a_authKey = $this->generateAuthKey();
        $this->scenario = 'web-authKey-update';
        $this->save();
    }
    
    
    /**
     * mark login info to db
     */
    public function markLoginInfo()
    {
        $this->a_lastLoginDate = date('Y-m-d H:i:s');
        $this->scenario = 'web-mark-login';
        $this->save();
    }
    
    
    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }
    
    /**
     * @inheritdoc
     * validate user input password for login or change pass
     */
    public function validatePass($inputPass)
    {
        //         echo '11';
        //         var_dump($inputPass);
        //         var_dump(\Yii::$app->security->validatePassword($inputPass, $this->a_pass));
        //         exit;
        return \Yii::$app->security->validatePassword($inputPass, $this->a_pass);
    }
    
    /**
     * @inheritdoc
     * validate user input password for login or change pass
     */
    public function encodePassword($inputPass)
    {
        return Yii::$app->security->generatePasswordHash($inputPass);
    }
    
    /**
     * @inheritdoc
     */
    public static function findByPhone($phone)
    {
        return static::find()->where(['a_phone'=>$phone])->one();
    }
    
    
    
    public static function updateUserVerifyStatus($a_id, $vAttrName, $stauts_id = null) {
        if ($stauts_id == null) {
            $stauts_id = CommonConst::VERIFYSTATUS_COMMIT;
        }
        
        Account::updateAll([$vAttrName=>$stauts_id], "$vAttrName < :commitStatus_id and a_id = :a_id", [':commitStatus_id' => CommonConst::VERIFYSTATUS_COMMIT, ':a_id'=>$a_id]);
    }
    
    
    
    
    
    
}
    