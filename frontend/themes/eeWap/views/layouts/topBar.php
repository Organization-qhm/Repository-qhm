<?php 

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

$controllerName = $this->context->id;
$actionName = $this->context->action->id;
$routeName = $controllerName.'/'.$actionName;

$pageNameArr ['site/login'] = '登录'; 
$pageNameArr ['site/signup'] = '注册'; 

?>


    <div class="header">
        <a href="<?= Url::to(['site/index', 'btype'=>'wap']); ?>" class="">
            <i class="icon icon-home"></i>
        </a>
        <?php if (in_array(Yii::$app->requestedRoute, ['site/login', 'site/signup'])) :?>
        	<div class="page-name"> <?= $pageNameArr[Yii::$app->requestedRoute]; ?> </div>
        <?php else:?>
            <a href="<?= Url::to(['site/index', 'btype'=>'wap']); ?>">
                <img src="<?= $this->theme->baseUrl;?>/images/logo.png" class="logo"> 
            </a>
        <?php endif;?>
            
    </div>
