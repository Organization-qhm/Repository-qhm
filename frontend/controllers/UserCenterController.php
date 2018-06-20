<?php
namespace frontend\controllers;

use frontend\components\FrontendBasedController;
use common\models\Order;
use yii\data\Pagination;
use yii\web\HttpException;
use common\models\UserPaper;
use common\eeTools\eePaper;
use yii\helpers\ArrayHelper;
use frontend\components\WechatCheckFilter;
use eeTools\common\eeDebug;
use common\models\Client;
use common\components\CommonConst;
use common\models\Correction;
use common\models\SiteElement;
use common\models\Category;
use yii\filters\AccessControl;
use common\models\VtRound;
use common\models\VtApply;
use common\models\AccountInfo;

/**
 * Site controller
 */
class UserCenterController extends FrontendBasedController{
    
    public $pageTitle = '用户中心';
    
    
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return ArrayHelper::merge(parent::behaviors(), [
                'access' => [
                        'class' => AccessControl::className(),
                        'rules' => [
                                [
                                        'actions' => ['index', 'my-vt', 'update-info'],
                                        'allow' => true,
                                        'roles' => ['@'],
                                ],
                        ],
                ],
        ]);
    }
    
    public function actionIndex(){
//         $this->pageTitle = '支教计划';
        

//         return $this->render('index', [
//             'vtRounds' => $vtRounds,
//         ]);
    }
    
    
    /**
     * my volunteer teach apply list
     * @throws HttpException
     * @return string
     */
    public function actionMyVt(){
        $this->pageTitle = '我的支教列表';
        
        $VTAs = VtApply::find()->where(['vta_creationUser_id'=>\Yii::$app->user->id])->orderBy('vta_id Desc')->all();

        return $this->render('my-vt', [
            'VTAs' => $VTAs,
        ]);
    }
    
    public function actionUpdateInfo(){
        $this->pageTitle = '更新个人信息';
        
        $model = \Yii::$app->user->identity;
        
        $model->scenario = 'web-uc-update-user-info';
        //handle post & update model
        $postData = \Yii::$app->getRequest()->post();
        if (!empty($postData)) {
            $model->load($postData);
            
            if ($model->save()) {
                
                $goBackUrl = \Yii::$app->session->getFlash('web-first-fill-goback');
                if (!empty($goBackUrl)) {
                    return $this->redirect($goBackUrl);
                }//for vt apply's jupm need go back.
                
                //set flag
                \Yii::$app->session->setFlash('web-uc-update-user-info-success');
                
                //redirect to two url, normal to user/index, not normal to something in session
                return $this->redirect(['user-center/update-info']);
//                 exit;
            }
        }
        
        
        return $this->render('update-info', [
            'model' => $model,
        ]);
    }
    
    
    
    
    
    

    

}
