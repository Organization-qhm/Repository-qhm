<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model eeTools\common\eeExcel  */

$this->title = '批量导入';
$this->params['breadcrumbs'][] = ['label' => '好名管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$publicTemplate = '<div class="col-md-3">{label}</div> <div class="col-md-9">{input}{error}{hint}</div>';

?>
<div class="hotword-view box box-primary">
	<div class="box-header">	
		<h3>上传导入文件</h3>
		<small>上传导入文件</small>
	</div>

    <div class="box-body table-responsive">
        <?php $form = ActiveForm::begin(['options'=>['class'=>'form-horizontal']]); ?>
        <div class="box-body table-responsive">
    
            <?= $form->field($model, 'importFile', [
                    'template' => $publicTemplate
            ])->fileInput() ?>

        </div>
        <div class="box-footer">
            <?= Html::submitButton('导入', ['class' => 'btn btn-primary btn-flat']) ?>
            <br>
            <p> <?= Html::a('下载Demo文件', '../../assets/files/hotword_import_lm969.csv'); ?></p>
    
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>

<?php if (Yii::$app->session->getFlash('b-hotword-imported')):?>
<div class="hotword-view box box-success">
	<div class="box-header">	
		<h3>导入结果</h3>
	</div>

    <div class="box-body table-responsive">
    	成功: <?= Yii::$app->session->getFlash('b-hotword-imported-success'); ?>
    	重复: <?= Yii::$app->session->getFlash('b-hotword-imported-fail'); ?>
    </div>
</div>
<?php endif;?>
