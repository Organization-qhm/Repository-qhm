<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="login-box">
  <div class="login-logo">
    <a href="<?= Url::to(['site/index']); ?>"><b>企好名管理后台</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
<!--     <p class="login-box-msg">从这里登录</p> -->

	<?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
	
	
	<?= $form->field($model, 'username', [
                'template' => '
      <div class="form-group has-feedback">
        {input}{hint}
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
		        '
        ])->textInput(['autofocus' => true]) ?>
        
	<?= $form->field($model, 'password', [
                'template' => '
      <div class="form-group has-feedback">
        {input}{hint}
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
		        '
        ])->passwordInput() ?>


      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
          <?= $form->field($model, 'rememberMe')->checkbox() ?>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">登录</button>
        </div>
        <!-- /.col -->
      </div>
    <?php ActiveForm::end(); ?>

    <div class="social-auth-links text-center hide">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    </div>
    <!-- /.social-auth-links -->

    <a class=" hide" href="#">I forgot my password</a><br>
    <a class=" hide" href="register.html" class="text-center">Register a new membership</a>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->