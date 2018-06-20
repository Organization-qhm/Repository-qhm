<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CategorySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'cat_id') ?>

    <?= $form->field($model, 'cat_title') ?>

    <?= $form->field($model, 'cat_desc') ?>

    <?= $form->field($model, 'cat_creationDate') ?>

    <?= $form->field($model, 'cat_creationUser_id') ?>

    <?php // echo $form->field($model, 'cat_updateDate') ?>

    <?php // echo $form->field($model, 'cat_updateUser_id') ?>

    <?php // echo $form->field($model, 'cat_sortOrder') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
