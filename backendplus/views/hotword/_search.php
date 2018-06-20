<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\HotwordSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hotword-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'h_id') ?>

    <?= $form->field($model, 'h_industry_id') ?>

    <?= $form->field($model, 'h_title') ?>

    <?= $form->field($model, 'h_desc') ?>

    <?= $form->field($model, 'h_creationDate') ?>

    <?php // echo $form->field($model, 'h_creationUser_id') ?>

    <?php // echo $form->field($model, 'h_updateDate') ?>

    <?php // echo $form->field($model, 'h_updateUser_id') ?>

    <?php // echo $form->field($model, 'h_sortOrder') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
