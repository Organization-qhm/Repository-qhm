<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Industry */

$this->title = $model->i_title;
$this->params['breadcrumbs'][] = ['label' => 'Industries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="industry-view box box-primary">
    <div class="box-header">
        <?= Html::a('更新', ['update', 'id' => $model->i_id], ['class' => 'btn btn-primary btn-flat']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->i_id], [
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
                'i_id',
                [
                    'attribute'=>'i_category_id', 
                    'format'=>'raw', 
                    'value'=>$model->iCategory->cat_title
                ],
                'i_title',
//                 'i_desc',
                'i_creationDate',
//                 'i_creationUser_id',
//                 'i_updateDate',
//                 'i_updateUser_id',
                'i_sortOrder',
            ],
        ]) ?>
    </div>
</div>
