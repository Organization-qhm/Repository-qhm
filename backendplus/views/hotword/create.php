<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Hotword */

$this->title = '创建好名';
$this->params['breadcrumbs'][] = ['label' => '好名管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hotword-create">

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
