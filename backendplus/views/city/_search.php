<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CitySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="city-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'c_id') ?>

    <?= $form->field($model, 'c_title') ?>

    <?= $form->field($model, 'c_desc') ?>

    <?= $form->field($model, 'c_creationDate') ?>

    <?= $form->field($model, 'c_creationUser_id') ?>

    <?php // echo $form->field($model, 'c_updateDate') ?>

    <?php // echo $form->field($model, 'c_updateUser_id') ?>

    <?php // echo $form->field($model, 'c_sortOrder') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
