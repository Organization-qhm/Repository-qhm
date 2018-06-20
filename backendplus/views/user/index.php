<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\components\CommonConst;

/* @var $this yii\web\View */
/* @var $searchModel backendplus\models\AdminUserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'SP管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <br/>

	<?php if ($isAdmin):?>
    <p>
        <?= Html::a('新增SP', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('留言管理', ['user-msg/index'], ['class' => 'btn btn-primary']) ?>
    </p>
	<?php endif;?>
    <br/>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//             'u_id',
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
            // 'u_authRole_id',
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
            // 'u_actived',
            // 'u_deleted',

            [
                'class' => 'yii\grid\ActionColumn',
                'header'=>'操作',
                'template'=>'{view} {update} {userSkill} {userLocation} {userProject} {userComment} {userMsg}',
                'buttons'=>[
                    'userSkill' => function ($url, $model, $key) {
                        return Html::a('[技能]', ['update-skill', 'u_id'=>$model->u_id], ['title'=>'技能']);
                    },
                    'userLocation' => function ($url, $model, $key) {
                        return Html::a('[城市]', ['update-location', 'u_id'=>$model->u_id], ['title'=>'城市']);
                    },
                    'userProject' => function ($url, $model, $key) {
                        return Html::a('[项目]', ['user-project/index', 'u_id'=>$model->u_id], ['title'=>'项目列表']);
                    },
                    'userComment' => function ($url, $model, $key) {
                        return Html::a('[评论]', ['user-comment/index', 'u_id'=>$model->u_id], ['title'=>'评论列表']);
                    },
                    'userMsg' => function ($url, $model, $key) {
                        return Html::a('[留言]', ['user-msg/index', 'u_id'=>$model->u_id], ['title'=>'留言列表']);
                    },
                ]
                    
            ],
        ],
    ]); ?>
</div>
