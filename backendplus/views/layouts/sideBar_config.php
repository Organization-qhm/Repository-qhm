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
            
            <?php $thisCode = CommonConst::SECODE_PAGE_GET;?>
            <a class="list-group-item list-group-item-info <?=  $code == $thisCode? 'active' : '' ; ?>" href="<?= Url::to(['config/editor', 'code'=>$thisCode]); ?>"><i class="glyphicon glyphicon-chevron-right"></i><?= CommonConst::getName($thisCode, 'SECode'); ?></a>
            
            <?php $thisCode = CommonConst::SECODE_PAGE_ABOUT_INFO;?>
            <a class="list-group-item list-group-item-info <?=  $code == $thisCode? 'active' : '' ; ?>" href="<?= Url::to(['config/editor', 'code'=>$thisCode]); ?>"><i class="glyphicon glyphicon-chevron-right"></i><?= CommonConst::getName($thisCode, 'SECode'); ?></a>
            <?php $thisCode = CommonConst::SECODE_PAGE_ABOUT_CONTACT;?>
            <a class="list-group-item list-group-item-info <?=  $code == $thisCode? 'active' : '' ; ?>" href="<?= Url::to(['config/editor', 'code'=>$thisCode]); ?>"><i class="glyphicon glyphicon-chevron-right"></i><?= CommonConst::getName($thisCode, 'SECode'); ?></a>
            <?php $thisCode = CommonConst::SECODE_PAGE_ABOUT_CERT;?>
            <a class="list-group-item list-group-item-info <?=  $code == $thisCode? 'active' : '' ; ?>" href="<?= Url::to(['config/editor', 'code'=>$thisCode]); ?>"><i class="glyphicon glyphicon-chevron-right"></i><?= CommonConst::getName($thisCode, 'SECode'); ?></a>
            <?php $thisCode = CommonConst::SECODE_PAGE_ABOUT_QNA;?>
            <a class="list-group-item list-group-item-info <?=  $code == $thisCode? 'active' : '' ; ?>" href="<?= Url::to(['config/editor', 'code'=>$thisCode]); ?>"><i class="glyphicon glyphicon-chevron-right"></i><?= CommonConst::getName($thisCode, 'SECode'); ?></a>
            
            <?php $thisCode = CommonConst::SECODE_PAGE_SUPPORT_SERVICE;?>
            <a class="list-group-item list-group-item-info <?=  $code == $thisCode? 'active' : '' ; ?>" href="<?= Url::to(['config/editor', 'code'=>$thisCode]); ?>"><i class="glyphicon glyphicon-chevron-right"></i><?= CommonConst::getName($thisCode, 'SECode'); ?></a>
            <?php $thisCode = CommonConst::SECODE_PAGE_SUPPORT_FOUNDING;?>
            <a class="list-group-item list-group-item-info <?=  $code == $thisCode? 'active' : '' ; ?>" href="<?= Url::to(['config/editor', 'code'=>$thisCode]); ?>"><i class="glyphicon glyphicon-chevron-right"></i><?= CommonConst::getName($thisCode, 'SECode'); ?></a>
            <?php $thisCode = CommonConst::SECODE_PAGE_SUPPORT_WEEK;?>
            <a class="list-group-item list-group-item-info <?=  $code == $thisCode? 'active' : '' ; ?>" href="<?= Url::to(['config/editor', 'code'=>$thisCode]); ?>"><i class="glyphicon glyphicon-chevron-right"></i><?= CommonConst::getName($thisCode, 'SECode'); ?></a>
            <?php $thisCode = CommonConst::SECODE_PAGE_SUPPORT_SUMMIT;?>
            <a class="list-group-item list-group-item-info <?=  $code == $thisCode? 'active' : '' ; ?>" href="<?= Url::to(['config/editor', 'code'=>$thisCode]); ?>"><i class="glyphicon glyphicon-chevron-right"></i><?= CommonConst::getName($thisCode, 'SECode'); ?></a>
            
            <a class="list-group-item list-group-item-success <?=  \Yii::$app->controller->id== 'index-pic' ? 'active' : '' ; ?>" href="<?= Url::to(['index-pic/index']); ?>"><i class="glyphicon glyphicon-chevron-right"></i>首页图片</a>
            <a class="list-group-item list-group-item-success <?=  \Yii::$app->controller->id== 'topic' ? 'active' : '' ; ?>" href="<?= Url::to(['topic/index']); ?>"><i class="glyphicon glyphicon-chevron-right"></i>新闻</a>
            
            <a class="list-group-item list-group-item-warning <?=  \Yii::$app->controller->id== 'jfield' ? 'active' : '' ; ?>" href="<?= Url::to(['jfield/index']); ?>"><i class="glyphicon glyphicon-chevron-right"></i>工作-领域</a>
            <a class="list-group-item list-group-item-warning <?=  \Yii::$app->controller->id== 'jprotect' ? 'active' : '' ; ?>" href="<?= Url::to(['jprotect/index']); ?>"><i class="glyphicon glyphicon-chevron-right"></i>工作-保障</a>
            <a class="list-group-item list-group-item-warning <?=  \Yii::$app->controller->id== 'jskill' ? 'active' : '' ; ?>" href="<?= Url::to(['jskill/index']); ?>"><i class="glyphicon glyphicon-chevron-right"></i>工作-技能</a>
            <a class="list-group-item list-group-item-warning <?=  \Yii::$app->controller->id== 'jlocation' ? 'active' : '' ; ?>" href="<?= Url::to(['jlocation/index']); ?>"><i class="glyphicon glyphicon-chevron-right"></i>工作-地点</a>
            
            <a class="list-group-item list-group-item-info <?=  \Yii::$app->controller->id== 'nfield' ? 'active' : '' ; ?>" href="<?= Url::to(['nfield/index']); ?>"><i class="glyphicon glyphicon-chevron-right"></i>NGO-领域</a>
            
            <a class="list-group-item list-group-item-success hide <?=  \Yii::$app->controller->id== 'msg-sender' ? 'active' : '' ; ?>" href="<?= Url::to(['msg-sender/index']); ?>"><i class="glyphicon glyphicon-chevron-right"></i>系统消息</a>
        </div>