<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use yii\helpers\ArrayHelper;

// for cdn refresh
$v = 007;

// login status class
$loginStatusClass = '';
if (! empty ( Yii::$app->user->identity )) {
    $loginStatusClass = 'has-logged';
}

// show inline header
$showInlineHeader = false;
if (! empty ( $this->context->pageTitle )) {
    $showInlineHeader = true;
}

$isGuest = (int)Yii::$app->user->isGuest;
$tmpUrlLogin = Url::to(['site/login', 'btype'=>'wap', 's-back'=>'s-back-wap-alert-login'], true);

if (\Yii::$app->requestedRoute != 'site/login') {
//     echo 'set s-back';
    $backUrl = Url::to(ArrayHelper::merge([\Yii::$app->requestedRoute], \Yii::$app->request->getQueryParams()), true);
    Yii::$app->session->set('s-back-wap-alert-login', $backUrl);
}

$jsReady = "
    function showDevModal(){
//         console.log('1');
        if($isGuest){
            //show login
//             console.log('2');
            window.location.href = '$tmpUrlLogin';
        }else{
            //show deving
            $('#modalTip').modal('show');
        }
    }

    $('.eeDeving').click(showDevModal);
";


$jsReady .= "


";


$this->registerJs($jsReady, View::POS_READY, 'main-layout-ready');

?>

<?php $this->beginPage()?>


<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>

    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    
    <link rel="stylesheet" type="text/css" href="<?= $this->theme->baseUrl;?>/style/lib/slick.min.css">
    
    <title>企好名 - <?= $this->context->pageTitle; ?></title>
    
    <?= Html::csrfMetaTags()?>
    <?php $this->head(); ?>
    
    <link rel="stylesheet" href="<?= $this->theme->baseUrl;?>/style/style.css">
</head>


<body>
	<?= $this->render('topBar'); ?>

	<?= $content; ?>

	<?= $this->render('footerBar'); ?>

	
	<script src="<?= $this->theme->baseUrl;?>/js/lib/jquery.min.js"></script>
	<script src="http://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="<?= $this->theme->baseUrl;?>/js/lib/slick.min.js"></script>
	<script src="<?= $this->theme->baseUrl;?>/js/lib/validator.min.js"></script>
	<script src="<?= $this->theme->baseUrl;?>/js/app.js"></script>
	<?php $this->endBody()?>
	
<?php if (Yii::$app->request->serverName != 'localhost'):?>
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?9ab288ce5455bd90a458648c3df1a785";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>
	
<?php endif;?>

</body>



</html>
<?php $this->endPage() ?>