<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SiteElementSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Site Elements';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-element-index box box-primary">
    <div class="box-header with-border">
        <?= Html::a('Create Site Element', ['create'], ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <div class="box-body table-responsive">
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'layout' => "{items}\n{summary}\n{pager}",
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'se_id',
                'se_code',
                'se_v1',
                'se_v2',
                'se_v3',
                // 'se_v4',
                // 'se_v5',
                // 'se_v6',
                // 'se_uri',
                // 'se_creationDate',
                // 'se_creationUser_id',
                // 'se_updateDate',
                // 'se_updateUser_id',
                // 'se_sortOrder',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>
