<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Topic */

$this->title = $model->t_title;
$this->params['breadcrumbs'][] = ['label' => '新闻管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="topic-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('更新', ['update', 'id' => $model->t_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->t_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '确认删除?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            't_id',
            't_title',
            't_link',
//             't_coverPic',
//             't_desc:ntext',
//             't_creationUser_id',
            't_creationDate',
//             't_updateUser_id',
            't_updateDate',
//             't_sortOrder',
        ],
    ]) ?>

</div>
