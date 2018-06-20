<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\SiteElement */
/* @var $form yii\widgets\ActiveForm */

$publicTemplate = '<div class="col-md-3">{label}</div> <div class="col-md-9">{input}{error}{hint}</div>';
?>

<div class="site-element-form box box-primary">
    <?php $form = ActiveForm::begin(['options'=>['class'=>'form-horizontal']]); ?>
    <div class="box-body table-responsive">

        <?= $form->field($model, 'se_code', [
                'template' => $publicTemplate
        ])->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'se_v1', [
                'template' => $publicTemplate
        ])->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'se_v2', [
                'template' => $publicTemplate
        ])->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'se_v3', [
                'template' => $publicTemplate
        ])->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'se_v4', [
                'template' => $publicTemplate
        ])->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'se_v5', [
                'template' => $publicTemplate
        ])->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'se_v6', [
                'template' => $publicTemplate
        ])->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'se_uri', [
                'template' => $publicTemplate
        ])->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'se_creationDate', [
                'template' => $publicTemplate
        ])->textInput() ?>

        <?= $form->field($model, 'se_creationUser_id', [
                'template' => $publicTemplate
        ])->textInput() ?>

        <?= $form->field($model, 'se_updateDate', [
                'template' => $publicTemplate
        ])->textInput() ?>

        <?= $form->field($model, 'se_updateUser_id', [
                'template' => $publicTemplate
        ])->textInput() ?>

        <?= $form->field($model, 'se_sortOrder', [
                'template' => $publicTemplate
        ])->textInput() ?>

    </div>
    <div class="box-footer">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
