<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\components\CommonConst;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\Account */

$this->title = $model->a_title;
$this->params['breadcrumbs'][] = ['label' => '用户管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="account-view box box-primary">

	<div class="box-header">	
		<h3>用户信息</h3>
	</div>
	
	<div class="box-body table-responsive">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'a_id',
            'a_title',
            'a_phone',
            'a_creationDate',
            'a_cityTitle',
//             'a_creationUser_id',
//             'a_updateDate',
//             'a_updateUser_id',
//             'a_sortOrder',
//             [
//                 'attribute'=>'a_isDeleted',
//                 'format'=>'raw',
//                 'value'=>CommonConst::getName($model->a_isDeleted, 'YesNo')
//             ],
        ],
    ]) ?>
    </div>
</div>    
    
<div class="account-view box box-primary">
	<div class="box-header">	
		<h3>用户起名记录</h3>
	</div>

    <div class="box-body table-responsive">
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'layout' => "{items}\n{summary}\n{pager}",
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

//                 'ah_id',
//                 'ah_account_id',
                'ah_city',
                'ah_industry',
//                 'ah_hotword',
                'ah_creationDate',
                // 'ah_creationUser_id',
                // 'ah_updateDate',
                // 'ah_updateUser_id',
                // 'ah_sortOrder',

//                 ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>