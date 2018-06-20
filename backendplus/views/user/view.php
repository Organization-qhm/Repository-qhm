<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\components\CommonConst;

/* @var $this yii\web\View */
/* @var $model backendplus\models\AdminUser */

$this->title = $model->u_id;
$this->params['breadcrumbs'][] = ['label' => '管理SP', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('SP管理', ['update', 'id' => $model->u_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('技能', ['update-skill', 'u_id' => $model->u_id], ['class' => 'btn btn-success']) ?>
        <?= Html::a('城市', ['update-location', 'u_id' => $model->u_id], ['class' => 'btn btn-success']) ?>
        <?= Html::a('项目', ['user-project/index', 'u_id' => $model->u_id], ['class' => 'btn btn-success']) ?>
        <?= Html::a('评论', ['user-comment/index', 'u_id' => $model->u_id], ['class' => 'btn btn-success']) ?>
        <?= Html::a('留言', ['user-msg/index', 'u_id' => $model->u_id], ['class' => 'btn btn-success']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'u_id',
            'u_username',
            'u_displayName',
//             'u_email:email',
//             'u_phone',
//             'u_qq',
            [
                'attribute'=>'u_actived', 
                'value'=>CommonConst::getName($model->u_actived, 'YesNo')
            ],
            'u_creationDate',
            'u_updateDate',
        ],
    ]) ?>

</div>
