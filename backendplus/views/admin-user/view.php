<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\components\CommonConst;

/* @var $this yii\web\View */
/* @var $model backendplus\models\AdminUser */

$this->title = $model->u_id;
$this->params['breadcrumbs'][] = ['label' => '管理Admin', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-user-view box box-primary">

    <div class="box-header">
        <?= Html::a('更新', ['update', 'id' => $model->u_id], ['class' => 'btn btn-primary']) ?>
    </div>

	<div class="box-body table-responsive no-padding">
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

</div>
