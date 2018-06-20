<?php

namespace backendplus\controllers;

use Yii;
use common\models\Account;
use common\models\AccountSearch;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use common\models\AccountHotwordSearch;
use backendplus\components\BackAdminNormalBasedController;
use backendplus\models\eeExcel;
use eeTools\common\eeDebug;

/**
 * AccountController implements the CRUD actions for Account model.
 */
class AccountController extends BackAdminNormalBasedController
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
                                            'view', 
                                            'delete', 
                                            'update-pass', 
                                            'update',
                                            'output-excel',
                                    ],
                                    'allow' => true,
                                    'roles' => ['@'],
                            ],
                    ],
            ],
        ];
    }

    /**
     * Lists all Account models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AccountSearch();
        $queryParams = Yii::$app->request->queryParams;
        
        $dataProvider = $searchModel->search($queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Lists all Account models.
     * @return mixed
     */
    public function actionOutputExcel()
    {
        $searchModel = new AccountSearch();
        $queryParams = Yii::$app->request->queryParams;
        
        $dataProvider = $searchModel->search($queryParams);
        
        $eeExcel = new eeExcel();
        
        $outAttrArr = [
            'a_id',
            'a_phone',
            'a_title',
            'a_sourceKeyword',
            '_searchCount',
            '_firstCity',
            '_firstIndusty',
            'a_creationDate',
            'a_lastLoginDate',
        ];
        
        $dataArr = [
        ];
        $titleArr = [
        ];

        foreach ($outAttrArr as $value) {
            $titleArr[] = $searchModel->getAttributeLabel($value); 
        }
        $titleArr[] = '操作人';
        
//         eeDebug::show($titleArr, 1);
        
//         exit;
        //loop and generate
        foreach ($dataProvider->getModels() as $oneM) {
            $tmpArr = [];
            
            foreach ($outAttrArr as $value) {
                if ($value == '_searchCount') {
                    $tmpArr[] = count($oneM->accountHotwords);
                    continue;
                }
                if ($value == '_firstCity') {
                    $tmpV = '';
                    if (!empty($oneM->aFirstHotword)) {
                        $tmpV = $oneM->aFirstHotword->ah_city;
                    }
                    $tmpArr[] = $tmpV;
                    continue;
                }
                if ($value == '_firstIndusty') {
                    $tmpArr[] = @$oneM->aFirstHotword->ah_industry;
                    continue;
                }
                
                $tmpArr[] = $oneM->getAttribute($value); 
            }
            
            $tmpArr[] = \Yii::$app->user->identity->u_displayName;
            
            $dataArr[] = $tmpArr;
        }

        $eeExcel->exportFile($dataArr, $titleArr);
    }

    /**
     * Displays a single Account model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        
        $searchModel = new AccountHotwordSearch();
        $queryParams = Yii::$app->request->queryParams;
        //hardcode to curent user.
        $queryParams['AccountHotwordSearch']['ah_account_id'] = $id;
        $dataProvider = $searchModel->search($queryParams);
        
        
        return $this->render('view', [
                
            'model' => $this->findModel($id),
            'searchModel' => $searchModel,
                
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Account model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        
        $model = new Account();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->a_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Account model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdatePass($id)
    {
        $model = $this->findModel($id);
        $model->scenario = 'update-pass';

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->a_id]);
        } else {
            return $this->render('update-pass', [
                'model' => $model,
            ]);
        }
    }
    /**
     * Updates an existing Account model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->scenario = 'update';

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->a_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Account model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->scenario = 'delete';
        
        $model->a_isDeleted ++;
        $model->a_isDeleted = $model->a_isDeleted %2;
        $model->save();

//         echo '已删除或已恢复删除，请刷新页面';
//         exit;
        return $this->redirect(['index']);
    }

    /**
     * Finds the Account model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Account the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Account::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
