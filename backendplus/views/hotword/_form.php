<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Industry;

/* @var $this yii\web\View */
/* @var $model common\models\Hotword */
/* @var $form yii\widgets\ActiveForm */

$publicTemplate = '<div class="col-md-3">{label}</div> <div class="col-md-9">{input}{error}{hint}</div>';

?>

<div class="hotword-form box box-primary">
    <?php $form = ActiveForm::begin(['options'=>['class'=>'form-horizontal']]); ?>
    <div class="box-body table-responsive">

        <?= $form->field($model, 'h_industry_id', [
                'template' => $publicTemplate
        ])->dropDownList(Industry::loadDDList()) ?>

        <?= $form->field($model, 'h_title', [
                'template' => $publicTemplate
        ])->textInput(['maxlength' => true, 'placeholder'=>'支持单个关键词']) ?>

        <?= $form->field($model, 'h_sortOrder', [
                'template' => $publicTemplate,
                'options'=>['class'=>'hide']
                
        ])->textInput() ?>

    </div>
    <div class="box-footer">
        <?= Html::submitButton($model->isNewRecord ? '新增' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success btn-flat' : 'btn btn-primary btn-flat']) ?>

    </div>
    <?php ActiveForm::end(); ?>
</div>
