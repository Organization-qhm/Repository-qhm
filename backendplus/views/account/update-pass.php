<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Account */

$this->title = '更新密码: ' . $model->a_title;
$this->params['breadcrumbs'][] = ['label' => '用户管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->a_title, 'url' => ['view', 'id' => $model->a_id]];
$this->params['breadcrumbs'][] = '更新密码';
?>
<div class="account-update">

    <h1><?= Html::encode($this->title) ?></h1>

<div class="account-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'password_change_new')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password_change_new_repeat')->passwordInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton('更新密码', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

</div>
