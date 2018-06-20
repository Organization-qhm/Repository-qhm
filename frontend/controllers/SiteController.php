<?php
namespace frontend\controllers;

use Yii;
use frontend\models\LoginForm;
use frontend\models\SignupForm;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use frontend\components\FrontendBasedController;
use common\models\BannerMedia;
use common\models\Banner;
use frontend\components\WechatCheckFilter;
use eeTools\common\eeDebug;
use eeTools\common\eeWeChat;
use eeTools\eeWeChat\Tools\wcValidate;
use eeTools\eeWeChat\Tools\wcMenu;
use common\models\Page;
use common\components\CommonConst;
use eeTools\eeWeChat\Message\wcReplyMsg;
use eeTools\common\eeFile;
use eeTools\eeWeChat\KF\wcKF;
use eeTools\eeWeChat\Message\wcServiceMsg;
use common\models\Replacement;
use common\models\Account;


/**
 * Site controller
 */
class SiteController extends FrontendBasedController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        
        return ArrayHelper::merge(parent::behaviors(), [
//                 'wechat-check' => [
//                         'class'=>WechatCheckFilter::className(),
//                         'only' => ['index']
//                 ]
        ]);
    }
    
    
    /**
     * @inheritdoc
     */
    public function beforeAction($action)
    {
        if (in_array($action->id, ['w-c', 'w-ce'])) {
            $this->enableCsrfValidation = false;
        }
    
        return parent::beforeAction($action);
    }
    
    /**
     * @inheritdoc
     */
    public function actions() {
        return [
                'error' => [
                        'class' => 'yii\web\ErrorAction'
                ]
        ];
    }

    /**
     * Index is about page in this case.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $this->pageTitle = '首页';
        
        return $this->render('index', [
        ]);
    }
    
    /**
     * render pages for diff code
     *
     * @return mixed
     */
    public function actionPa($c)
    {
        $this->pageTitle = CommonConst::getName($c, 'Pages');
        
        return $this->render('pa_'.$c, [
        ]);
    }
    
    
    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup(){
        $this->pageTitle = '注册';
    
        $model = new Account();
        $model->scenario = 'web-signup';
        //handle post & update model
        $postData = \Yii::$app->getRequest()->post();
        if (!empty($postData)) {
            $model->load($postData);
    
            //             var_dump($model->agreeTeam);
            //             exit;
    
//             eeDebug::show($postData, 1);
            if ($model->save()) {
                //set flag
                \Yii::$app->session->setFlash('signup-success');
    
                //redirect to login
                //auto login Feb 11, 2018@Lee
                if (Yii::$app->user->login($model, 3600 * 24 * 30)) {
                    //set first register flag
                    
                    
                    
                    //redirect
                    return $this->goBack();
                }
    
                //                 return $this->redirect(['site/login']);
            }else {
//                     eeDebug::varDump($model->errors, false);
            }
        }
    
        return $this->render('signup', [
                'model' => $model,
        ]);
    }

    public function actionLogin()
    {
        $this->pageTitle = '登录';
        
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }
    
        $model = new LoginForm();
        $model->scenario = 'web-login';
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            
            if (isset($_GET['s-back'])) {
                //session back support for wap/pc need login b4 show alert
                $sessionBackUrl = \Yii::$app->session->get($_GET['s-back']);
                if (!empty($sessionBackUrl)) {
                    return $this->redirect($sessionBackUrl);
                }else{
//                     echo '2';
//                     exit;
                    return $this->goBack();
                }
                
            }else{
                
//                     echo '3';
//                     exit;
                return $this->goBack();
            }
            
            
            
        } else {
            return $this->render('login', [
                    'model' => $model,
            ]);
        }
    }
    
    public function actionLogout()
    {
        Yii::$app->user->logout();
    
        return $this->goHome();
    }
    
}
