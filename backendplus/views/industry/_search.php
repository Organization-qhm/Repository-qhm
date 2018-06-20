<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\IndustrySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="industry-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'i_id') ?>

    <?= $form->field($model, 'i_category_id') ?>

    <?= $form->field($model, 'i_title') ?>

    <?= $form->field($model, 'i_desc') ?>

    <?= $form->field($model, 'i_creationDate') ?>

    <?php // echo $form->field($model, 'i_creationUser_id') ?>

    <?php // echo $form->field($model, 'i_updateDate') ?>

    <?php // echo $form->field($model, 'i_updateUser_id') ?>

    <?php // echo $form->field($model, 'i_sortOrder') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
