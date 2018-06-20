<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\components\CommonConst;
use common\models\Enterprise;
use yii\widgets\ActiveForm;
use kartik\datetime\DateTimePicker;
use eeTools\common\eeDebug;

/* @var $this yii\web\View */
/* @var $searchModel common\models\AccountSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '用户管理';
$this->params['breadcrumbs'][] = $this->title;


?>
<div class="account-index box box-primary">

    <div class="box-header with-border">
        <?= Html::a('导出Excel', ['output-excel']+Yii::$app->request->getQueryParams(), ['class' => 'btn btn-primary btn-flat', 'target'=>'_blank']) ?>
        <hr/>
        <h3>注册时间范围搜索</h3>
        <?php $form = ActiveForm::begin(['method'=>'get', 'options'=>[]]); ?>
        <div class="row">
        	<div class="col-sm-3">
        	<?= $form->field($searchModel, '_startDate')->widget(DateTimePicker::classname(), [
	'options' => ['placeholder' => '输入开始时间'],
    'type' => DateTimePicker::TYPE_INPUT,
	'pluginOptions' => [
		'autoclose' => true
	]
])->label(false);?>
        	</div>
        	<div class="col-sm-1" style = "text-align: center;">
        	-
        	</div>
        	<div class="col-sm-3">
        	<?= $form->field($searchModel, '_endDate')->widget(DateTimePicker::classname(), [
	'options' => ['placeholder' => '输入结束时间'],
    'type' => DateTimePicker::TYPE_INPUT,
	'pluginOptions' => [
		'autoclose' => true
	]
])->label(false);?>
        	</div>
        	<div class="col-sm-2">
            	<?= Html::submitButton('搜索', ['class' => 'btn btn-primary']) ?>
        	</div>
        </div>
        	
        <?php ActiveForm::end()?>
    </div>

<div class="box-body table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//             ['class' => 'yii\grid\SerialColumn'],

            'a_id',
//             'a_filePath',
            'a_phone',
            'a_title',
//             'a_sexy_id',
//             [
//                 'attribute'=>'a_sexy_id',
//                 'value'=>function ($model) { return CommonConst::getName($model->a_sexy_id, 'Sexy'); },
//                 'filter'=>CommonConst::getSexyList(),
//             ],
//             'a_email:email',
            'a_sourceKeyword',
            [
                'attribute'=>'_searchCount',
                'value'=>function ($model) { return count($model->accountHotwords); },
                'filter'=>false,
            ],
            [
                'attribute'=>'_firstCity',
                'value'=>function ($model) { return @$model->aFirstHotword->ah_city; },
                'filter'=>false,
            ],
            [
                'attribute'=>'_firstIndusty',
                'value'=>function ($model) { return @$model->aFirstHotword->ah_industry; },
                'filter'=>false,
            ],
            [
                'attribute'=>'a_creationDate',
                'value'=>function ($model) { return $model->a_creationDate; },
                'filter'=>false,
            ],
//             'a_lastLoginDate',
            // 'a_creationUser_id',
            // 'a_updateDate',
            // 'a_updateUser_id',
//             [
//                 'attribute'=>'a_isDeleted',
//                 'value'=>function ($model) { return CommonConst::getName($model->a_isDeleted, 'YesNo'); },
//                 'filter'=>CommonConst::getYesNoList(),
//             ],
            // 'a_ttTime:datetime',
            // 'a_ttHour',
//             'a_sortOrder',

            [
                'class' => 'yii\grid\ActionColumn',
                'header'=>'操作',
                'template'=>'{view}',
                'buttons'=>[
                        'update-pass' => function ($url, $model, $key) {
                            return Html::a('[修改密码]', ['account/update-pass', 'id'=>$model->a_id], ['title'=>'修改密码']);
                        },
                        'jobApplyList' => function ($url, $model, $key) {
                            return Html::a('<i class="glyphicon glyphicon-tasks"></i>', ['account-job/account-index', 'id'=>$model->a_id], ['title'=>'服务历史']);
                        },
                ]
                    
            ],
        ],
    ]); ?>
</div>
</div>
