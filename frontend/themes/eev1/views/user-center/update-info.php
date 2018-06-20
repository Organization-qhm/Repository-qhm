<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use common\components\CommonConst;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */

/* @var $model common\models\Account */

$jsReady = "
    $('.areas').cxSelect({
      selects: ['province', 'city', 'district'],
      jsonName: 'name',
      jsonValue: 'value'
    });
";

$jsEnd = "
";

$this->registerJs($jsReady, View::POS_READY, 'uc-update-ready');
// $this->registerJs($jsEnd, View::POS_END, 'about-end');
$this->registerJsFile($this->theme->baseUrl.'/js/lib/jquery.cxselect.min.js', [[View::POS_END]]);
// $this->registerJsFile($this->theme->baseUrl.'/js/lib/popcorn.capture.js', [[View::POS_END]]);
//$this->registerJsFile($this->theme->baseUrl.'/js/lib/jquery.dataTables.js', [[View::POS_END]]);
//$this->registerCssFile($this->theme->baseUrl.'/style/lib/jquery.dataTables.css', [[View::POS_HEAD]]);

// var_dump($accountInfo->errors);

?>

<?php $this->beginContent('@app/views/user-center/user-center-layout.php'); ?>
                            <div class="box">
<?php if (Yii::$app->session->getFlash('web-uc-update-user-info-success')):?>
    <div class="alert alert-success alert-dismissible" role="alert">
      保存成功!
    </div>
<?php endif;?>
<?php if (Yii::$app->session->getFlash('web-first-fill')):?>
    <div class="alert alert-warning alert-dismissible" role="alert">
      新注册帐号，填写基本信息后才可继续!
    </div>
<?php endif;?>
                <div class="apply-warp">
                    <h2>更新信息
                        <small>更新基本信息</small>
                    </h2>
                    <div class="apply-from">
                        <?php $form = ActiveForm::begin(['options'=>['role'=>"form", 'class'=>"form-horizontal form"]]); ?>

                            <div class="form-group">
                                <label class="col-xs-3 control-label">姓名: </label>
                                <div class="col-xs-9">
                                    <?= Html::activeTextInput($model, 'a_title', ['class'=>"form-control", 'disabled'=>true]); ?>
                            	</div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-xs-3 control-label">性别: </label>
                                <div class="col-xs-9">
                                    <?= Html::activeDropDownList($model, 'a_sexy_id', CommonConst::getSexyList(), ['class'=>"form-control", 'disabled'=>true]); ?>
                            	</div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-xs-3 control-label">电话: </label>
                                <div class="col-xs-9">
                                    <?= Html::activeTextInput($model, 'a_phone', ['class'=>"form-control", 'disabled'=>true]); ?>
                            	</div>
                            </div>
                            
                            
                            <?php 
                                $errorClass = '';
                                if (isset($model->errors['a_marriageStatus_id'])) {
                                    $errorClass = 'has-error';
                                }
                            ?>
                            <div class="form-group <?= $errorClass; ?>">
                                <label class="col-xs-3 control-label">婚姻状况: <span style="color:red">*</span></label>
                                <div class="col-xs-9">
                                    <?= Html::activeDropDownList($model, 'a_marriageStatus_id', [null=>'请选择']+CommonConst::getMarriageStatusList(), ['class'=>"form-control"]); ?>
                            	</div>
                            </div>
                            
                            <?php 
                                $errorClass = '';
                                if (isset($model->errors['a_qq'])) {
                                    $errorClass = 'has-error';
                                }
                            ?>
                            <div class="form-group <?= $errorClass; ?>">
                                <label class="col-xs-3 control-label">QQ: </label>
                                <div class="col-xs-9">
                                    <?= Html::activeTextInput($model, 'a_qq', ['class'=>"form-control", 'placeholder'=>'QQ和微信只需填写一个']); ?>
                            	</div>
                            </div>
                            
                            <?php 
                                $errorClass = '';
                                if (isset($model->errors['a_wechat'])) {
                                    $errorClass = 'has-error';
                                }
                            ?>
                            <div class="form-group <?= $errorClass; ?>">
                                <label class="col-xs-3 control-label">微信:
                                <br/>
                                <small>QQ和微信填写一个即可</small> 
                                </label>
                                <div class="col-xs-9">
                                    <?= Html::activeTextInput($model, 'a_wechat', ['class'=>"form-control", 'placeholder'=>'QQ和微信只需填写一个']); ?>
                            	</div>
                            </div>
                            
                            <?php 
                                $errorClass = '';
                                if (isset($model->errors['a_email'])) {
                                    $errorClass = 'has-error';
                                }
                            ?>
                            <div class="form-group <?= $errorClass; ?>">
                                <label class="col-xs-3 control-label">邮箱: <span style="color:red">*</span></label>
                                <div class="col-xs-9">
                                    <?= Html::activeTextInput($model, 'a_email', ['class'=>"form-control"]); ?>
                            	</div>
                            </div>
                            
                            
                            <div class="form-group areas">
                                <label class="col-xs-3 control-label">详细地址: <span style="color:red">*</span></label>
                                    <?php 
                                        $errorClass = '';
                                        if (isset($model->errors['a_province_id'])) {
                                            $errorClass = 'has-error';
                                        }
                                    ?>
                                    <div class="col-sm-3 <?= $errorClass; ?>">
                                      <?= Html::activeDropDownList($model, 'a_province_id', [], ['class'=>"form-control province", 'data-value'=>$model->a_province_id, 'data-query-name'=>'s', 'data-url'=>Url::to(['data/ajax-load-location']) ]); ?>
                                    </div>

                                    <?php 
                                        $errorClass = '';
                                        if (isset($model->errors['a_city_id'])) {
                                            $errorClass = 'has-error';
                                        }
                                    ?>
                                    <div class="col-sm-3 <?= $errorClass; ?>">
                                      <?= Html::activeDropDownList($model, 'a_city_id', [], ['class'=>"form-control city", 'data-value'=>$model->a_city_id, 'data-query-name'=>'s', 'data-url'=>Url::to(['data/ajax-load-location']) ]); ?>
                                    </div>
                                    
                                    <?php 
                                        $errorClass = '';
                                        if (isset($model->errors['a_district_id'])) {
                                            $errorClass = 'has-error';
                                        }
                                    ?>
                                    <div class="col-sm-3 <?= $errorClass; ?>">
                                      <?= Html::activeDropDownList($model, 'a_district_id', [], ['class'=>"form-control district", 'data-value'=>$model->a_district_id, 'data-query-name'=>'s', 'data-url'=>Url::to(['data/ajax-load-location']) ]); ?>
                                    </div>
                            </div>
                            
                            
                            <?php 
                                $errorClass = '';
                                if (isset($model->errors['a_add'])) {
                                    $errorClass = 'has-error';
                                }
                            ?>
                            <div class="form-group <?= $errorClass; ?>">
                                <label class="col-xs-3 control-label"></label>
                                <div class="col-xs-9">
                                    <?= Html::activeTextInput($model, 'a_add', ['class'=>"form-control"]); ?>
                            	</div>
                            </div>

                            <div class="form-group form-btn">
                                <div class="col-xs-offset-3 col-xs-9 text-left">
                                    <button type="submit" class="btn btn-primary">保存</button>
                                </div>
                            </div>
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
                    
<?php $this->endContent(); ?>