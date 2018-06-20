
<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use common\components\CommonConst;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */

/* @var $account common\models\Account */

$jsReady = "
        
";

$jsEnd = "
";

// $this->registerJs($jsReady, View::POS_READY, 'vt-apply-ready');
// $this->registerJs($jsEnd, View::POS_END, 'about-end');
// $this->registerJsFile($this->theme->baseUrl.'/js/lib/popcorn.min.js', [[View::POS_END]]);
// $this->registerJsFile($this->theme->baseUrl.'/js/lib/popcorn.capture.js', [[View::POS_END]]);
//$this->registerJsFile($this->theme->baseUrl.'/js/lib/jquery.dataTables.js', [[View::POS_END]]);
//$this->registerCssFile($this->theme->baseUrl.'/style/lib/jquery.dataTables.css', [[View::POS_HEAD]]);

// var_dump($accountInfo->errors);

$account = Yii::$app->user->identity; 

?>

    <div class="main-wrap uc-warp">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="box user-box">
                        <div class="box-content">
                            <div class="avt"><img class="hide" src="/pic/avt-default.png" alt=""></div>
                            <div class="name"><?= $account->a_title; ?></div>
                            <div class="user-tags hide">
                                <span class="tag">资助人</span>
                            </div>
                            <ul class="contact-info">
                                <li><span>电话:</span><?= $account->a_phone; ?></li>
                                <li><span>邮箱:</span><?= $account->a_email; ?></li>
                                <li><span>QQ :</span><?= $account->a_qq; ?></li>
                            </ul>
                        </div>
                        <div class="btn-groups">
                            <a href="<?= Url::to(['user-center/update-info']); ?>" class="btn">编辑资料</a>
                            <a href="<?= Url::to(['site/logout']); ?>" class="btn">退出登录</a>
                        </div>
                    </div>
                    <div class="uc-menu">
                        <dl>
                            <dd class="active hide"><a href="#">资助学生列表</a></dd>
                            <dd><a href="<?= Url::to(['volunteer-teach/apply', 'vtr_id'=>4]); ?>">我要支教</a></dd>
                            <dd><a href="<?= Url::to(['user-center/my-vt']); ?>">我的支教</a></dd>
                        </dl>
                    </div>
                </div>
                <div class="col-md-9">
                	<?= $content; ?>
                </div>
            </div>
        </div>
    </div>