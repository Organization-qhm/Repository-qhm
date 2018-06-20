<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\IndexPicSeach */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="index-pic-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ip_id') ?>

    <?= $form->field($model, 'ip_title') ?>

    <?= $form->field($model, 'ip_filePath') ?>

    <?= $form->field($model, 'ip_link') ?>

    <?= $form->field($model, 'ip_creationDate') ?>

    <?php // echo $form->field($model, 'ip_creationUser_id') ?>

    <?php // echo $form->field($model, 'ip_updateDate') ?>

    <?php // echo $form->field($model, 'ip_updateUser_id') ?>

    <?php // echo $form->field($model, 'ip_sortOrder') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
