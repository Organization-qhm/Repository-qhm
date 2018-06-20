<?php

namespace backendplus\components;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * ProjectController implements the CRUD actions for Project model.
 */
class BackBasedController extends Controller
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
