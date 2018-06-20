<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Hotword */

$this->title = '更新好名: ' . $model->h_title;
$this->params['breadcrumbs'][] = ['label' => '好名管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->h_title, 'url' => ['view', 'id' => $model->h_id]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="hotword-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
