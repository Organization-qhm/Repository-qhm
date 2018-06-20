<?php

namespace backendplus\components;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\components\CommonConst;
use yii\web\HttpException;

/**
 * SP Admin based controller, all son controllers only show for SP admin or supper admin
 */
class BackAdminSpBasedController extends BackBasedController
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
                                        'actions' => ['index', 'view', 'update', 'delete', 'create'],
                                        'allow' => true,
                                        'roles' => ['@'],
                                ],
                        ],
                ],
                'verbs' => [
                        'class' => VerbFilter::className(),
                        'actions' => [
                                'delete' => ['post'],
                        ],
                ],
        ];
    }
    
    public function beforeAction($action){
    
        if (parent::beforeAction($action)) {
            //only admin can access this controller's actions
            if (!in_array(\Yii::$app->user->identity->u_authRole_id, [CommonConst::AUTH_ADMIN, CommonConst::AUTH_ADMIN_SP]) ) {
                throw new HttpException('403', 'auth not enough.');
            }
    
            return true;
        }else{
            return false;
        }
    }

    /**
     * Lists all Project models.
     * @return mixed
     */
    public function actionIndex()
    {
        exit;
    }

    /**
     * Displays a single Project model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        exit;
    }

    /**
     * Creates a new Project model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        exit;
    }

    /**
     * Updates an existing Project model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        exit;
    }

    /**
     * Deletes an existing Project model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        exit;
    }
}
