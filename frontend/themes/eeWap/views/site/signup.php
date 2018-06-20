<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use common\components\CommonConst;
use yii\widgets\ActiveForm;
use common\models\City;
/* @var $this yii\web\View */
/* @var $model common\models\Account */

$jsReady = "
    // constructs the suggestion engine
    var citys = ['上海', '北京', '广州', '深圳', '杭州', '南京', '西安', '武汉', '成都', '重庆', '合肥', '东莞', '天津', '厦门', '郑州', '青岛', '福州', '昆明', '南昌', '苏州', '福州', '宁波', '大连', '吉林', '长春', '无锡', '长沙', '佛山', '中山', '珠海', '苏州', '泉州', '太原', '沈阳', '温州', '金华', '济南', '青岛', '义乌', '石家庄', '哈尔滨', ];
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
    var industry = ['科技', '电子商务', '信息技术', '游戏', '电子', '软件', '新材料', '生物科技', '教育科技', '投资管理', '金融', '资产', '商业保理', '融资租赁', '医疗器械', '人力资源', '食品', '劳务派遣', '广告', '文化传播', '建筑装潢', '设计', '美容美发', '房地产中介', '物业管理', '商务咨询', '企业管理', '贸易', '实业', '制造', '服饰', '化妆品', '工程', '农业', '餐饮管理', '物流', ];
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

if (!empty($model->errors)) {
    
    if (isset($model->errors['a_phone'])) {
        $jsReady .= "
                $.toast('手机号错误或已注册，请检查！', 3500);
                ";
    }else{
        $jsReady .= "
                $.toast('注册失败，请先检查注册信息！', 3500);
                ";
    }
    
}

$jsEnd = "
";

$this->registerJs($jsReady, View::POS_READY, 'wap-signup-ready');
// $this->registerJs($jsEnd, View::POS_END, 'about-end');
$this->registerJsFile('http://cdn.bootcss.com/jquery-weui/1.2.0/js/jquery-weui.min.js', [[View::POS_END]]);
$this->registerJsFile('http://cdn.bootcss.com/typeahead.js/0.11.1/bloodhound.min.js', [[View::POS_END]]);
$this->registerJsFile('http://cdn.bootcss.com/typeahead.js/0.11.1/typeahead.bundle.min.js', [[View::POS_END]]);
// $this->registerJsFile($this->theme->baseUrl.'/js/lib/popcorn.min.js', [[View::POS_END]]);
// $this->registerJsFile($this->theme->baseUrl.'/js/lib/popcorn.capture.js', [[View::POS_END]]);
//$this->registerJsFile($this->theme->baseUrl.'/js/lib/jquery.dataTables.js', [[View::POS_END]]);
//$this->registerCssFile($this->theme->baseUrl.'/style/lib/jquery.dataTables.css', [[View::POS_HEAD]]);


?>

    <div class="warp">
        <div class="login-warp">
            <div class="login-logo">
                <img src="<?= $this->theme->baseUrl;?>/images/logo.png"> 
            </div>
            <div class="login-form">
                <?php $form = ActiveForm::begin(); ?>
                    <div class="form-group">
                        <img src="<?= $this->theme->baseUrl;?>/images/icon20.png" class="form-icon">
                        <?= Html::activeTextInput($model, 'a_title', ['class'=>"form-control", 'placeholder'=>'请输入您的姓名']); ?>
                    </div>
                    <div class="form-group">
                        <img src="<?= $this->theme->baseUrl;?>/images/icon18.png" class="form-icon">
                        <?= Html::activeTextInput($model, 'a_phone', ['class'=>"form-control", 'placeholder'=>'请输入您的手机号码', 'maxlength'=>11, 'pattern'=>'^1(3|4|5|7|8)[0-9]\d{8}$']); ?>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-block">注册</button>
                    </div>
                    <div class="form-tips text-center">
                        <a href="<?= Url::to(['site/login', 'btype'=>'wap']); ?>">已有账号，点此登录</a>
                    </div>
                    <div class="checkbox text-center">
                        <label>
                            <input type="checkbox" checked=""> 我已阅读并同意
                            <a href="<?= Url::to(['site/pa', 'c'=>CommonConst::PAGES_ZCXZ, 'btype'=>'wap']); ?>">《企好名用户协议》</a>
                        </label>
                    </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
