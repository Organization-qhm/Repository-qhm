<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\components\CommonConst;
use yii\helpers\Url;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model backendplus\models\AdminUser */
/* @var $form yii\widgets\ActiveForm */

$csrfToken = Yii::$app->request->csrfToken;
$csrfParam = Yii::$app->request->csrfParam;


$jsReady = "
tinymce.init({
  selector: '#ee_spIntro',
  height: 300,
  theme: 'modern',
  plugins: [
    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
    'searchreplace wordcount visualblocks visualchars code fullscreen',
    'insertdatetime media nonbreaking save table contextmenu directionality',
    'emoticons template paste textcolor colorpicker textpattern codesample'
  ],
  visual: false,
  menubar:false,
  statusbar: false,
  relative_urls: false,
  remove_script_host: false,
  toolbar1: 'insertfile undo redo | styleselect | bold italic redTitle basicTable | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent',
  toolbar2: 'removeformat | forecolor backcolor | code | link',
  image_advtab: true,
  file_picker_callback: function(callback, value, meta) {
    // Provide file and text for the link dialog
    if (meta.filetype == 'file') {
//       callback('mypage.html', {text: 'My text'});
    }

    // Provide image and alt text for the image dialog
    if (meta.filetype == 'image') {
            //show dialog
            console.log('clicking');
            $('#tinyMCE_upload_Form input').click().change(function(){

            var that = this;

            $('#tinyMCE_upload_Form').ajaxSubmit({

              success:function(r){

                //transform
                var obj = $.parseJSON(r);
//                 console.log(obj.location);
                callback(obj.location, {alt: 'alt text', style: 'display: block; margin-left: auto; margin-right: auto; max-width: 100%; height: auto;'});

                //clear value
                that.value='';
              }, error:function(){

                tinymce.ui.MessageBox.alert('Could not upload file, please try again !');

              }});
            });
    }

    // Provide alternative source and posted for the media dialog
    if (meta.filetype == 'media') {
//       callback('movie.mp4', {source2: 'alt.ogg', poster: 'image.jpg'});
    }
  },
  content_css: [
    '".Url::base()."/assets/tinymce/css/codepen.min.css'
  ]
 });
tinymce.init({
  selector: '#ee_spProof',
  height: 300,
  theme: 'modern',
  plugins: [
    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
    'searchreplace wordcount visualblocks visualchars code fullscreen',
    'insertdatetime media nonbreaking save table contextmenu directionality',
    'emoticons template paste textcolor colorpicker textpattern codesample'
  ],
  visual: false,
  menubar:false,
  statusbar: false,
  relative_urls: false,
  remove_script_host: false,
  toolbar1: 'insertfile undo redo | styleselect | bold italic redTitle basicTable | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent',
  toolbar2: 'removeformat | forecolor backcolor | code | link',
  image_advtab: true,
  file_picker_callback: function(callback, value, meta) {
    // Provide file and text for the link dialog
    if (meta.filetype == 'file') {
//       callback('mypage.html', {text: 'My text'});
    }

    // Provide image and alt text for the image dialog
    if (meta.filetype == 'image') {
            //show dialog
            console.log('clicking');
            $('#tinyMCE_upload_Form input').click().change(function(){

            var that = this;

            $('#tinyMCE_upload_Form').ajaxSubmit({

              success:function(r){

                //transform
                var obj = $.parseJSON(r);
//                 console.log(obj.location);
                callback(obj.location, {alt: 'alt text', style: 'display: block; margin-left: auto; margin-right: auto; max-width: 100%; height: auto;'});

                //clear value
                that.value='';
              }, error:function(){

                tinymce.ui.MessageBox.alert('Could not upload file, please try again !');

              }});
            });
    }

    // Provide alternative source and posted for the media dialog
    if (meta.filetype == 'media') {
//       callback('movie.mp4', {source2: 'alt.ogg', poster: 'image.jpg'});
    }
  },
  content_css: [
    '".Url::base()."/assets/tinymce/css/codepen.min.css'
  ]
 });
";

$jsEnd = "
jsEndContent
";

$this->registerJsFile(Url::base().'/assets/js/jquery.form.min.js', [[View::POS_END]]);
$this->registerJsFile(Url::base().'/assets/tinymce/tinymce.min.js', [[View::POS_END]]);
$this->registerJs($jsReady, View::POS_LOAD, 'sp-update-editor-js');


?>

<div class="admin-user-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?php if ($model->isNewRecord):?>
        <?= $form->field($model, 'u_username')->textInput(['maxlength' => true]) ?>
        
        <?= $form->field($model, 'password_new')->passwordInput() ?>
        
        <?= $form->field($model, 'password_new_repeat')->passwordInput() ?>
    <?php else :?>
        <?= $form->field($model, 'u_username')->textInput(['maxlength' => true, 'disabled' => true]) ?>
        
        <?= $form->field($model, 'password_change_new')->passwordInput() ?>
        
        <?= $form->field($model, 'password_change_new_repeat')->passwordInput() ?>
    <?php endif;?>
    
    <hr/>
    

    <?= $form->field($model, 'u_displayName')->textInput(['maxlength' => true]) ?>
    
    <?php if (!empty($model->u_avatar)):?>
    	<?= Html::img(Yii::$app->params['url.resourceBased'].$model->u_avatar); ?>
    <?php endif;?>
    <?= $form->field($model, 'adminAvatar')->fileInput() ?>
    
    <?= $form->field($model, 'u_companyName')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'u_companyAdd')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'u_companyPos')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'u_email')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'u_weChat')->textInput(['maxlength' => true]) ?>
    
    <?php if (!empty($model->u_wcQR)):?>
    	<?= Html::img(Yii::$app->params['url.resourceBased'].$model->u_wcQR); ?>
        <?= $form->field($model, 'cleanQR')->checkbox() ?>
    <?php endif;?>
    <?= $form->field($model, 'wcQR')->fileInput() ?>
    
    <?= $form->field($model, 'u_qq')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'u_linkedIn')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'u_phone')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'u_tel')->textInput(['maxlength' => true]) ?>
	
	<hr/>
    
    <?= $form->field($model, 'u_introShort')->textarea(['maxlength' => true, 'rows'=>6]) ?>
    <?= $form->field($model, 'u_intro')->textarea(['id'=>'ee_spIntro']) ?>
    
    <?= $form->field($model, 'u_proofShort')->textarea(['maxlength' => true, 'rows'=>6]) ?>
    <?= $form->field($model, 'u_proof')->textarea(['id'=>'ee_spProof']) ?>
    
    <hr/>
    <?= $form->field($model, 'u_actived')->dropDownList(CommonConst::getYesNoList()) ?>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '新增' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<form id="tinyMCE_upload_Form" action="<?= Url::to(['data/upload']); ?>" target="form_target" method="post" enctype="multipart/form-data" style="width:0px;height:0;overflow:hidden">
    <input type="hidden" name="<?= $csrfParam; ?>" value="<?= $csrfToken; ?>">
    <input name="image" type="file" >
</form>
