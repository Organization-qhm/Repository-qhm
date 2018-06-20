<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\components\CommonConst;

/* @var $this yii\web\View */
/* @var $model backendplus\models\AdminUser */
/* @var $form yii\widgets\ActiveForm */

$publicTemplate = '<div class="col-md-3">{label}</div> <div class="col-md-9">{input}{error}{hint}</div>';

?>

<div class="admin-user-form box box-primary">

    <?php $form = ActiveForm::begin(['options'=>['class'=>'form-horizontal', 'enctype'=>'multipart/form-data']]); ?>
    <div class="box-body table-responsive">

    <?php if ($model->isNewRecord):?>
        <?= $form->field($model, 'u_username', [
                'template' => $publicTemplate
        ])->textInput(['maxlength' => true]) ?>
        
        <?= $form->field($model, 'password_new', [
                'template' => $publicTemplate
        ])->passwordInput() ?>
        
        <?= $form->field($model, 'password_new_repeat', [
                'template' => $publicTemplate
        ])->passwordInput() ?>
    <?php else :?>
        <?= $form->field($model, 'u_username', [
                'template' => $publicTemplate
        ])->textInput(['maxlength' => true, 'disabled' => true]) ?>
        
        <?= $form->field($model, 'password_change_new', [
                'template' => $publicTemplate
        ])->passwordInput() ?>
        
        <?= $form->field($model, 'password_change_new_repeat', [
                'template' => $publicTemplate
        ])->passwordInput() ?>
    <?php endif;?>
    

    <?= $form->field($model, 'u_displayName', [
                'template' => $publicTemplate
        ])->textInput(['maxlength' => true]) ?>
    
    
    <?= $form->field($model, 'u_actived', [
                'template' => $publicTemplate
        ])->dropDownList(CommonConst::getYesNoList()) ?>
    
    <?= $form->field($model, 'u_authRole_id', [
                'template' => $publicTemplate
        ])->dropDownList(CommonConst::getAuthList()) ?>


    </div>
    <div class="box-footer">
        <?= Html::submitButton($model->isNewRecord ? '新增' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
