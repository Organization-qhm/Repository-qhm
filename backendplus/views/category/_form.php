<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Category */
/* @var $form yii\widgets\ActiveForm */

$publicTemplate = '<div class="col-md-3">{label}</div> <div class="col-md-9">{input}{error}{hint}</div>';

?>

<div class="category-form box box-primary">
    <?php $form = ActiveForm::begin(['options'=>['class'=>'form-horizontal']]); ?>
    <div class="box-body table-responsive">

        <?= $form->field($model, 'cat_title', [
                'template' => $publicTemplate
        ])->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'cat_sortOrder', [
                'template' => $publicTemplate
        ])->textInput() ?>

    </div>
    <div class="box-footer">
        <?= Html::submitButton($model->isNewRecord ? '新增' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success btn-flat' : 'btn btn-primary btn-flat']) ?>
        
    </div>
    <?php ActiveForm::end(); ?>
</div>
