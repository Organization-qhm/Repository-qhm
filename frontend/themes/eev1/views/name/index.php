<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use common\components\CommonConst;
use yii\widgets\ActiveForm;
use common\models\City;
use common\models\Industry;
/* @var $this yii\web\View */
/* @var $model frontend\models\NameSearchForm */

$jsReady = "
    $('#nameCheckForm').submit(function() {

        var city = $('#eeSearchCity').val();
        var industry = $('#eeSearchIndustry').val();
        var han = /^[\u4e00-\u9fa5]+$/;
        if (city == '' || city == undefined) {
            alert('请填写要推荐公司名称的区域');
            return false;
        } else {
            if (!han.test(city)) {
                alert('公司区域请填写简体汉字');
                $('#eeSearchCity').focus();
                return false;
            }
        }
        if (industry == '' || industry == undefined) {
            alert('请填写要推荐公司名称的行业类型');
            return false;
        } else {
            if (!han.test(industry)) {
                alert('行业类型请填写简体汉字');
                $('#eeSearchIndustry').focus();
                return false;
            }
        }
    });
        
";

$jsEnd = "
";

$this->registerJs($jsReady, View::POS_READY, 'name-index-ready');
// $this->registerJs($jsEnd, View::POS_END, 'about-end');
// $this->registerJsFile($this->theme->baseUrl.'/js/lib/popcorn.min.js', [[View::POS_END]]);
// $this->registerJsFile($this->theme->baseUrl.'/js/lib/popcorn.capture.js', [[View::POS_END]]);
//$this->registerJsFile($this->theme->baseUrl.'/js/lib/jquery.dataTables.js', [[View::POS_END]]);
//$this->registerCssFile($this->theme->baseUrl.'/style/lib/jquery.dataTables.css', [[View::POS_HEAD]]);

?>

<div class="named-banner" style="background-image: url(<?= $this->theme->baseUrl;?>/pic/banner02.jpg);">
        <div class="container">
            <div class="named-warp">
                <h3>开公司想不出好名字?企好名为您推荐</h3>
                <div class="named-box">
                    <h4>已有10000+企业选择</h4>
                    <?php $form = ActiveForm::begin(['enableClientScript' => false, 'options'=>['class'=>'form-inline', 'data-toggle'=>'validator', 'id'=>'nameCheckForm']]); ?>
                        <div class="form-group input-select">
                        	<?= Html::activeTextInput($model, 'city', ['class'=>'form-control input-select-js', 'id'=>'eeSearchCity', 'placeholder'=>'请输入城市，如：北京', 'required'=>true]); ?>
                            <a class="select-btn">
                                <i class="icon-down"></i>
                            </a>
                            <div class="dropdown-box">
                            	<?php foreach (City::loadDDList() as $oneCity):?>
                                <a href="#"><?= $oneCity; ?></a>
                                <?php endforeach;?>
                            </div>
                        </div>
                        <div class="form-group input-select">
                        	<?= Html::activeTextInput($model, 'industry', ['class'=>'form-control input-select-js', 'id'=>'eeSearchIndustry', 'placeholder'=>'请输入行业，如：科技', 'required'=>true]); ?>
                            <a class="select-btn">
                                <i class="icon-down"></i>
                            </a>
                            <div class="dropdown-box dropdown02">
                            <?php foreach (Industry::loadDDList() as $oneCategoryTitle => $categoryItems):
                                $roundKey = 0;
                            ?>
                                <dl>
                                    <dt><?= $oneCategoryTitle; ?></dt>
                                    <?php foreach ($categoryItems as $key=>$oneIn):
                                        $roundKey ++;
                                    ?>
                                        <?php if ($roundKey != 1):?>
                                        	<span>|</span>
                                        <?php endif;?>
                                        
                                    	<a href="#"><?= $oneIn; ?></a>
                                    <?php endforeach; ?>
                                </dl>
                            <?php endforeach;?>
                            </div>
                        </div>
                        <?php 
                            $tmpClass = '';
                            if (Yii::$app->user->isGuest){
                                $tmpClass = 'eeLogin';
                            }?>
                        	<button type="submit" class="btn btn-primary <?= $tmpClass; ?>">推荐名字</button>
                    <?php ActiveForm::end(); ?>
                </div>
                <h5>如：上海百度科技有限公司，城市是“上海”，行业是“科技”</h5>
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
    </div>