<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Category */

$this->title = $model->cat_id;
$this->params['breadcrumbs'][] = ['label' => '分类管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-view box box-primary">
    <div class="box-header">
        <?= Html::a('更新', ['update', 'id' => $model->cat_id], ['class' => 'btn btn-primary btn-flat']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->cat_id], [
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
                'cat_id',
                'cat_title',
//                 'cat_desc',
                'cat_creationDate',
//                 'cat_creationUser_id',
//                 'cat_updateDate',
//                 'cat_updateUser_id',
                'cat_sortOrder',
            ],
        ]) ?>
    </div>
</div>
