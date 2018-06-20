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

$cityString = '';
foreach (City::loadDDList() as $oneCity){
    if (!empty($cityString)) {
        $cityString .=",";
    }
    $cityString .=" '$oneCity' ";
}

$indString = '';
foreach (Industry::loadDDList() as $oneCategoryTitle => $categoryItems){
    foreach ($categoryItems as $key=>$oneIn){
        if (!empty($indString)) {
            $indString .=",";
        }
        $indString .=" '$oneIn' ";
    }
}




$jsReady = "
    // constructs the suggestion engine
    var citys = [$cityString];
    var citys = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.whitespace,
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        local: citys
    });
    $('#citySearch .typeahead').typeahead({
        hint: true,
        highlight: true,
        minLength: 1
    }, {
        name: 'citys',
        source: citys
    });
    var industry = [$indString];
    var industry = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.whitespace,
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        local: industry
    });
    $('#industrySearch .typeahead').typeahead({
        hint: true,
        highlight: true,
        minLength: 1
    }, {
        name: 'industry',
        source: industry
    });
";

$jsEnd = "
";

$this->registerJs($jsReady, View::POS_READY, 'name-index-ready');
// $this->registerJs($jsEnd, View::POS_END, 'about-end');
$this->registerJsFile('http://cdn.bootcss.com/jquery-weui/1.2.0/js/jquery-weui.min.js', [[View::POS_END]]);
$this->registerJsFile('http://cdn.bootcss.com/typeahead.js/0.11.1/bloodhound.min.js', [[View::POS_END]]);
$this->registerJsFile('http://cdn.bootcss.com/typeahead.js/0.11.1/typeahead.bundle.min.js', [[View::POS_END]]);
// $this->registerJsFile($this->theme->baseUrl.'/js/lib/popcorn.capture.js', [[View::POS_END]]);
//$this->registerJsFile($this->theme->baseUrl.'/js/lib/jquery.dataTables.js', [[View::POS_END]]);
//$this->registerCssFile($this->theme->baseUrl.'/style/lib/jquery.dataTables.css', [[View::POS_HEAD]]);


?>

    <div class="named-warp">
        <div class="container">
            <h3>开公司想不出好名字?企好名为您推荐</h3>
            <div class="name-box">
            	<?php $form = ActiveForm::begin(['options'=>['data-toggle'=>'validator', 'id'=>'eeNameSearch']]); ?>
                    <div class="form-group">
                        <a href="javascript:;" class="open-popup" data-target="#popup-city">
                        <?= Html::activeTextInput($model, 'city', ['class'=>'form-control', 'placeholder'=>'请输入城市，如：北京', 'required'=>true, 'onfocus'=>'this.blur()', 'id'=>'inputCity']); ?>
                            <span class="select-btn">
                                <i class="icon-down"></i>
                            </span>
                        </a>
                    </div>
                    <div class="form-group">
                        <a href="javascript:;" class="open-popup" data-target="#popup-industry">
                        	<?= Html::activeTextInput($model, 'industry', ['class'=>'form-control', 'placeholder'=>'请输入行业，如：科技', 'required'=>true, 'onfocus'=>'this.blur()', 'id'=>'inputIndustry']); ?>
                            <span class="select-btn">
                                <i class="icon-down"></i>
                            </span>
                        </a>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-block">推荐名字</button>
                    </div>
                <?php ActiveForm::end(); ?>
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
        <div class="cell">
            <h3>公司注册流程</h3>
            <img src="<?= $this->theme->baseUrl;?>/pic/pic02.png" class="img-responsive"> </div>
    </div>
    
    
    <!-- Popup -->
    <div id="popup-city" class="weui-popup__container">
        <div class="weui-popup__overlay"></div>
        <div class="weui-popup__modal">
            <div class="popup-header">
                <div class="title">选择城市</div>
                <a href="javascript:;" class='close-popup'>关闭</a>
            </div>
            <div class="search-bar" id="citySearch">
                <div class="search-input">
                    <input class="typeahead" type="text" placeholder="请输入城市..." value=""> </div>
                <a href="javascript:;" class="confirm-btn">确定</a>
            </div>
            <div class="popup-content">
                <div class="ui-city" id="listCity">
                    <div class="ui-city-tit">热门城市</div>
                    <ul class="ui-city-city">
                    	<?php foreach (City::loadDDList() as $oneCity):?>
                            <li class="li-city"><?= $oneCity; ?></li>
                        <?php endforeach;?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div id="popup-industry" class="weui-popup__container">
        <div class="weui-popup__overlay"></div>
        <div class="weui-popup__modal">
            <div class="popup-header">
                <div class="title">选择行业</div>
                <a href="javascript:;" class='close-popup'>关闭</a>
            </div>
            <div class="search-bar" id="industrySearch">
                <div class="search-input">
                    <input class="typeahead" type="text" placeholder="请输入行业..."> </div>
                <a href="javascript:;" class="confirm-btn">确定</a>
            </div>
            <div class="popup-content">
                <div class="ui-city" id="listIndustry">
                            <?php foreach (Industry::loadDDList() as $oneCategoryTitle => $categoryItems):
                                $roundKey = 0;
                            ?>
                                    <div class="ui-city-tit01"><?= $oneCategoryTitle; ?></div>
                                    <div class="ui-city-city01">
                                        <ul>
                                        <?php foreach ($categoryItems as $key=>$oneIn):?>
                                        	<li class="li-city"><?= $oneIn; ?></li>
                                        <?php endforeach; ?>
                                        </ul>
                                    </div>
                                    <div style=" clear:both; background:#fff; height:8px; width:100%;"></div>
                            <?php endforeach;?>

                    <div style=" clear:both"></div>
                </div>
            </div>
        </div>
    </div>