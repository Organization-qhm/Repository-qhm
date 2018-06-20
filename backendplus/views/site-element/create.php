<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\SiteElement */

$this->title = 'Create Site Element';
$this->params['breadcrumbs'][] = ['label' => 'Site Elements', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-element-create">

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
