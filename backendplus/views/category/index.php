<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '分类管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index box box-primary">
    <div class="box-header with-border">
        <?= Html::a('创建分类', ['create'], ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <div class="box-body table-responsive">
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'layout' => "{items}\n{summary}\n{pager}",
            'columns' => [
//                 ['class' => 'yii\grid\SerialColumn'],

                'cat_id',
                'cat_title',
//                 'cat_desc',
//                 'cat_creationDate',
//                 'cat_creationUser_id',
                // 'cat_updateDate',
                // 'cat_updateUser_id',
                'cat_sortOrder',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>
