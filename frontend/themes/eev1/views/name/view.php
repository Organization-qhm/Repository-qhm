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

$this->registerJs($jsReady, View::POS_READY, 'name-view-ready');
// $this->registerJs($jsEnd, View::POS_END, 'about-end');
// $this->registerJsFile($this->theme->baseUrl.'/js/lib/popcorn.min.js', [[View::POS_END]]);
// $this->registerJsFile($this->theme->baseUrl.'/js/lib/popcorn.capture.js', [[View::POS_END]]);
//$this->registerJsFile($this->theme->baseUrl.'/js/lib/jquery.dataTables.js', [[View::POS_END]]);
//$this->registerCssFile($this->theme->baseUrl.'/style/lib/jquery.dataTables.css', [[View::POS_HEAD]]);


?>

    <div class="header">
        <div class="container">
            <a href="<?= Url::to(['site/index']); ?>" class="logo">
                <img src="<?= $this->theme->baseUrl;?>/images/logo.png"> </a>
			<?php $form = ActiveForm::begin(['enableClientScript' => false, 'action'=>Url::to(['name/index']), 'options'=>['class'=>'form-inline header-form', 'id'=>'nameCheckForm']]); ?>
                <div class="form-group input-select">
                	<?= Html::activeTextInput($model, 'city', ['class'=>'input-select-null-js form-control input01', 'id'=>'eeSearchCity', 'placeholder'=>'请输入城市，如：北京']); ?>
                     <div class="dropdown-box dropdown01">
                    	<?php foreach (City::loadDDList() as $oneCity):?>
                            <a href="#"><?= $oneCity; ?></a>
                        <?php endforeach;?>
					</div>
                </div>
                <div class="form-group input-select">
                	<?= Html::activeTextInput($model, 'industry', ['class'=>'input-select-null-js form-control input02', 'id'=>'eeSearchIndustry', 'placeholder'=>'请输入行业，如：科技']); ?>
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
                <button type="submit" class="btn btn-primary">推荐名字</button>
            <?php ActiveForm::end(); ?>
        </div>
    </div>

    <div class="warp">
        <div class="container">
            <div class="name-detail">
                <div class="clearfix">
                    <a href="<?= Url::to(['site/index']); ?>" class="pull-right back-home">
                        <img src="<?= $this->theme->baseUrl;?>/images/icon11.png">返回首页</a>
                </div>
                <table class="table table-striped text-center">
                    <thead>
                        <tr>
                            <th>推荐公司名字</th>
                            <th>注册通过率</th>
                            <th>推荐公司名字</th>
                            <th>注册通过率</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                        <?php foreach ($model->hotwords as $key=>$oneHW):?>
                            <?php if ($key % 2  == 0):?>
                            <tr>
                            <?php endif;?>
                                <td><?= $model->city; ?><b><?= $oneHW; ?></b><?= $model->industry; ?>有限公司</td>
                                <td>
                                    <img src="<?= $this->theme->baseUrl;?>/images/icon<?= mt_rand(12, 13); ?>.png"> </td>
                            <?php if ($key % 2  == 1):?>
		                        </tr>
                            <?php endif;?>
                        <?php endforeach;?>
                        
                        
                    </tbody>
                </table>
                <div class="text-center">
                    <a href="#" onclick="location.reload()" class="btn replace-btn">
                        <img src="<?= $this->theme->baseUrl;?>/images/icon14.png">换一批</a>
                </div>
            </div>
        </div>
    </div>