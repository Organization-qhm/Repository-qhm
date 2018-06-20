<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\City */

$this->title = $model->c_title;
$this->params['breadcrumbs'][] = ['label' => '城市管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="city-view box box-primary">
    <div class="box-header">
        <?= Html::a('更新', ['update', 'id' => $model->c_id], ['class' => 'btn btn-primary btn-flat']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->c_id], [
            'class' => 'btn btn-danger btn-flat',
            'data' => [
                'confirm' => '确认删除?',
                'method' => 'post',
            ],
        ]) ?>
    </div>
    <div class="box-body table-responsive no-padding">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'c_id',
                'c_title',
//                 'c_desc',
                'c_creationDate',
//                 'c_creationUser_id',
                'c_updateDate',
//                 'c_updateUser_id',
                'c_sortOrder',
            ],
        ]) ?>
    </div>
</div>
