<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;
use common\models\City;
use yii\web\View;
use common\components\CommonConst;



//check collection js code for enterprise admin only
$csrfToken = Yii::$app->request->csrfToken;
$csrfParam = Yii::$app->request->csrfParam;

$url_ajaxLogin = Url::to(['data/ajax-login'], true);
$url_ajaxSignup = Url::to(['data/ajax-signup'], true);

$jsReady = "
    $('.eeLogin').click(function() {
        $('#modalLogin').modal('show');
        $('#loginTab a[href=\"#tab02\"]').tab('show');
        return false;
    })
        
    
    //init
    $('.eeTips').hide();
    //login
    $('#formLogin').validator({
        focus: false
    }).on('submit', function(e) {
        if (e.isDefaultPrevented()) {
            // handle the invalid form...
        } else {
            //hide all
            $('.eeTips').hide();
        
            var tmpPhone = $('#eeLogin-input-phone').val();

            //get phone number and send ajax call
            $.ajax({
                type     :'POST',
                cache    : false,
                url  : '$url_ajaxLogin',
                data  : {phone: tmpPhone, $csrfParam: '$csrfToken'},
                dataType  : 'json',
                success  : function(response) {
                    // success code
//                     console.log(response);
                    //9680101 - phone wrong or not exist
                    //9680110 - success refresh
//                     console.log(response.code);
                    
                    // show error as feedback
                    if(response.code == '9680101'){
                        //show signup tab
                        $('#loginTab a[href=\"#tab01\"]').tab('show');
                        
                        //auto set phone no. and show tip
                        $('#eeSignup-input-phone').val(tmpPhone);
                        $('#eeSignup-tip-noreg').show();
                        
                        return false;
                    }
                    
                    //reload to show already login
                    if(response.code == '9680110'){
                        location.reload();
                    }
                }
           })
            
            e.preventDefault();
        }
    })
    
    
    //signup
    $('#formSignup').validator({
        focus: false
    }).on('submit', function(e) {
        if (e.isDefaultPrevented()) {
            // handle the invalid form...
        } else {
            //hide all
            $('.eeTips').hide();
        
            var tmpCity = $('#eeSignup-input-city').val();
            var tmpName = $('#eeSignup-input-name').val();
            var tmpPhone = $('#eeSignup-input-phone').val();

            //get phone number and send ajax call
            $.ajax({
                type     :'POST',
                cache    : false,
                url  : '$url_ajaxSignup',
                data  : {
                    city: tmpCity, 
                    name: tmpName, 
                    phone: tmpPhone, 
                    $csrfParam: '$csrfToken'
                },
                dataType  : 'json',
                success  : function(response) {
                    // success code
//                     console.log(response);
                    //9680201 - phone wrong or not exist
                    //9680210 - success refresh
//                     console.log(response.code);
                    
                    // show error as feedback
                    if(response.code == '9680202'){
                        //show login tab
                        $('#loginTab a[href=\"#tab02\"]').tab('show');
                        
                        //auto set phone no. and show tip
                        $('#eeLogin-input-phone').val(tmpPhone);
                        $('#eeLogin-tip-exist').show();
                        
                        return false;
                    }
                    // show error as feedback
                    if(response.code == '9680201'){
                        $('#eeSignup-tip-wrong').show();
                    }
                    
                    //reload to show already login
                    if(response.code == '9680210'){
                        location.reload();
                    }
                }
           })
            
            e.preventDefault();
        }
    })

";


$jsReady .= "
            

";


$this->registerJs($jsReady, View::POS_READY, 'main-layout-loginmodal-ready');

?>

    
    <div class="modal fade modal-login" id="modalLogin">
        <div class="modal-dialog">
            <div class="modal-content">
                <a href="" data-dismiss="modal" class="modal-close">
                    <img src="<?= $this->theme->baseUrl;?>/images/icon17.png"> </a>
                <div class="modal-body">
                    <div role="tabpanel" id="loginTab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#tab01" aria-controls="tab01" role="tab" data-toggle="tab">注册</a>
                            </li>
                            <li role="presentation">
                                <a href="#tab02" aria-controls="tab02" role="tab" data-toggle="tab">登录</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="tab01">
                            	<form role="form" data-toggle="validator" id="formSignup">
                                    <div class="form-group">
                                        <img src="<?= $this->theme->baseUrl;?>/images/icon20.png">
                                        <input type="text" name=""  id="eeSignup-input-name"  class="form-control" placeholder="请输入您的姓名" required> </div>
                                    <div class="form-group">
                                        <img src="<?= $this->theme->baseUrl;?>/images/icon18.png">
                                        <input type="phone" name=""  id="eeSignup-input-phone"  class="form-control" placeholder="请输入您的手机号码" pattern="^1(3|4|5|7|8)[0-9]\d{8}$"  required> </div>
                                    <div class="form-tip clearfix">
                                        <span class="pull-left eeTips" id="eeSignup-tip-exist">您已经是我们的用户了</span>
                                        <span class="pull-left eeTips" id="eeSignup-tip-wrong">填写数据错误</span>
                                        <span class="pull-left eeTips" id="eeSignup-tip-noreg">该号码未注册</span>
                                        <span class="pull-right">
                                            <a href="#" id="goTab02">立即登录</a>
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-block">注册</button>
                                    </div>
                                    
                                    
                                    <div class="checkbox text-center">
                                        <label>
                                            <input type="checkbox" checked="" required> 我已阅读并同意
                                            <a href="<?= Url::to(['site/pa', 'c'=>CommonConst::PAGES_ZCXZ]); ?>" target="_blank">《企好名用户协议》</a>
                                        </label>
                                    </div>
                                </form>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="tab02">
                                <form role="form" data-toggle="validator" id="formLogin">
                                    <div class="form-group">
                                        <img src="<?= $this->theme->baseUrl;?>/images/icon18.png">
                                        <input type="phone" name="" id="eeLogin-input-phone" class="form-control" placeholder="请输入您的手机号码" required> </div>
                                    <div class="form-tip clearfix">
                                        <span class="pull-left eeTips" id="eeLogin-tip-noreg">该号码未注册</span>
                                        <span class="pull-left eeTips" id="eeLogin-tip-exist">该号码已注册，请直接登录</span>
                                        <span class="pull-right">
                                            <a href="" id="goTab01">立即注册</a>
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-block">登录</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>