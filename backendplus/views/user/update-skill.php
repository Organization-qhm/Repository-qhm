<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Skill;

/* @var $this yii\web\View */
/* @var $model backendplus\models\AdminUser */

$this->title = '更新技能: ' . $model->u_displayName;
$this->params['breadcrumbs'][] = ['label' => 'SP管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = '更新技能';

?>

<?php if (Yii::$app->session->getFlash('update-skill-saved')):?>
    <div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      保存成功!
    </div>
<?php endif;?>

<div class="admin-user-update">

    <h1><?= Html::encode($this->title) ?></h1>

<div class="admin-user-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'u_skill')->checkboxList(Skill::loadSkillList(0)) ?>

    <div class="form-group">
        <?= Html::submitButton('保存', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

</div>
