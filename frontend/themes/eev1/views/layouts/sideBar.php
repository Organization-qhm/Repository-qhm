<?php

use yii\helpers\Url;

?>

<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
		<!-- Sidebar Menu -->
		<ul class="sidebar-menu">
			<li class="header">案件分析</li>
			<li class="<?= \Yii::$app->controller->id == 'client' ? 'active' : ''; ?>"><a href="<?= Url::to(['client/index']); ?>"><i class="fa fa-group"></i> <span>客户库</span></a></li>
			<li class="<?= \Yii::$app->controller->id == 'client-case' ? 'active' : ''; ?>"><a href="<?= Url::to(['client-case/index']); ?>"><i class="fa fa-folder-open"></i> <span>案件库</span></a></li>
			<li class="<?= \Yii::$app->controller->id == 'archive' ? 'active' : ''; ?>"><a href="<?= Url::to(['archive/index']); ?>"><i class="fa fa-suitcase"></i> <span>档案室</span></a></li>
			<li class="<?= \Yii::$app->controller->id == 'k-lib' ? 'active' : ''; ?>"><a href="<?= Url::to(['k-lib/index']); ?>"><i class="fa fa-book"></i> <span>知识库</span></a></li>
			<li class="<?= \Yii::$app->controller->id == 'approval' ? 'active' : ''; ?>"><a href="<?= Url::to(['approval/index']); ?>"><i class="fa fa-eye"></i> <span>审批平台</span></a></li>
			<li class="<?= \Yii::$app->controller->id == 'follow' ? 'active' : ''; ?>"><a href="<?= Url::to(['follow/index']); ?>"><i class="fa fa-balance-scale"></i> <span>跟案平台</span></a></li>
			<li class="<?= \Yii::$app->controller->id == 'execution' ? 'active' : ''; ?>"><a href="<?= Url::to(['execution/index']); ?>"><i class="fa fa-sitemap"></i> <span>执行平台</span></a></li>
			<li class="<?= \Yii::$app->controller->id == 'field' ? 'active' : ''; ?>"><a href="<?= Url::to(['field/index']); ?>"><i class="fa fa-truck"></i> <span>外勤平台</span></a></li>
			<li class="<?= \Yii::$app->controller->id == 'statistics' ? 'active' : ''; ?>"><a href="<?= Url::to(['statistics/index']); ?>"><i class="fa fa-bar-chart"></i> <span>数据统计</span></a></li>
			<li class="header">用户中心</li>
			<li class="<?= \Yii::$app->controller->id == 'user' ? 'active' : ''; ?>"><a href="<?= Url::to(['user/index']); ?>"><i class="fa fa-user-plus"></i> <span>账号管理</span></a></li>
			<li><a href="#"><i class="fa fa-gear"></i> <span>基础设置</span></a></li>
		</ul>
		<!-- /.sidebar-menu -->
	</section>
	<!-- /.sidebar -->
</aside>