<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CitySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '城市管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="city-index box box-primary">
    <div class="box-header with-border">
        <?= Html::a('创建城市', ['create'], ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <div class="box-body table-responsive">
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'layout' => "{items}\n{summary}\n{pager}",
            'columns' => [
//                 ['class' => 'yii\grid\SerialColumn'],

                'c_id',
                'c_title',
//                 'c_desc',
//                 'c_creationDate',
//                 'c_creationUser_id',
                // 'c_updateDate',
                // 'c_updateUser_id',
                'c_sortOrder',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>
