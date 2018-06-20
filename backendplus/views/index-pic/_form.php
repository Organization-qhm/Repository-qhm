<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\IndexPic */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="index-pic-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ip_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'filePath')->fileInput() ?>

    <?= $form->field($model, 'ip_link')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '新建' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
