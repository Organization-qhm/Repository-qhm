<?php
namespace backendplus\models;

use Yii;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use common\components\CommonBased;
use yii\helpers\ArrayHelper;
use common\components\MediaBased;
use eeTools\common\eeDebug;
use yii\web\HttpException;
use common\components\CommonConst;
use common\models\UserSkill;
use eeTools\common\eeArray;
use yii\validators\ExistValidator;
use common\models\UserLocation;
use common\models\UserProject;
use common\models\UserComment;

/**
 * Admin User model for backend.
 *
 * @property integer $u_id
 * @property string $u_username
 * @property string $u_password
 * @property string $u_authKey
 * @property integer $u_authRole_id
 * 
 * @property string $u_displayName
 * @property string $u_avatar
 * @property string $u_qq
 * @property string $u_phone
 * @property string $u_tel
 * @property string $u_email
 * @property string $u_weChat
 * @property string $u_wcQR
 * @property string $u_linkedIn
 * @property integer $u_appLocale_id
 * @property integer $u_score
 * @property string $u_creationDate
 * @property integer $u_creationUser_id
 * @property string $u_updateDate
 * @property integer $u_updateUser_id
 * @property string $u_lastPassChangeDate
 * @property integer $u_actived
 * @property integer $u_deleted
 * 
 * 
 * 
 * @property UserSkill[] $userSkills
 * @property UserLocation[] $userLocations
 * @property UserProject[] $userProjects
 * @property UserComment[] $activeComments
 */
class AdminUser extends MediaBased implements IdentityInterface
{
    public $password_new;
    public $password_new_repeat;
    public $password_change_new;
    public $password_change_new_repeat;
    public $password_old;
    
    
    public $u_skill;
    public $u_location;
    
    
    public $adminAvatar;
    public $wcQR;
    
    public $cleanQR = 0;
    
    public function init() {
        parent::init();
        
        $this->uploadFilePath = 'site/';
        $this->uploadFileAttrs['u_avatar'] = 'adminAvatar';
        $this->uploadFileAttrs['u_wcQR'] = 'wcQR';
    }
    
    
    

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%adminUser}}';
    }

//     /**
//      * @inheritdoc
//      */
//     public function behaviors()
//     {
//         return [
// //             TimestampBehavior::className(),
//         ];
//     }

    public function scenarios()
    {
        $spBasic = ['password_change_new', 'password_change_new_repeat', 'u_displayName', 'u_email', 'u_weChat', 'wcQR', 'cleanQR', 'u_qq', 'u_linkedIn', 'u_phone', 'u_tel'];
        return [
                'migrate' => ['u_username', 'password_new', 'u_displayName'],
                'admin-create' => ['u_username', 'password_new', 'password_new_repeat', 'u_displayName', 'u_actived', 'u_authRole_id'],
                'admin-update' => ['password_change_new', 'password_change_new_repeat', 'u_displayName', 'u_actived', 'u_authRole_id'],
                'sp-create' => ArrayHelper::merge($spBasic, ['u_actived', 'u_username', 'password_new', 'password_new_repeat']),
                'sp-update' => ArrayHelper::merge($spBasic, ['u_actived']),
                'sp-update-admin' => ArrayHelper::merge($spBasic, ['u_actived']),
                'update-skill' => ['u_skill'],
                'update-location' => ['u_location'],
                'authUpdate' => [],
                'default' => [],
        ];
    }    
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['u_displayName', 'password_new', 'u_username'], 'required'],
            [['u_displayName', 'u_email', 'u_phone', 'u_qq', 'u_weChat', 'u_linkedIn'], 'trim'],
                
