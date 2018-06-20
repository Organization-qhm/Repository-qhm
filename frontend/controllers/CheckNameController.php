<?php
namespace frontend\controllers;

use frontend\components\FrontendBasedController;
use yii\web\HttpException;
use yii\helpers\ArrayHelper;
use yii\filters\AccessControl;
use frontend\models\NameSearchForm;
use eeTools\common\eeDebug;
use frontend\models\CheckNameSearchForm;

/**
 * Site controller
 */
class CheckNameController extends FrontendBasedController{
    
    public $pageTitle = '企好名';
    
    
    /**
     * @inheritdoc
     */
//     public function behaviors()
//     {
//         return ArrayHelper::merge(parent::behaviors(), [
//                 'access' => [
//                         'class' => AccessControl::className(),
//                         'rules' => [
//                                 [
//                                         'actions' => ['view'],
//                                         'allow' => true,
//                                         'roles' => ['@'],
//                                 ],
//                                 [
//                                         'actions' => ['index'],
//                                         'allow' => true,
//                                 ],
                        
//                         ],
//                         'denyCallback' => function($rule, $action ){
                            
//                             //set current request url as return url, so Yii will do auto redirect after login success
//                             \Yii::$app->getUser()->setReturnUrl(ArrayHelper::merge([\Yii::$app->requestedRoute], \Yii::$app->request->getQueryParams()));
                            
//                             //custom login redirect
//                             return $this->redirect(['site/login', 'btype'=>$this->_btype]);
//                         },
//                 ],
//         ]);
//     }
    
    public function actionIndex(){
        
        $this->pageTitle = '核名';
        
        $model = new CheckNameSearchForm();
        
        //handle post & update model
        $postData = \Yii::$app->getRequest()->post();
        if (!empty($postData)) {
            $model->scenario = 'web-search';
            $model->load($postData);
            
            
            if ($model->validate()) {
                
                //save into session
                \Yii::$app->session->set('web-check-name-search', $postData);
                
                return $this->redirect(['check-name/view', 'btype'=>$this->_btype]);
            }
        }
        

        return $this->render('index', [
            'model' => $model,
        ]);
    }
    
    
    /**
     * show name search result.
     */
    public function actionView(){
        $this->pageTitle = '核名详情';
        
        $model = new CheckNameSearchForm();
        $model->scenario = 'web-search';

        $model->loadSearchParams();
        
        $model->apiSearch();
        
//         if (empty($model->city) || empty($model->industry)) {
//             return $this->redirect(['name/index', 'btype'=>$this->_btype]);
//         }//if no params load from session send user back to index page to do search again, for login and some no logic conditions

        return $this->render('view', [
            'model' => $model,
        ]);
    }
    
}
