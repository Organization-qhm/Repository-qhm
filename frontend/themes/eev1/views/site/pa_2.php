<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use common\components\CommonConst;
/* @var $this yii\web\View */
/* @var $model common\models\Page */
/* @var $onePI common\models\PageItem */

$jsReady = "
        
        
";

$jsEnd = "
";

// $this->registerJs($jsReady, View::POS_READY, 'about-ready');
// $this->registerJs($jsEnd, View::POS_END, 'about-end');
// $this->registerJsFile($this->theme->baseUrl.'/js/lib/popcorn.min.js', [[View::POS_END]]);
// $this->registerJsFile($this->theme->baseUrl.'/js/lib/popcorn.capture.js', [[View::POS_END]]);
//$this->registerJsFile($this->theme->baseUrl.'/js/lib/jquery.dataTables.js', [[View::POS_END]]);
//$this->registerCssFile($this->theme->baseUrl.'/style/lib/jquery.dataTables.css', [[View::POS_HEAD]]);


?>

    <div class="index-banner" style="background-image: url(<?= $this->theme->baseUrl;?>/pic/banner03.jpg);">
        <div class="container"> </div>
    </div>
    <div class="warp">
        <div class="cell">
            <div class="container">
                <h3>关于我们</h3>
                <div class="about-intro">
                    <img src="<?= $this->theme->baseUrl;?>/pic/pic03.png">
                    <div class="intro-text">
                        <h4>公司介绍
                            <em>company introduction</em>
                        </h4>
                        <p>创业的第一步，就是给公司起一个好名字。但往往冥思苦想出 一个好名字却经常遇到被工商驳回的情况。都说创业就是在和 时间赛跑，怎能在起步就被拖慢脚步呢？企好名，帮助创业者 快速起名、核名，高效地迈出第一步。</p>
                        <p>企好名隶属于北京才穗获客广告有限公司，平台通过大数据分 析，结合工商注册命名规范，实现了在线推荐公司起名和在线 核名功能。为了给创业者提供更全面的企业服务，企好名还为 创业者提供工商注册、代理记账、知识产权、各地优惠政策等 服务对接，助力创业加速。</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="cell has-bg">
            <div class="container">
                <h3>联系我们</h3>
                <table class="contact-cell">
                    <tbody>
                        <tr>
                            <td>
                                <img src="<?= $this->theme->baseUrl;?>/images/icon24.png">
                                <h4>公司地址</h4>
                                <p>北京市东城区
                                    <br> 银河SOHO D座11层51110</p>
                            </td>
                            <td>
                                <img src="<?= $this->theme->baseUrl;?>/images/icon25.png">
                                <h4>公司网址</h4>
                                <p>http://www.51qhm.com</p>
                            </td>
                            <td>
                                <img src="<?= $this->theme->baseUrl;?>/images/icon26.png">
                                <h4>商务合作</h4>
                                <p>13691046860</p>
                            </td>
                            <td>
                                <img src="<?= $this->theme->baseUrl;?>/images/icon27.png">
                                <h4>资讯电话</h4>
                                <p>400-096-9191</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>