<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\AppUser;
use common\models\Sms;
use common\eeTools\eeDate;
use common\models\Account;

/**
 * Login form
 */
class LoginForm extends Model
{
    public $phone;
    public $pass;
    public $sms;
    public $smsInstant;


    private $_user;

    public function scenarios()
    {
        return [
                'web-login' => ['pass', 'phone'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['phone'], 'required'],
//             ['pass', 'validatePass'],
            ['phone', 'exist', 'targetClass'=>Account::className(), 'targetAttribute'=>'a_phone'],
//             ['phone', 'integer', 'min' => 10000000000, 'max' => 20000000000, 'tooSmall'=>'{attribute} 为11位整数', 'tooBig'=>'{attribute} 为11位整数'],
                
            // sms token validate
//             [['sms'], 'validateSMS'],
        ];
    }
    
    public function validatePass($attribute){

        if (!empty(Yii::$app->user->identity)) {
            //no need validate if already login.
            return true;
        }
    
        //load sms
        $user = $this->getUser();
        
        if (empty($user)) {
            $this->addError('pass', 'pass wrong.');
            return false;
        }//break when user empty
        
        
        if (!$user->validatePass($this->pass)) {
            $this->addError('pass', 'pass wrong.');
        }
        
    
    }
    
    /**
     * login with given SMS code.
     * @param sms $attribute
     */
    public function validateSMS($attribute){

        if (!empty(Yii::$app->user->identity)) {
            //no need validate if already login.
            return true;
        }
    
        //load sms
        $sms = Sms::find()->where(['s_phone'=>$this->phone, 's_code'=>$this->sms, 's_used'=>0])->andWhere(['>', 's_expriedDate', eeDate::f()])->one();
        if (empty($sms)) {
            $this->addError('sms', $this->getAttributeLabel($attribute).' 错误');
            return false;
        }
    
        $sms->s_used = 1;
        
        //store into property
        $this->smsInstant = $sms;
    
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
                'phone' => '手机号',
                'sms' => '验证码',
        ];
    }


    /**
     * Logs in a user using the provided username and password.
     *
     * @return boolean whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            //do save as the last step b4 login
//             $this->smsInstant->save();
            
            return $this->getUser()->loginUser();
        } else {
            return false;
        }
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = Account::findByPhone($this->phone);
        }

        return $this->_user;
    }
}
