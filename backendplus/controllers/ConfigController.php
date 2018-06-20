<?php

namespace backendplus\controllers;

use Yii;
use common\models\Correction;
use common\models\CorrectionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\components\CommonConst;
use yii\filters\AccessControl;
use common\models\Page;
use common\models\SiteElement;
use yii\web\HttpException;
use common\models\Company;
use common\models\CompanySearch;
use backendplus\components\BackAdminBasedController;
use backendplus\components\BackAdminBonoBasedController;

/**
 * CorrectionController implements the CRUD actions for Correction model.
 */
class ConfigController extends BackAdminBonoBasedController
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
                        'actions' => [
                                'index',
                                'pic', 'text', 'editor', 'input', 'basic'
                        ],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all Correction models.
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index', [
        ]);
    }
    
    /**
     * Lists all Correction models.
     * @return mixed
     */
    public function actionPic($code)
    {
        //check code valid
        $seCode = CommonConst::getSECodeList();
        if (!isset($seCode[$code])) {
            throw new HttpException(400, 'code not exist');
        }
        
        //find linked siteelement
        $model = SiteElement::find()->where(['se_code'=>$code])->one();
        if (empty($model)) {
            $model = new SiteElement();
            $model->se_code = $code;
        }
        $model->scenario = 'config-pic';
        
        //handle post & update model
        $postData = \Yii::$app->getRequest()->post();
        if (!empty($postData)) {
            $model->load($postData);
            
            if ($model->save()) {
                //set flag
                \Yii::$app->session->setFlash('pic-saved');
                
                //redirect
                return $this->redirect(['config/pic', 'code'=>$code]);
            }
        }
        
        
        return $this->render('pic', [
            'model' => $model,
        ]);
    }
    
    /**
     * Lists all Correction models.
     * @return mixed
     */
    public function actionText($code)
    {
        //check code valid
        $seCode = CommonConst::getSECodeList();
        if (!isset($seCode[$code])) {
            throw new HttpException(400, 'code not exist');
        }
        
        //find linked siteelement
        $model = SiteElement::find()->where(['se_code'=>$code])->one();
        if (empty($model)) {
            $model = new SiteElement();
            $model->se_code = $code;
        }
        $model->scenario = 'config-text';
        
        //handle post & update model
        $postData = \Yii::$app->getRequest()->post();
        if (!empty($postData)) {
            $model->load($postData);
            
            if ($model->save()) {
                //set flag
                \Yii::$app->session->setFlash('text-saved');
                
                //redirect
                return $this->redirect(['config/text', 'code'=>$code]);
            }
        }
        
        
        return $this->render('text', [
            'model' => $model,
        ]);
    }
    
    /**
     * Lists all Correction models.
     * @return mixed
     */
    public function actionEditor($code)
    {
        $type = 'editor';
        //check code valid
        $seCode = CommonConst::getSECodeList();
        if (!isset($seCode[$code])) {
            throw new HttpException(400, 'code not exist');
        }
        
        //find linked siteelement
        $model = SiteElement::find()->where(['se_code'=>$code])->one();
        if (empty($model)) {
            $model = new SiteElement();
            $model->se_code = $code;
        }
        $model->scenario = 'config-'.$type;
        
        //handle post & update model
        $postData = \Yii::$app->getRequest()->post();
        if (!empty($postData)) {
            $model->load($postData);
            
            if ($model->save()) {
                //set flag
                \Yii::$app->session->setFlash('text-saved');
                
                //redirect
                return $this->redirect(['config/'.$type, 'code'=>$code]);
            }
        }
        
        
        return $this->render($type, [
            'model' => $model,
        ]);
    }
    
    /**
     * Lists all Correction models.
     * @return mixed
     */
    public function actionInput($code)
    {
        //check code valid
        $seCode = CommonConst::getSECodeList();
        if (!isset($seCode[$code])) {
            throw new HttpException(400, 'code not exist');
        }
        
        //find linked siteelement
        $model = SiteElement::find()->where(['se_code'=>$code])->one();
        if (empty($model)) {
            $model = new SiteElement();
            $model->se_code = $code;
        }
        $model->scenario = 'config-input';
        
        //handle post & update model
        $postData = \Yii::$app->getRequest()->post();
        if (!empty($postData)) {
            $model->load($postData);
            
            if ($model->save()) {
                //set flag
                \Yii::$app->session->setFlash('text-saved');
                
                //redirect
                return $this->redirect(['config/input', 'code'=>$code]);
            }
        }
        
        
        return $this->render('input', [
            'model' => $model,
        ]);
    }
    
    /**
     * Lists all Correction models.
     * @return mixed
     */
    public function actionBasic($code)
    {
        //check code valid
        $seCode = CommonConst::getSECodeList();
        if (!isset($seCode[$code])) {
            throw new HttpException(400, 'code not exist');
        }
        
        //find linked siteelement
        $model = SiteElement::find()->where(['se_code'=>$code])->one();
        if (empty($model)) {
            $model = new SiteElement();
            $model->se_code = $code;
        }
        $model->scenario = 'config-'.$code;
        
        //handle post & update model
        $postData = \Yii::$app->getRequest()->post();
        if (!empty($postData)) {
            $model->load($postData);
            
            if ($model->save()) {
                //set flag
                \Yii::$app->session->setFlash('saved-'.$model->scenario);
                
                //redirect
                return $this->redirect(['config/basic', 'code'=>$code]);
            }
        }
        
        
        return $this->render('d_'.$code, [
            'model' => $model,
        ]);
    }

}
