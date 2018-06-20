<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\City */

$this->title = '创建城市';
$this->params['breadcrumbs'][] = ['label' => '城市管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="city-create">

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
