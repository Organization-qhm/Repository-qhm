<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\SiteElement */

$this->title = $model->se_id;
$this->params['breadcrumbs'][] = ['label' => 'Site Elements', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-element-view box box-primary">
    <div class="box-header">
        <?= Html::a('更新', ['update', 'id' => $model->se_id], ['class' => 'btn btn-primary btn-flat']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->se_id], [
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
                'se_id',
                'se_code',
                'se_v1',
                'se_v2',
                'se_v3',
                'se_v4',
                'se_v5',
                'se_v6',
                'se_uri',
                'se_creationDate',
                'se_creationUser_id',
                'se_updateDate',
                'se_updateUser_id',
                'se_sortOrder',
            ],
        ]) ?>
    </div>
</div>
