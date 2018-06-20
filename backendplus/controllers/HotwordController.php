<?php

namespace backendplus\controllers;

use Yii;
use common\models\Hotword;
use common\models\HotwordSearch;
use backendplus\components\BackAdminBasedController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\components\CommonConst;
use yii\filters\AccessControl;
use eeTools\common\eeUploadedFile;
use backendplus\models\eeExcel;
use backendplus\components\BackAdminNormalBasedController;

/**
 * HotwordController implements the CRUD actions for Hotword model.
 */
class HotwordController extends BackAdminNormalBasedController
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
                                                'update', 
                                                'delete', 
                                                'create', 
                                                'create-batch', 
                                                'import'
                                        ],
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

    /**
     * Lists all Hotword models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new HotwordSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Hotword model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Hotword model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Hotword();
//         $model->h_sortOrder = CommonConst::SORT_NORMAL;
        $model->scenario = 'b-create';

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->h_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
    
    /**
     * Creates batch model with string titles
     * @return mixed
     */
    public function actionCreateBatch()
    {
        $model = new Hotword();
//         $model->h_sortOrder = CommonConst::SORT_NORMAL;
        $model->scenario = 'b-createBatch';

        //handle post & update model
        $postData = \Yii::$app->getRequest()->post();
        if (!empty($postData)) {
            $model->load($postData);
            
            $model->saveMultiTitle();
            
            return $this->render('create-batch-feedback', [
                'model' => $model    
            ]);
        }
        return $this->render('create-batch', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Hotword model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->scenario = 'b-update';

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->h_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Hotword model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    

    /**
     * import from excel file.
     * demo file backendplus/web/assets/files/products_import.csv
     */
    public function actionImport()
    {

        $model = new eeExcel();
        
        //load file from post
        $model->importFile = eeUploadedFile::getInstance($model, 'importFile');
        
        
        if (!empty($model->importFile)) {
            $model->importFile();
            
            \Yii::$app->session->setFlash('b-hotword-imported');
            \Yii::$app->session->setFlash('b-hotword-imported-success', $model->importSuccess);
            \Yii::$app->session->setFlash('b-hotword-imported-fail', $model->importFail);
            return $this->redirect(['hotword/import']);
        }
        
        
        
        return $this->render('import', [
            'model' => $model,
        ]);
    }

    /**
     * Finds the Hotword model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Hotword the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Hotword::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
