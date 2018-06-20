<?php
namespace backendplus\models;

use Yii;
use yii\base\Model;
use eeTools\common\eeDebug;


/**
 * Login form
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    private $_user;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            
            if (empty($user) || !$user->validatePassword($this->password) || $user == null ) {
                $this->addError($attribute, 'Incorrect username or password.');
            }else{
                
                if ($user->u_actived != 1) {
                    $this->addError($attribute, 'unactive user.');
                }
            }
            
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return boolean whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            //load user and set cookies
            $this->getUser();
            
            $this->_user->updateAuthKey();
            
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        } else {
            return false;
        }
    }
    

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
                'rememberMe' => '自动登录',
//                 'sms' => '验证码',
        ];
    }
    

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser()
    {
//         eeDebug::varDump($this->_user, false);
        if ($this->_user === null) {
            $this->_user = AdminUser::findByUsername($this->username);
        }

        return $this->_user;
    }
}
