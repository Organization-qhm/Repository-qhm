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

<?php if (Yii::$app->session->getFlash('text-saved')):?>
    <div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      Done.
    </div>
<?php endif;?>
<div class="client-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'se_v4')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<div>
<?php if ($model->se_code == CommonConst::SECODE_SFAPILOGINPASS):?>
	if Login Password = 123, Security Token = 456, then value = 123456
<?php endif;?>
</div>