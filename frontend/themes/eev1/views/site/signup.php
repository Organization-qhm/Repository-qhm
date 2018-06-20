<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use common\components\CommonConst;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model common\models\Account */

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
                <h1>用户注册</h1>
            </div>
            <div class="login-content">
            	<?php $form = ActiveForm::begin(); ?>

                    <div class="form-inputs">
                    	<?php 
                    	   $tmpClass = '';
                    	   if (isset($model->errors['a_phone'])) {
                    	       $tmpClass = 'has-error';
                    	   }
                    	?>
                    
                        <div class="form-item <?= $tmpClass; ?>">
                        	<?= Html::activeTextInput($model, 'a_phone', ['class'=>"form-control", 'placeholder'=>'请输入手机号']); ?>
                        </div>
                        
                    	<?php 
                    	   $tmpClass = '';
                    	   if (isset($model->errors['a_pass'])) {
                    	       $tmpClass = 'has-error';
                    	   }
                    	?>
                    
                        <div class="form-item <?= $tmpClass; ?>">
                        	<?= Html::activePasswordInput($model, 'a_pass', ['class'=>"form-control", 'placeholder'=>'请输入密码']); ?>
                        </div>
                        
                    	<?php 
                    	   $tmpClass = '';
                    	   if (isset($model->errors['a_title'])) {
                    	       $tmpClass = 'has-error';
                    	   }
                    	?>
                    
                        <div class="form-item <?= $tmpClass; ?>">
                        	<?= Html::activeTextInput($model, 'a_title', ['class'=>"form-control", 'placeholder'=>'请输入真实姓名']); ?>
                        </div>
                        
                        <div class="form-group">
                        	<?= Html::activeDropDownList($model, 'a_sexy_id', CommonConst::getSexyList(), ['class'=>"form-control"]); ?>
                        </div>
                    </div>
                    <div class="form-item form-btn">
                        <button type="submit" class="submit-btn">注册</button>
                    </div>
                    <div class="login-tip"><a href="<?= Url::to(['site/login']); ?>">已有账号，请登录</a></div>
                    
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>