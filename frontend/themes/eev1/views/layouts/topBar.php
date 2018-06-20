<?php 

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use common\components\CommonConst;

$controllerName = $this->context->id;
$actionName = $this->context->action->id;
$routeName = $controllerName.'/'.$actionName;

?>

<?php if (!in_array($routeName, ['name/view'])):?>
    <div class="header">
        <div class="container">
            <a href="<?= Url::to(['site/index']); ?>" class="logo">
                <img src="<?= $this->theme->baseUrl;?>/images/logo.png"> </a>
            <ul class="header-menu">
                <li <?= in_array($routeName, ['site/index']) ? 'class="active"' : '' ; ?>>
                    <a href="<?= Url::to(['site/index']); ?>">首页</a>
                </li>
                <li <?= in_array($routeName, ['name/index']) ? 'class="active"' : '' ; ?>>
                    <a href="<?= Url::to(['name/index']); ?>">起名</a>
                </li>
                <li>
                    <a class="eeDeving"  href="#">核名</a>
                </li>
                <li>
                    <a class="eeDeving"  href="#">经营范围</a>
                </li>
                <li>
                    <a class="eeDeving"  href="#">工商材料</a>
                </li>
                <li>
                    <a href="<?= Url::to(['site/pa', 'c'=>CommonConst::PAGES_GYWM]); ?>">关于我们</a>
                </li>
                
                <?php if (Yii::$app->user->isGuest):?>
                <li>
                    <a href="#" class="eeLogin">登录</a>
                    <span>|</span>
                    <a href="#" id="goReg">注册</a>
                </li>
                <?php else:?>
                <li>
                	<a href="<?= Url::to(['site/logout']); ?>"><?= Yii::$app->user->identity->a_title; ?><img src="<?= $this->theme->baseUrl;?>/images/icon-quit.png" class="icon-quit">退出</a>
                </li>
                <?php endif;?>
            </ul>
        </div>
    </div>
<?php endif;?>