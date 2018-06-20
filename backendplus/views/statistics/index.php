<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\components\CommonConst;

/* @var $this yii\web\View */
/* @var $searchModel common\models\AccountTimeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $model common\models\AccountTime */

$this->title = '全局统计';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="account-time-index">

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
  </div>
  <div class="panel-body">
  <p>
    <button class="btn btn-primary" type="button">
      总用户数 <span class="badge"><?= $cnt['tt_user']; ?></span>
    </button>
    <button class="btn btn-success" type="button">
      总岗位数(通过审批) <span class="badge"><?= $cnt['tt_jobPassed']; ?></span>
    </button>
    <button class="btn btn-primary" type="button">
      总岗位申请数 <span class="badge"><?= $cnt['tt_job']; ?></span>
    </button>
    <button class="btn btn-info" type="button">
      总社会组织 <span class="badge"><?= $cnt['tt_ngo']; ?></span>
    </button>
    <button class="btn btn-primary" type="button">
      总机构数 <span class="badge"><?= $cnt['tt_enterprise']; ?></span>
    </button>
  </p>
  </div>
</div>
    
</div>