//             [['or_startDate'], 'date', 'format'=>'yyyy-MM-dd', 'message'=>'{attribute} 正确格式为 2016-10-10'],
//             [['or_contactEmail', 'or_weChatName'], 'string', 'max' => 255],

            [['u_displayName',  'u_intro', 'u_proof', 'u_email'], 'required', 'on'=>'sp-update'],
            [['u_username'], 'unique'],
            [['u_email'], 'email'],
            
            // string length
            ['u_phone', 'integer', 'min' => 10000000000, 'max' => 20000000000, 'tooSmall'=>'{attribute} 为11位整数', 'tooBig'=>'{attribute} 为11位整数'],
            [['u_qq', 'u_tel'], 'string', 'max' => 20],
            [['u_displayName', 'u_weChat', 'u_linkedIn'], 'string', 'max' => 45],
            [['u_email'], 'string', 'max' => 250],
            
            // all pass filter
            [['password_new', 'password_change_new'], 'string', 'min' => 3, 'max' => 64],
            [['password_new_repeat'], 'compare', 'compareAttribute'=>'password_new', 'message'=>'两次密码输入不一致'],
            [['password_change_new_repeat'], 'compare', 'compareAttribute'=>'password_change_new', 'message'=>'两次密码输入不一致'],
            [['password_old'], 'validateOldPass'],
        ];
    }

    /**
     * validate old pass b4 password change.
     */
    public function validateOldPass(){
        if (!$this->validatePassword($this->password_old)) {
            $this->addError('password_old', '旧密码输入错误');
        }
    }
    
    
    
    

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
                'password_old' => 'Correct Pass',
                'password_new' => '密码',
                'password_new_repeat' => '密码重复',
                'password_change_new' => '新密码',
                'password_change_new_repeat' => '新密码重复',
                'u_id' => 'ID',
                'u_username' => '账号',
                'u_authRole_id' => '权限',
                'adminAvatar' => '头像',
                'u_avatar' => '头像',
                'u_desc' => 'Info',
                'u_password' => 'Password',
                'u_qq' => 'QQ',
                'u_linkedIn' => 'LinkedIn',
                'u_phone' => '手机',
                'u_tel' => '电话',
                'u_email' => '邮箱',
                'u_weChat' => '微信',
                'u_wcQR' => '微信二维码',
                'wcQR' => '微信二维码',
                'cleanQR' => '删除微信二维码',
                'u_displayName' => '名称',
                'u_creationDate' => '创建时间',
                'u_updateDate' => '更新时间',
                'u_actived' => '可用',
                'u_skill' => '技能',
                'u_location' => '城市',
        ];
    }
    

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['u_id' => $id]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['u_username' => $username]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return boolean
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }
    
    public function getUsername()
    {
        return $this->u_username;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->u_authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->u_password);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->u_authKey = Yii::$app->security->generateRandomString();
    }
    
    /**
     * Generates "remember me" authentication key
     */
    public function updateAuthKey()
    {
        $this->u_authKey = Yii::$app->security->generateRandomString();
        $this->scenario = 'authUpdate';
        $this->save();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }
    
    
    ////Behaviors
    
    ////Behaviors
    
    /**
     * do something before save
     * 
     */
    public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {
            
            if (in_array($this->scenario, ['admin-update', 'sp-update', 'sp-update-admin'])) {
                if (!empty($this->password_change_new)) {
                    //encrypt new pass before save
                    $this->u_password = Yii::$app->security->generatePasswordHash($this->password_change_new);
                }//pass changed
            }
            
            
            if (in_array($this->scenario, ['migrate', 'admin-create'])) {
                //encrypt new pass before save
                $this->u_authRole_id = CommonConst::AUTH_ADMIN;
                $this->u_password = Yii::$app->security->generatePasswordHash($this->password_new);
            }
            
            
            if ($this->scenario == 'sp-create') {
                //encrypt new pass before save
                $this->u_authRole_id = CommonConst::AUTH_SP;
                $this->u_password = Yii::$app->security->generatePasswordHash($this->password_new);
            }
            
            
            
            if ($this->cleanQR == 1) {
                // remove QR image data
                $this->u_wcQR = null;
                
            }
            
            return true;
        }else{
            return false;
        };
    }
    
    
    
}
