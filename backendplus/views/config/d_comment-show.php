<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\components\CommonConst;
use yii\widgets\Menu;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use eeTools\common\eeDebug;

/* @var $this yii\web\View */
/* @var $model common\models\SiteElement */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>

<?php if (Yii::$app->session->getFlash('saved-config-comment-show')):?>
    <div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      已保存.
    </div>
<?php endif;?>
<div class="client-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'se_v2')->dropDownList(CommonConst::getYesNoList()) ?>

    <div class="form-group">
        <?= Html::submitButton('保存', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>