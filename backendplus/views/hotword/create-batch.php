<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Industry;


/* @var $this yii\web\View */
/* @var $model common\models\Hotword */

$this->title = '批量创建好名';
$this->params['breadcrumbs'][] = ['label' => '好名管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$publicTemplate = '<div class="col-md-3">{label}</div> <div class="col-md-9">{input}{error}{hint}</div>';

?>
<div class="hotword-create">

<div class="hotword-form box box-primary">
    <?php $form = ActiveForm::begin(['options'=>['class'=>'form-horizontal']]); ?>
    <div class="box-body table-responsive">

        <?= $form->field($model, 'h_industry_id', [
                'template' => $publicTemplate
        ])->dropDownList(Industry::loadDDList()) ?>

        <?= $form->field($model, 'h_title', [
                'template' => $publicTemplate
        ])->textInput(['maxlength' => true, 'placeholder'=>'支持多个关键词, 例如 关键词1, 关键词2, 关键词3']) ?>

    </div>
    <div class="box-footer">
        <?= Html::submitButton('新增', ['class' => 'btn btn-primary btn-flat']) ?>

    </div>
    <?php ActiveForm::end(); ?>
</div>

</div>
