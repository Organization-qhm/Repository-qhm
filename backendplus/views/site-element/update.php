<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SiteElement */

$this->title = 'Update Site Element: ' . $model->se_id;
$this->params['breadcrumbs'][] = ['label' => 'Site Elements', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->se_id, 'url' => ['view', 'id' => $model->se_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="site-element-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
