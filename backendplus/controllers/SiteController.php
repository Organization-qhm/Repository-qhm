<?php
namespace backendplus\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use backendplus\models\LoginForm;
use yii\filters\VerbFilter;
use eeTools\common\eeDebug;
use eeTools\common\eeString;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error', 't', 'w-c'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index', 'state', 'sync'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
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
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }
    

    public function actionLogin()
    {
        $this->layout = 'public';
        
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
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
