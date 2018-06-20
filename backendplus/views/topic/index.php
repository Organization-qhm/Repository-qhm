<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TopicSeach */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '新闻管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="topic-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('新建新闻', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//             ['class' => 'yii\grid\SerialColumn'],

            't_id',
            't_title',
            't_link',
//             't_coverPic',
//             't_desc:ntext',
            // 't_creationUser_id',
            't_creationDate',
            // 't_updateUser_id',
            // 't_updateDate',
            // 't_sortOrder',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
