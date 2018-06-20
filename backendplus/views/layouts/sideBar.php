<?php 

use yii\web\View;
use yii\helpers\Url;
use common\components\CommonConst;

$css = '
.list-group .glyphicon {
    float: right;
}
        ';
$this->registerCss($css, [[View::POS_HEAD]]);

$code = Yii::$app->request->getQueryParam('code');
?>
        <div class="list-group">
            <a class="list-group-item list-group-item-success <?=  \Yii::$app->controller->action->id== 'contact-basic'? 'active' : '' ; ?>" href="<?= Url::to(['config/contact-basic']); ?>"><i class="glyphicon glyphicon-chevron-right"></i>Contact (Basic)</a>
            <a class="list-group-item list-group-item-success <?=  \Yii::$app->controller->id== 'contact-page-item' ? 'active' : '' ; ?>" href="<?= Url::to(['contact-page-item/contact-phone']); ?>"><i class="glyphicon glyphicon-chevron-right"></i>Contact (Phone)</a>
            <a class="list-group-item list-group-item-success <?=  \Yii::$app->controller->action->id== 'about-basic'? 'active' : '' ; ?>" href="<?= Url::to(['config/about-basic']); ?>"><i class="glyphicon glyphicon-chevron-right"></i>About (Basic)</a>
            <a class="list-group-item list-group-item-success <?=  \Yii::$app->controller->id== 'about-page-item'||\Yii::$app->controller->id== 'about-page-item-media' ? 'active' : '' ; ?>" href="<?= Url::to(['about-page-item/about']); ?>"><i class="glyphicon glyphicon-chevron-right"></i>About (Item)</a>
            
            <?php $thisCode = CommonConst::SECODE_PENDINGBG;?>
            <a class="list-group-item list-group-item-info <?=  $code == $thisCode? 'active' : '' ; ?>" href="<?= Url::to(['config/pic', 'code'=>$thisCode]); ?>"><i class="glyphicon glyphicon-chevron-right"></i><?= CommonConst::getName($thisCode, 'SECode'); ?></a>
            <?php $thisCode = CommonConst::SECODE_USERINFOBG;?>
            <a class="list-group-item list-group-item-info <?=  $code == $thisCode? 'active' : '' ; ?>" href="<?= Url::to(['config/pic', 'code'=>$thisCode]); ?>"><i class="glyphicon glyphicon-chevron-right"></i><?= CommonConst::getName($thisCode, 'SECode'); ?></a>
            
            
            <?php $thisCode = CommonConst::SECODE_VSUCESS;?>
            <a class="list-group-item list-group-item-info <?=  $code == $thisCode? 'active' : '' ; ?>" href="<?= Url::to(['config/text', 'code'=>$thisCode]); ?>"><i class="glyphicon glyphicon-chevron-right"></i><?= CommonConst::getName($thisCode, 'SECode'); ?></a>
            <?php $thisCode = CommonConst::SECODE_VDENIED;?>
            <a class="list-group-item list-group-item-info <?=  $code == $thisCode? 'active' : '' ; ?>" href="<?= Url::to(['config/text', 'code'=>$thisCode]); ?>"><i class="glyphicon glyphicon-chevron-right"></i><?= CommonConst::getName($thisCode, 'SECode'); ?></a>
            <?php $thisCode = CommonConst::SECODE_USUCESS;?>
            <a class="list-group-item list-group-item-info <?=  $code == $thisCode? 'active' : '' ; ?>" href="<?= Url::to(['config/text', 'code'=>$thisCode]); ?>"><i class="glyphicon glyphicon-chevron-right"></i><?= CommonConst::getName($thisCode, 'SECode'); ?></a>
            <?php $thisCode = CommonConst::SECODE_UDENIED;?>
            <a class="list-group-item list-group-item-info <?=  $code == $thisCode? 'active' : '' ; ?>" href="<?= Url::to(['config/text', 'code'=>$thisCode]); ?>"><i class="glyphicon glyphicon-chevron-right"></i><?= CommonConst::getName($thisCode, 'SECode'); ?></a>
            <?php $thisCode = CommonConst::SECODE_WELCOMEMSG;?>
            <a class="list-group-item list-group-item-info <?=  $code == $thisCode? 'active' : '' ; ?>" href="<?= Url::to(['config/text', 'code'=>$thisCode]); ?>"><i class="glyphicon glyphicon-chevron-right"></i><?= CommonConst::getName($thisCode, 'SECode'); ?></a>
            <?php $thisCode = CommonConst::SECODE_AUTOREPLYMSG;?>
            <a class="list-group-item list-group-item-info <?=  $code == $thisCode? 'active' : '' ; ?>" href="<?= Url::to(['config/text', 'code'=>$thisCode]); ?>"><i class="glyphicon glyphicon-chevron-right"></i><?= CommonConst::getName($thisCode, 'SECode'); ?></a>
            <?php $thisCode = CommonConst::SECODE_NOKFONLINE;?>
            <a class="list-group-item list-group-item-info <?=  $code == $thisCode? 'active' : '' ; ?>" href="<?= Url::to(['config/text', 'code'=>$thisCode]); ?>"><i class="glyphicon glyphicon-chevron-right"></i><?= CommonConst::getName($thisCode, 'SECode'); ?></a>
            
            <?php $thisCode = CommonConst::SECODE_SFAPILOGINPASS;?>
            <a class="list-group-item list-group-item-danger <?=  $code == $thisCode? 'active' : '' ; ?>" href="<?= Url::to(['config/input', 'code'=>$thisCode]); ?>"><i class="glyphicon glyphicon-chevron-right"></i><?= CommonConst::getName($thisCode, 'SECode'); ?></a>
            <a class="list-group-item list-group-item-danger <?=  \Yii::$app->controller->action->id== 'sync-list'? 'active' : '' ; ?>" href="<?= Url::to(['config/sync-list']); ?>"><i class="glyphicon glyphicon-chevron-right"></i>Sync State&Site List</a>
            <a class="list-group-item list-group-item-danger <?=  \Yii::$app->controller->action->id== 'sync-site'? 'active' : '' ; ?>" href="<?= Url::to(['config/sync-site']); ?>"><i class="glyphicon glyphicon-chevron-right"></i>Sync Site Level Data</a>
        </div>