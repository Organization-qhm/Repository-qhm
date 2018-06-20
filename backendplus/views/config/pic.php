<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\components\CommonConst;
use yii\widgets\Menu;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\SiteElement */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>

<?php if (Yii::$app->session->getFlash('pic-saved')):?>
    <div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      Done.
    </div>
<?php endif;?>
<div class="client-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>


	<?php if (!empty($model->se_filePath)):?>
		<?= Html::img(Yii::$app->params['url.resourceBased'].$model->se_filePath, ['style'=>'max-width:300px;']); ?>
	<?php endif;?>
    <?= $form->field($model, 'filePath')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    
    <div class="hide">
    	<div id="pi_demo">
            <div class="form-group">
                <label class="control-label" for="page-p_title">Name</label>
                <input type="text" class="form-control" name="p_title" maxlength="200">
            </div>
            <div class="form-group">
                <label class="control-label" for="page-p_t600_1">Title</label>
                <input type="text" class="form-control" name="p_t600_1" maxlength="200">
            </div>
            <div class="form-group">
                <label class="control-label" for="page-p_t600_2">Phone</label>
                <input type="text" class="form-control" name="p_t600_2" maxlength="200">
            </div>
    		
    	</div>
    
    </div>

</div>