<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\City */

$this->title = '更新城市 : ' . $model->c_title;
$this->params['breadcrumbs'][] = ['label' => '城市管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->c_title, 'url' => ['view', 'id' => $model->c_id]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="city-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
