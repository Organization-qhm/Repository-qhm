<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\IndexPic */

$this->title = '新建首页图片';
$this->params['breadcrumbs'][] = ['label' => '首页图片管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="index-pic-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
