<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Account */
/* @var $form yii\widgets\ActiveForm */

$publicTemplate = '<div class="col-md-3">{label}</div> <div class="col-md-9">{input}{error}{hint}</div>';

?>

<div class="account-form box box-primary">

    <?php $form = ActiveForm::begin(['options'=>['class'=>'form-horizontal']]); ?>
    <div class="box-body table-responsive">

    <?= $form->field($model, 'a_phone', [
                'template' => $publicTemplate
        ])->textInput(['maxlength' => true, 'disabled'=>true]) ?>
    
    <?= $form->field($model, 'a_title', [
                'template' => $publicTemplate
        ])->textInput(['maxlength' => true]) ?>
    
    
	<?php if (substr($model->a_filePath, 0, 4) != 'http'):?>
	<?php if (!empty($model->a_filePath)):?>
		<?= Html::img($model->loadIconUrl(), ['style'=>'max-width:100px;']); ?>
	<?php endif;?>
	
    <?= $form->field($model, 'filePath', [
                'template' => $publicTemplate
        ])->fileInput() ?>
    <?php endif;?>

    <?= $form->field($model, 'a_email', [
                'template' => $publicTemplate
        ])->textInput(['maxlength' => true]) ?>

    </div>
    <div class="box-footer">
        <?= Html::submitButton($model->isNewRecord ? '新增' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
