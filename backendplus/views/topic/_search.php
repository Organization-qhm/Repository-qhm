<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TopicSeach */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="topic-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 't_id') ?>

    <?= $form->field($model, 't_title') ?>

    <?= $form->field($model, 't_link') ?>

    <?= $form->field($model, 't_coverPic') ?>

    <?= $form->field($model, 't_desc') ?>

    <?php // echo $form->field($model, 't_creationUser_id') ?>

    <?php // echo $form->field($model, 't_creationDate') ?>

    <?php // echo $form->field($model, 't_updateUser_id') ?>

    <?php // echo $form->field($model, 't_updateDate') ?>

    <?php // echo $form->field($model, 't_sortOrder') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
