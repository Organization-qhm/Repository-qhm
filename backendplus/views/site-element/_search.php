<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\SiteElementSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="site-element-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'se_id') ?>

    <?= $form->field($model, 'se_code') ?>

    <?= $form->field($model, 'se_v1') ?>

    <?= $form->field($model, 'se_v2') ?>

    <?= $form->field($model, 'se_v3') ?>

    <?php // echo $form->field($model, 'se_v4') ?>

    <?php // echo $form->field($model, 'se_v5') ?>

    <?php // echo $form->field($model, 'se_v6') ?>

    <?php // echo $form->field($model, 'se_uri') ?>

    <?php // echo $form->field($model, 'se_creationDate') ?>

    <?php // echo $form->field($model, 'se_creationUser_id') ?>

    <?php // echo $form->field($model, 'se_updateDate') ?>

    <?php // echo $form->field($model, 'se_updateUser_id') ?>

    <?php // echo $form->field($model, 'se_sortOrder') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
