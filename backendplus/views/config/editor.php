<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\components\CommonConst;
use yii\widgets\Menu;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model common\models\SiteElement */
/* @var $dataProvider yii\data\ActiveDataProvider */

$csrfToken = Yii::$app->request->csrfToken;
$csrfParam = Yii::$app->request->csrfParam;

$jsReady = "
tinymce.init({
  selector: '#eeEditor',
  height: 300,
  theme: 'modern',
  plugins: [
    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
    'searchreplace wordcount visualblocks visualchars code fullscreen',
    'insertdatetime media nonbreaking save table contextmenu directionality',
    'emoticons template paste textcolor colorpicker textpattern codesample'
  ],
  relative_urls: false,
  remove_script_host: false,
  toolbar1: 'insertfile undo redo | styleselect | bold italic redTitle basicTable | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent',
  toolbar2: 'removeformat | forecolor backcolor | code | link image',
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
                console.log(obj.location);
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
$this->registerJs($jsReady, View::POS_LOAD, 'about-item-desc-editor-js');


?>

<?php if (Yii::$app->session->getFlash('text-saved')):?>
    <div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      Done.
    </div>
<?php endif;?>
<div class="client-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'se_v6')->textarea(['id' => 'eeEditor', 'rows'=>5]) ?>

    <div class="form-group">
        <?= Html::submitButton('保存', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


<form id="tinyMCE_upload_Form" action="<?= Url::to(['data/upload']); ?>" target="form_target" method="post" enctype="multipart/form-data" style="width:0px;height:0;overflow:hidden">
    <input type="hidden" name="<?= $csrfParam; ?>" value="<?= $csrfToken; ?>">
    <input name="image" type="file" >
</form>
