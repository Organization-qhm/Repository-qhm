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
            
            <a class="list-group-item list-group-item-success <?=  \Yii::$app->controller->action->id== 'index' ? 'active' : '' ; ?>" href="<?= Url::to(['statistics/index']); ?>"><i class="glyphicon glyphicon-chevron-right"></i>全局统计</a>
            <a class="list-group-item list-group-item-success <?=  \Yii::$app->controller->action->id== 'job' ? 'active' : '' ; ?>" href="<?= Url::to(['statistics/job']); ?>"><i class="glyphicon glyphicon-chevron-right"></i>岗位统计</a>
            <a class="list-group-item list-group-item-success <?=  \Yii::$app->controller->action->id== 'user' ? 'active' : '' ; ?>" href="<?= Url::to(['statistics/user']); ?>"><i class="glyphicon glyphicon-chevron-right"></i>用户统计</a>
            
        </div>