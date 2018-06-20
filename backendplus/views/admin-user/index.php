<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\components\CommonConst;

/* @var $this yii\web\View */
/* @var $searchModel backendplus\models\AdminUserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Admin管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-user-index box box-primary">

    <div class="box-header with-border">
        <?= Html::a('新增Admin', ['create'], ['class' => 'btn btn-success']) ?>
    </div>
    
<div class="box-body table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//             ['class' => 'yii\grid\SerialColumn'],

            'u_id',
            'u_username',
//             'u_password',
            'u_displayName',
//             'u_email:email',
//             'u_phone',
//             'u_qq',
//             'u_weChat',

//             'u_emailValidated:email',
            // 'u_sendEmail:email',
            // 'u_userSource_id',
            [
                'attribute'=>'u_authRole_id',
                'value'=>function ($model) { return CommonConst::getName($model->u_authRole_id, 'Auth'); },
                'filter'=>CommonConst::getAuthList(),
                'format'=>'raw',
//                 'headerOptions' => ['width' => 'aaaa'],
            ],
            // 'u_firstName',
            // 'u_lastName',
            // 'u_url:url',
            // 'u_title',
            // 'u_avatar',
            // 'u_appLocale_id',
            // 'u_creationDate',
            // 'u_creationUser_id',
            // 'u_updateDate',
            // 'u_updateUser_id',
            // 'u_lastPassChangeDate',
            // 'u_leftGrabCount',
            // 'u_usedGrabCount',
            [
                'attribute'=>'u_actived',
                'value'=>function ($model) { return CommonConst::getName($model->u_actived, 'YesNo'); },
                'filter'=>CommonConst::getYesNoList(),
                'format'=>'raw',
//                 'headerOptions' => ['width' => 'aaaa'],
            ],
            // 'u_deleted',

            ['class' => 'yii\grid\ActionColumn', 'header'=>'操作', 'template'=>'{update}'],
        ],
    ]); ?>
</div>
</div>
