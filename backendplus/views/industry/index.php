<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Category;

/* @var $this yii\web\View */
/* @var $searchModel common\models\IndustrySearch */
/* @var $model common\models\Industry */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '行业管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="industry-index box box-primary">
    <div class="box-header with-border">
        <?= Html::a('创建行业', ['create'], ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <div class="box-body table-responsive">
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'layout' => "{items}\n{summary}\n{pager}",
            'columns' => [
//                 ['class' => 'yii\grid\SerialColumn'],

                'i_id',
                [
                    'attribute'=>'i_category_id',
                    'value'=>function ($model) { return $model->iCategory->cat_title; },
                    'filter'=>Category::loadDDList(),
                    'format'=>'raw',
//                     'headerOptions' => ['width' => 'aaaa'],
                ],
                'i_title',
//                 'i_desc',
//                 'i_creationDate',
                // 'i_creationUser_id',
                // 'i_updateDate',
                // 'i_updateUser_id',
                'i_sortOrder',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>
