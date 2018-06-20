<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use common\components\CommonConst;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model frontend\models\LoginForm */

$jsReady = "
    //form validator
    $('#eeWapLogin').validator({
        focus: false
    }).on('submit', function(e) {
        if (e.isDefaultPrevented()) {
            // handle the invalid form...
        } else {
//             e.preventDefault();
        }
    })
        
";
if (isset($model->errors['phone'])) {
    $jsReady .= '$.toast("该号码未注册，请先注册！", 3500);';
}


$jsEnd = "
";

$this->registerJs($jsReady, View::POS_READY, 'wap-login-ready');
// $this->registerJs($jsEnd, View::POS_END, 'about-end');
$this->registerJsFile('http://cdn.bootcss.com/jquery-weui/1.2.0/js/jquery-weui.min.js', [[View::POS_END]]);
// $this->registerJsFile($this->theme->baseUrl.'/js/lib/popcorn.capture.js', [[View::POS_END]]);
//$this->registerJsFile($this->theme->baseUrl.'/js/lib/jquery.dataTables.js', [[View::POS_END]]);
//$this->registerCssFile($this->theme->baseUrl.'/style/lib/jquery.dataTables.css', [[View::POS_HEAD]]);


?>

    <div class="warp">
        <div class="login-warp">
            <div class="login-logo">
                <img src="<?= $this->theme->baseUrl;?>/images/logo.png"> </div>
            <div class="login-form">
            	<?php $form = ActiveForm::begin(['options'=>['id'=>'eeWapLogin']]); ?>
                    <div class="form-group">
                        <img src="<?= $this->theme->baseUrl;?>/images/icon18.png" class="form-icon">
                        <?= Html::activeTextInput($model, 'phone', ['class'=>"form-control", 'placeholder'=>'请输入您的手机号码', 'required'=>true]); ?>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-block">登录</button>
                    </div>
                    <div class="form-tips text-center">
                        <a href="<?= Url::to(['site/signup', 'btype'=>'wap']); ?>">没有账号?立即注册</a>
                    </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
    
