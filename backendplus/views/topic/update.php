<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Topic */

$this->title = '更新新闻: ' . $model->t_title;
$this->params['breadcrumbs'][] = ['label' => '新闻管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->t_title, 'url' => ['view', 'id' => $model->t_id]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="topic-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
