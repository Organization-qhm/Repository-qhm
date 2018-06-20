<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use common\components\CommonConst;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */

/* @var $VTAs common\models\VtApply[] */

$jsReady = "
        
";

$jsEnd = "
";

// $this->registerJs($jsReady, View::POS_READY, 'vt-apply-ready');
// $this->registerJs($jsEnd, View::POS_END, 'about-end');
// $this->registerJsFile($this->theme->baseUrl.'/js/lib/popcorn.min.js', [[View::POS_END]]);
// $this->registerJsFile($this->theme->baseUrl.'/js/lib/popcorn.capture.js', [[View::POS_END]]);
//$this->registerJsFile($this->theme->baseUrl.'/js/lib/jquery.dataTables.js', [[View::POS_END]]);
//$this->registerCssFile($this->theme->baseUrl.'/style/lib/jquery.dataTables.css', [[View::POS_HEAD]]);

// var_dump($accountInfo->errors);

?>

<?php $this->beginContent('@app/views/user-center/user-center-layout.php'); ?>
            <div class="panel">
                <div class="panel-heading">
                    <ul class="tab-navs">
                        <li class="active"><a href="#">支教申请列表</a></li>
<!--                         <li><a href="">正在资助学生</a></li> -->
<!--                         <li><a href="">完成资助学生</a></li> -->
                    </ul>
<!--                     <div class="panel-heading-r"> -->
<!--                         <form class="panel-form"> -->
<!--                             <div class="form-group"> -->
<!--                                 <input type="text" class="form-control" placeholder=""> -->
<!--                             </div> -->
<!--                             <button type="submit" class="btn btn-primary">搜索</button> -->
<!--                         </form> -->
<!--                     </div> -->
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>支教周期</th>
                                    <th>申请时间</th>
                                    <th>最后反馈时间</th>
                                    <th>状态</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                        	<?php foreach ($VTAs as $oneVTA):?>
                                <tr>
                                    <td><?= Html::a($oneVTA->vtaVtRound->vtr_title, ['volunteer-teach/view', 'vtr_id'=>$oneVTA->vta_vtRound_id]); ?></td>
                                    <td><?= $oneVTA->vta_applyDate; ?></td>
                                    <td>
                                    	<?= $oneVTA->vta_updateDate; ?>
                                	</td>
                                    <td><?= CommonConst::getName($oneVTA->vta_status_id, 'VtApplyStatus'); ?></td>
                                    <td>
                                    	<?php if ($oneVTA->vta_status_id == CommonConst::VT_APPLYSTAUTS_APPLYING):?>
                                    		<?= Html::a('继续申请', ['volunteer-teach/apply', 'vtr_id'=>$oneVTA->vta_vtRound_id]); ?>
                                    	<?php endif;?>
                                    	<?php if ($oneVTA->vta_status_id == CommonConst::VT_APPLYSTAUTS_FAIL):?>
                                    		<?= Html::a('继续申请', ['volunteer-teach/apply', 'vtr_id'=>$oneVTA->vta_vtRound_id]); ?>
                                    		 | 
                                    		<?= Html::a('查看反馈', ['volunteer-teach/approval-detail', 'vtr_id'=>$oneVTA->vta_vtRound_id]); ?>
                                    	<?php endif;?>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
<!--                     <nav aria-label="Page navigation" class="text-center"> -->
<!--                         <ul class="pagination"> -->
<!--                             <li> -->
<!--                                 <a href="#" aria-label="Previous"> -->
<!--                                     <span aria-hidden="true">&laquo;</span> -->
<!--                                 </a> -->
<!--                             </li> -->
<!--                             <li class="active"><a href="#">1</a></li> -->
<!--                             <li><a href="#">2</a></li> -->
<!--                             <li><a href="#">3</a></li> -->
<!--                             <li><a href="#">4</a></li> -->
<!--                             <li> -->
<!--                                 <a href="#" aria-label="Next"> -->
<!--                                     <span aria-hidden="true">&raquo;</span> -->
<!--                                 </a> -->
<!--                             </li> -->
<!--                         </ul> -->
<!--                     </nav> -->
                </div>
            </div>
<?php $this->endContent(); ?>