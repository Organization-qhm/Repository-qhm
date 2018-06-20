<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backendplus\models\AdminUser */

$this->title = '更新: ' . $model->u_displayName;
$this->params['breadcrumbs'][] = ['label' => 'SP管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="admin-user-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'isAdmin' => $isAdmin,
    ]) ?>

</div>
