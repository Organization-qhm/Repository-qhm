<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Industry */

$this->title = 'Create Industry';
$this->params['breadcrumbs'][] = ['label' => 'Industries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="industry-create">

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
