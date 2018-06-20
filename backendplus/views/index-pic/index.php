<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\IndexPicSeach */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '首页图片管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="index-pic-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('新建首页图片', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//             ['class' => 'yii\grid\SerialColumn'],

            'ip_id',
            'ip_title',
//             'ip_filePath',
            'ip_link',
            'ip_creationDate',
            // 'ip_creationUser_id',
            // 'ip_updateDate',
            // 'ip_updateUser_id',
            // 'ip_sortOrder',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
