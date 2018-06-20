<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\IndexPic */

$this->title = $model->ip_id;
$this->params['breadcrumbs'][] = ['label' => '首页图片管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="index-pic-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('更新', ['update', 'id' => $model->ip_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->ip_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '确认删除?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ip_id',
            'ip_title',
            [
                'attribute'=>'ip_filePath', 
                'format'=>'raw', 
                'value'=>Html::img(Yii::$app->params['url.resourceBased'].$model->ip_filePath)
            ],
            'ip_link',
            'ip_creationDate',
//             'ip_creationUser_id',
            'ip_updateDate',
//             'ip_updateUser_id',
//             'ip_sortOrder',
        ],
    ]) ?>

</div>
