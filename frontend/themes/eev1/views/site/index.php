<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use common\components\CommonConst;
use yii\widgets\ActiveForm;
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

    <div class="index-banner" style="background-image: url(<?= $this->theme->baseUrl;?>/pic/banner01.jpg);">
        <div class="container">
            <div class="banner-item"> 
                <a href="<?= Url::to(['name/index']); ?>">
                    <div class="banner-item-img">
                        <img src="<?= $this->theme->baseUrl;?>/images/icon01.png" class="img">
                        <img src="<?= $this->theme->baseUrl;?>/images/banner-item.png" class="bg"> </div>
                    <div class="num">
                        <span>8</span>
                        <span>9</span>
                        <span>1</span>
                        <span>0</span>
                        <span>0</span>
                        <span>6</span>
                        <span>6</span>
                    </div>
                    <p>人在使用</p>
                    <span class="btn">我要起名</span>
                </a>
            </div>
            <div class="banner-item">
                <a class="eeDeving"  href="#">
                    <div class="banner-item-img">
                        <img src="<?= $this->theme->baseUrl;?>/images/icon02.png" class="img">
                        <img src="<?= $this->theme->baseUrl;?>/images/banner-item.png" class="bg"> </div>
                    <div class="num">
                        <span>4</span>
                        <span>7</span>
                        <span>9</span>
                        <span>6</span>
                        <span>5</span>
                        <span>1</span>
                        <span>3</span>
                    </div>
                    <p>人在使用</p>
                    <span class="btn">我要核名</span>
                </a>
            </div>
        </div>
    </div>
    <div class="warp">
        <div class="cell">
            <div class="container">
                <h3>公司起名，需要注意哪些事项？</h3>
                <div class="row text-center">
                    <div class="col-xs-3">
                        <div class="note-item">
                            <img src="<?= $this->theme->baseUrl;?>/images/icon03.png">
                            <h4>不能重名</h4>
                            <p>相同或相似行业存在重名公司，不能注册。如“企好名网络科技”与“企好名信息科技”算重名。</p>
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <div class="note-item">
                            <img src="<?= $this->theme->baseUrl;?>/images/icon04.png">
                            <h4>不能触犯驰名商标</h4>
                            <p>如“万达”是驰名商标， 不能注册为公司名字。</p>
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <div class="note-item">
                            <img src="<?= $this->theme->baseUrl;?>/images/icon05.png">
                            <h4>不能与知名公司名字混淆</h4>
                            <p>如“新微软”、“微软之家”等 不能注册为公司名字。</p>
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <div class="note-item">
                            <img src="<?= $this->theme->baseUrl;?>/images/icon06.png">
                            <h4>尽量不用地区名称及简称</h4>
                            <p>如“上海”、“兰州”、“沪”等、 不能注册为公司名字。</p>
                        </div>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-xs-3">
                        <div class="note-item">
                            <img src="<?= $this->theme->baseUrl;?>/images/icon07.png">
                            <h4>不能使用繁体、数字、英文</h4>
                            <p>公司名称只能使用简体中文。</p>
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <div class="note-item">
                            <img src="<?= $this->theme->baseUrl;?>/images/icon08.png">
                            <h4>不能使用行业通用词汇</h4>
                            <p>如“上海电脑科技有限公司” 不能注册为公司名字。</p>
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <div class="note-item">
                            <img src="<?= $this->theme->baseUrl;?>/images/icon09.png">
                            <h4>不能使用名人字号</h4>
                            <p>如“马云”、“王健林”等 不能注册为公司名字。</p>
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <div class="note-item">
                            <img src="<?= $this->theme->baseUrl;?>/images/icon10.png">
                            <h4>不能带有宗教色彩</h4>
                            <p>如“伊斯兰”等 不能注册为公司名字。</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="cell has-bg">
            <div class="container">
                <h3>起一个好名字是创业成功的第一步</h3>
                <p class="sub-title">结合工商命名规则，通过大数据库计算比对</p>
                <div class="row">
                    <div class="col-xs-4">
                        <div class="feature-item">
                            <img src="<?= $this->theme->baseUrl;?>/images/icon21.png">
                            <h4>极速推荐</h4>
                            <p>1秒内
                                <br>极速批量推荐好名</p>
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <div class="feature-item">
                            <img src="<?= $this->theme->baseUrl;?>/images/icon22.png">
                            <h4>好听易记</h4>
                            <p>方便记忆
                                <br>利于品牌推广 </p>
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <div class="feature-item">
                            <img src="<?= $this->theme->baseUrl;?>/images/icon23.png">
                            <h4>通过率高</h4>
                            <p>预测好名通过率
                                <br>推荐更多好名 </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>