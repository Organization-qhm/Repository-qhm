<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use common\components\CommonConst;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model frontend\models\LoginForm */

$jsReady = "
        
        
";

$jsEnd = "
";

// $this->registerJs($jsReady, View::POS_READY, 'about-ready');
// $this->registerJs($jsEnd, View::POS_END, 'about-end');
// $this->registerJsFile($this->theme->baseUrl.'/js/lib/popcorn.min.js', [[View::POS_END]]);
// $this->registerJsFile($this->theme->baseUrl.'/js/lib/popcorn.capture.js', [[View::POS_END]]);
//$this->registerJsFile($this->theme->baseUrl.'/js/lib/jquery.dataTables.js', [[View::POS_END]]);
//$this->registerCssFile($this->theme->baseUrl.'/style/lib/jquery.dataTables.css', [[View::POS_HEAD]]);


?>

    <div class="login-warp">
        <div class="login-form shadow">
            <div class="login-head">
                <h1>用户登录PC</h1>
            </div>
            <div class="login-content">
            	<?php $form = ActiveForm::begin(); ?>

                    <div class="form-inputs">
                    	<?php 
                    	   $tmpClass = '';
                    	   if (isset($model->errors['phone'])) {
                    	       $tmpClass = 'has-error';
                    	   }
                    	?>
                    
                        <div class="form-item <?= $tmpClass; ?>">
                        	<?= Html::activeTextInput($model, 'phone', ['class'=>"form-control", 'placeholder'=>'请输入手机号']); ?>
                        </div>
                        
                    	<?php 
                    	   $tmpClass = '';
                    	   if (isset($model->errors['pass'])) {
                    	       $tmpClass = 'has-error';
                    	   }
                    	?>
                    
                        <div class="form-item <?= $tmpClass; ?>">
                        	<?= Html::activePasswordInput($model, 'pass', ['class'=>"form-control", 'placeholder'=>'请输入密码']); ?>
                        </div>
                        
                    </div>
                    <div class="form-item form-btn">
                        <button type="submit" class="submit-btn">登 录</button>
                    </div>
                    <div class="login-tip">
                    	<a href="javascript:;" class="pull-left">忘记密码</a>
                    	<a  class="pull-right" href="<?= Url::to(['site/signup']); ?>">还没有账号，立即注册</a>
                	</div>
                    
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>