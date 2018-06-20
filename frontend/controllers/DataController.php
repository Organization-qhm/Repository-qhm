<?php
namespace frontend\controllers;

use common\models\Sms;
use frontend\components\FrontendBasedController;
use yii\web\HttpException;
use common\models\Location;
use yii\helpers\ArrayHelper;
use common\models\Org;
use common\components\CommonConst;
use yii\filters\AccessControl;
use common\models\Project;
use eeTools\common\eeArray;
use common\models\ProjectPlanOrgAccount;
use common\models\Plan;
use common\models\PlanOrgAccount;
use common\models\Account;
use common\models\ProjectActivityItem;
use eeTools\common\eeDate;
use eeTools\common\eeString;
use common\models\ChangeRecord;

/**
 * Data for all ajax data load
 * split into each controller for need auth ajax actions
 */
class DataController extends FrontendBasedController{
    
    public $pageTitle = '';
    
    
    
    /**
     * @inheritdoc
     */
    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;
        
        if (parent::beforeAction($action)) {
            return true;
        }
    
        return false;
    }
    
    
    
    /**
     * @inheritdoc
     */
    public function behaviors(){
    
        return ArrayHelper::merge(parent::behaviors(), [
                'access' => [
                        'class' => AccessControl::className(),
//                         'only' => ['index'],
                        'rules' => [
                                [
                                        'actions' => [
                                                'send-sms',
                                                'ajax-signup',
                                                'ajax-login',
                                        ],
                                        'allow' => true,
                                        'roles' => ['?'],
                                ],
                                [
                                        'actions' => [
                                                'ajax-load-location',
                                                'ajax-load-cr',
                                        ],
                                        'allow' => true,
                                        'roles' => ['@'],
                                ],
                        ],
                ],
        ]);
    }
    
    /**
     * send sms for given phone No.
     *
     */
    public function actionSendSms()
    {
        $this->layout = false;
        $phone = \Yii::$app->getRequest()->post('mobile');
    
        //check phone before send
        if(preg_match('/^1\d{10}$/ ', $phone) == 0){
            throw new HttpException(404, 'sms01');
        }
    
        //         eeDebug::varDump($phone);
    
        //save or load sms by phone
        $sms = Sms::find()->where(['s_phone'=>$phone, 's_used'=>0])->andWhere(['>', 's_expiredDate', date('Y-m-d H:i:s')])->one();
        if (empty($sms)) {
            $sms = new Sms();
            $sms->s_phone = $phone;
            $sms->s_code = mt_rand(100000, 999999);
    
            //@ee5 remove hardcode when API ready.
            $sms->s_code = 333333;
    
            $sms->save();
            //             eeDebug::varDump($sms->errors, false);
        }
    
        exit;
        //open sms send logic
//         $message = [];
//         $message['mobile'] = $sms->s_phone;
//         $message["message"] = "验证码: $sms->s_code 【博能】";
//         eeSms::LuoSiMaoSender($message);
    
    }
    
    /**
     * ajax signup action for wap sign up
     *
     */
    public function actionAjaxSignup(){
        $response = [];
        
        //prepare params
        $phone = \Yii::$app->getRequest()->post('phone');
        $name = \Yii::$app->getRequest()->post('name');
        $city = \Yii::$app->getRequest()->post('city');
        
        
        //try login
        $account = new Account();
        $account->scenario = 'web-ajax-signup';
        $account->a_phone = $phone;
        $account->a_title = $name;
        $account->a_cityTitle = $city;
        
        if ($account->save()) {
            //saved
            
            //login
            $account->loginUser();
            
            //return success msg
            $response['code'] = '9680210';
        }else{
//             var_dump($account->errors);
            //has error feedback
            $response['code'] = @$account->errors['a_phone'][0];
        }
        
        echo json_encode($response);
    }
    
    
    /**
     * ajax signup action for login
     *
     */
    public function actionAjaxLogin(){
        $response = [];
        
        //prepare params
        $phone = \Yii::$app->getRequest()->post('phone');
        
        //try login
        $account = Account::find()->where(['a_phone'=>$phone])->one();
        if (!empty($account)) {
            //success load and login
            $account->loginUser();
            
            //return success msg
            $response['code'] = '9680110';
        }else{
            //not found
            //return error
            $response['code'] = '9680101';
        }
        
        
        
        echo json_encode($response);
    }
    
    
    
    

    

}
