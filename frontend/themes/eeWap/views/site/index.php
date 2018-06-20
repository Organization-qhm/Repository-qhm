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

    <div class="index-banner">
        <a href="<?= Url::to(['name/view', 'btype'=>'wap']); ?>">
            <img src="<?= $this->theme->baseUrl;?>/pic/banner01.png" alt=""> </a>
        <a href='#' class="eeDeving">
            <img src="<?= $this->theme->baseUrl;?>/pic/banner02.png" alt=""> </a>
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
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <div class="note-item">
                            <img src="<?= $this->theme->baseUrl;?>/images/icon04.png">
                            <h4>不能触犯驰名商标</h4>
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <div class="note-item">
                            <img src="<?= $this->theme->baseUrl;?>/images/icon05.png">
                            <h4>不能与知名公司名字混淆</h4>
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <div class="note-item">
                            <img src="<?= $this->theme->baseUrl;?>/images/icon06.png">
                            <h4>尽量不用地区名称及简称</h4>
                        </div>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-xs-3">
                        <div class="note-item">
                            <img src="<?= $this->theme->baseUrl;?>/images/icon07.png">
                            <h4>不使用繁体、数字、英文</h4>
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <div class="note-item">
                            <img src="<?= $this->theme->baseUrl;?>/images/icon08.png">
                            <h4>不能使用行业通用词汇</h4>
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <div class="note-item">
                            <img src="<?= $this->theme->baseUrl;?>/images/icon09.png">
                            <h4>不能使用名人字号</h4>
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <div class="note-item">
                            <img src="<?= $this->theme->baseUrl;?>/images/icon10.png">
                            <h4>不能带有宗教色彩</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="cell feature-cell">
            <div class="container">
                <h3>起一个好名字是创业成功的第一步</h3>
                <p class="sub-title">结合工商命名规则，通过大数据库计算比对</p>
                <div class="row">
                    <div class="col-xs-4">
                        <div class="feature-item">
                            <img src="<?= $this->theme->baseUrl;?>/images/icon23.png">
                            <h4>极速推荐</h4>
                            <p>1秒内
                                <br>极速批量推荐好名</p>
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <div class="feature-item">
                            <img src="<?= $this->theme->baseUrl;?>/images/icon24.png">
                            <h4>好听易记</h4>
                            <p>方便记忆
                                <br>利于品牌推广 </p>
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <div class="feature-item">
                            <img src="<?= $this->theme->baseUrl;?>/images/icon25.png">
                            <h4>通过率高</h4>
                            <p>预测好名通过率
                                <br>推荐更多好名 </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
