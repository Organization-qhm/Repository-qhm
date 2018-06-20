<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Account */

$this->title = '更新用户: ' . $model->a_title;
$this->params['breadcrumbs'][] = ['label' => '用户管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->a_title, 'url' => ['view', 'id' => $model->a_id]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="account-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
