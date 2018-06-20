<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;


?>

<?php $this->beginPage()?>


<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="renderer" content="webkit">
    
    <title><?= $this->context->pageTitle; ?> - 元甲</title>
    
    <?= Html::csrfMetaTags()?>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet"
    	href="<?= $this->theme->baseUrl;?>/bin/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet"
    	href="<?= $this->theme->baseUrl;?>/bin/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet"
    	href="<?= $this->theme->baseUrl;?>/bin/ionicons/css/ionicons.min.css">
    <link rel="stylesheet"
    	href="<?= $this->theme->baseUrl;?>/dist/css/skins/skin-red.min.css">
    <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="http://cdn.bootcss.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php $this->head(); ?>
    <!-- Theme style -->
    <link rel="stylesheet"
    	href="<?= $this->theme->baseUrl;?>/dist/css/AdminLTE.min.css">
</head>


<body>
    <?php $this->beginBody()?>
    
    <?= $content; ?>

	<!-- REQUIRED JS SCRIPTS -->
	<!-- jQuery 2.2.3 -->
	<script
		src="<?= $this->theme->baseUrl;?>/plugins/jQuery/jquery-2.2.3.min.js"></script>
	<!-- Bootstrap 3.3.6 -->
	<script
		src="<?= $this->theme->baseUrl;?>/bin/bootstrap/js/bootstrap.min.js"></script>
	<!-- SlimScroll -->
	<script
		src="<?= $this->theme->baseUrl;?>/plugins/slimScroll/jquery.slimscroll.min.js"></script>
	<!-- FastClick -->
	<script
		src="<?= $this->theme->baseUrl;?>/plugins/fastclick/fastclick.js"></script>
	<!-- AdminLTE App -->
	<script src="<?= $this->theme->baseUrl;?>/dist/js/app.js"></script>
	<!-- page script -->
	
	<?php $this->endBody()?>
</body>

</html>
<?php $this->endPage() ?>