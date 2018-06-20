<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backendplus\models\AdminUserSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="admin-user-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'u_id') ?>

    <?= $form->field($model, 'u_username') ?>

    <?= $form->field($model, 'u_password') ?>

    <?= $form->field($model, 'u_email') ?>

    <?= $form->field($model, 'u_emailValidated') ?>

    <?php // echo $form->field($model, 'u_sendEmail') ?>

    <?php // echo $form->field($model, 'u_phone') ?>

    <?php // echo $form->field($model, 'u_userSource_id') ?>

    <?php // echo $form->field($model, 'u_authRole_id') ?>

    <?php // echo $form->field($model, 'u_firstName') ?>

    <?php // echo $form->field($model, 'u_lastName') ?>

    <?php // echo $form->field($model, 'u_displayName') ?>

    <?php // echo $form->field($model, 'u_url') ?>

    <?php // echo $form->field($model, 'u_title') ?>

    <?php // echo $form->field($model, 'u_avatar') ?>

    <?php // echo $form->field($model, 'u_appLocale_id') ?>

    <?php // echo $form->field($model, 'u_creationDate') ?>

    <?php // echo $form->field($model, 'u_creationUser_id') ?>

    <?php // echo $form->field($model, 'u_updateDate') ?>

    <?php // echo $form->field($model, 'u_updateUser_id') ?>

    <?php // echo $form->field($model, 'u_lastPassChangeDate') ?>

    <?php // echo $form->field($model, 'u_leftGrabCount') ?>

    <?php // echo $form->field($model, 'u_usedGrabCount') ?>

    <?php // echo $form->field($model, 'u_actived') ?>

    <?php // echo $form->field($model, 'u_deleted') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
