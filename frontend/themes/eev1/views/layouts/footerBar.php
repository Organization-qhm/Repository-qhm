<?php 

use yii\helpers\Html;
use yii\helpers\Url;
use eeTools\common\eeDate;
use common\components\CommonConst;

?>
    <div class="footer">
        <div class="container">
            <div class="link">
                <strong>数据来源：</strong>
                <a href="">国家知识产权局</a>
                <a href="">商标局</a>
                <a href="">版权局</a>
                <a href="">全国企业信用信息公示系统</a>
                <a href="<?= Url::to(['site/pa', 'c'=>CommonConst::PAGES_GYWM]); ?>">关于我们</a>
                <a href="">起名问答</a>
                <a href="">起名百科</a>
            </div>
            <hr> Copyright © 2017-<?= date('Y'); ?> 北京才穗获客广告有限公司 
            <a href="" target="_blank">京ICP备18012622号-2</a>
            客服热线：400-096-9191 </div>
    </div>