<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Category;

/* @var $this yii\web\View */
/* @var $model common\models\Industry */
/* @var $form yii\widgets\ActiveForm */

$publicTemplate = '<div class="col-md-3">{label}</div> <div class="col-md-9">{input}{error}{hint}</div>';

?>

<div class="industry-form box box-primary">
    <?php $form = ActiveForm::begin(['options'=>['class'=>'form-horizontal']]); ?>
    <div class="box-body table-responsive">

        <?= $form->field($model, 'i_category_id', [
                'template' => $publicTemplate
        ])->dropDownList(Category::loadDDList()) ?>

        <?= $form->field($model, 'i_title', [
                'template' => $publicTemplate
        ])->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'i_sortOrder', [
                'template' => $publicTemplate
        ])->textInput() ?>

    </div>
    <div class="box-footer">
        <?= Html::submitButton($model->isNewRecord ? '新增' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success btn-flat' : 'btn btn-primary btn-flat']) ?>

    </div>
    <?php ActiveForm::end(); ?>
</div>
