<?php

namespace backendplus\controllers;

use Yii;
use common\models\Issue;
use common\models\IssueSearch;
use backendplus\components\BackBasedController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use eeTools\common\eeUploadedFile;
use common\models\Company;

/**
 * IssueController implements the CRUD actions for Issue model.
 */
class DataController extends BackBasedController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

	public function actionUpload(){
// 	    var_dump(\Yii::$app->params['mediaUploadPrefixPath']);
// 	    exit;
	    if (!isset($_FILES['image']['size'])){
	        throw new NotFoundHttpException();
	        return 0;
	    }//check mediaProprityName correct
	     
	     
	    if ($_FILES['image']['size'] > 0) {
	         
	        //name path
	        $uploadMediaPrefixUrl = Yii::$app->params['url.resourceBased'];
	         
	        
	        $tmpUploader = eeUploadedFile::getInstanceByName('image');
	        //                 eeDebug::varDump($oneFileAttr, false);
	        //                 eeDebug::varDump($this->{$oneFileAttr}, false);
	        //                 exit;
	        
	        if (!empty($tmpUploader)) {
	            if($tmpUploader->moveUploadFile('site/')){
	                //upload success, use new name update iconfile
    	            echo json_encode(['location'=>$uploadMediaPrefixUrl.$tmpUploader->newName]);
	            }
	        }
	        
	    }//only do file move if have file uploaded
	}
}
