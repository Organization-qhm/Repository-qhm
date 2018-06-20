<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\IndexPic */

$this->title = '更新首页图片: ' . $model->ip_title;
$this->params['breadcrumbs'][] = ['label' => '首页图片管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ip_title, 'url' => ['view', 'id' => $model->ip_id]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="index-pic-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
