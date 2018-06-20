<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backendplus\models\AdminUser */

$this->title = '新增Admin';
$this->params['breadcrumbs'][] = ['label' => 'Admin管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-user-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
