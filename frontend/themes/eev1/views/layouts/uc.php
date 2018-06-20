<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;

?>



<div class="container">
	<div class="box-warp">
		<div class="uc-left">
			<div class="uc-avatar">
				<img
					src="<?= Yii::$app->params['url.resourceBased'].Yii::$app->user->identity->au_avatar;?>">
			</div>
			<ul class="uc-menu">
				<li
					<?= $this->context->action->id == 'setting' ? 'class="active"' : ''; ?>><a
					href="<?= Url::to(['user-center/setting']); ?>">账号设置</a></li>
				<li
					<?= $this->context->action->id == 'order' ? 'class="active"' : ''; ?>><a
					href="<?= Url::to(['user-center/order']); ?>">个人订单</a></li>
				<li
					<?= $this->context->action->id == 'message' ? 'class="active"' : ''; ?>><a
					href="<?= Url::to(['user-center/message']); ?>">个人消息</a></li>
				<li><a href="<?= Url::to(['site/logout']); ?>">退出登录</a></li>
			</ul>
		</div>
		<div class="uc-right">
        <?= $content;?>
        </div>
	</div>
</div>