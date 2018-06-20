<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\AccountSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="account-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'a_id') ?>

    <?= $form->field($model, 'a_filePath') ?>

    <?= $form->field($model, 'a_title') ?>

    <?= $form->field($model, 'a_phone') ?>

    <?= $form->field($model, 'a_email') ?>

    <?php // echo $form->field($model, 'a_enterprise_id') ?>

    <?php // echo $form->field($model, 'a_ngo_id') ?>

    <?php // echo $form->field($model, 'a_creationDate') ?>

    <?php // echo $form->field($model, 'a_creationUser_id') ?>

    <?php // echo $form->field($model, 'a_updateDate') ?>

    <?php // echo $form->field($model, 'a_updateUser_id') ?>

    <?php // echo $form->field($model, 'a_sortOrder') ?>

    <?php // echo $form->field($model, 'a_isDeleted') ?>

    <?php // echo $form->field($model, 'a_ttTime') ?>

    <?php // echo $form->field($model, 'a_ttHour') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
