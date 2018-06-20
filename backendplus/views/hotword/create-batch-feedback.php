<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Hotword  */

$this->title = '批量创建结果';
$this->params['breadcrumbs'][] = ['label' => '好名管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => '批量创建好名', 'url' => ['hotword/create-batch']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="hotword-view box box-success">
	<div class="box-header">	
		<h3><?= $this->title; ?></h3>
	</div>

    <div class="box-body table-responsive">
    	成功: <?= $model->_successSavedCnt; ?>
    	重复: <?= $model->_failSavedCnt; ?>
    </div>
</div>
