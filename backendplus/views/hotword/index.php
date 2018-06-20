<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Industry;

/* @var $this yii\web\View */
/* @var $searchModel common\models\HotwordSearch */
/* @var $model common\models\Hotword */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '好名管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hotword-index box box-primary">
    <div class="box-header with-border">
        <?php //Html::a('创建好名', ['create'], ['class' => 'btn btn-success btn-flat hide']) ?>
        
        <?= Html::a('创建好名', ['create-batch'], ['class' => 'btn btn-primary btn-flat']) ?>
        
        <?= Html::a('批量导入', ['import'], ['class' => 'btn btn-primary btn-flat']) ?>
    </div>
    <div class="box-body table-responsive">
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'layout' => "{items}\n{summary}\n{pager}",
            'columns' => [
//                 ['class' => 'yii\grid\SerialColumn'],

                'h_id',
                [
                    'attribute'=>'h_industry_id',
                    'value'=>function ($model) { return $model->hIndustry->i_title; },
                    'filter'=>Industry::loadDDList(),
                    'format'=>'raw',
//                     'headerOptions' => ['width' => 'aaaa'],
                ],
                'h_title',
//                 'h_desc',
//                 'h_creationDate',
                // 'h_creationUser_id',
                // 'h_updateDate',
                // 'h_updateUser_id',
//                 'h_sortOrder',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>
