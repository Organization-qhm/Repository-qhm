<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Hotword */

$this->title = $model->h_title;
$this->params['breadcrumbs'][] = ['label' => '好名管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hotword-view box box-primary">
    <div class="box-header">
        <?= Html::a('更新', ['update', 'id' => $model->h_id], ['class' => 'btn btn-primary btn-flat']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->h_id], [
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
                'h_id',
                [
                    'attribute'=>'h_industry_id', 
                    'format'=>'raw', 
                    'value'=>$model->hIndustry->i_title
                ],
                'h_title',
//                 'h_desc',
//                 'h_creationDate',
//                 'h_creationUser_id',
//                 'h_updateDate',
//                 'h_updateUser_id',
//                 'h_sortOrder',
            ],
        ]) ?>
    </div>
</div>
