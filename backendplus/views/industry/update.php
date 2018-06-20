<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Industry */

$this->title = '更新行业: ' . $model->i_title;
$this->params['breadcrumbs'][] = ['label' => '行业管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->i_title, 'url' => ['view', 'id' => $model->i_id]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="industry-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
