<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use common\models\City;
use yii\web\View;

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


//check collection js code for enterprise admin only
$csrfToken = Yii::$app->request->csrfToken;
$csrfParam = Yii::$app->request->csrfParam;

$isGuest = (int)Yii::$app->user->isGuest;

$jsReady = "
    function showDevModal(){
        if($isGuest){
            //show login
            $('#modalLogin').modal('show');
            $('#loginTab a[href=\"#tab02\"]').tab('show');
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


    <!-- modal -->
    <div class="modal fade modal-tip" id="modalTip">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <img src="<?= $this->theme->baseUrl;?>/images/icon16.png">
                    <div class="content">此功能正在建设当中
                        <br> 请各位用户敬请期待</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">我知道了</button>
                </div>
            </div>
        </div>
    </div>
    
    <?= $this->render('loginModal'); ?>
    
</body>



</html>
<?php $this->endPage() ?>