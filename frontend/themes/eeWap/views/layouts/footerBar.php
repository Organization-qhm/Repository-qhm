<?php 

use yii\helpers\Html;
use yii\helpers\Url;

?>

    
    <div class="footer"> Copyright © 2017-2018
        <br>北京才穗获客广告有限公司
        <br>京ICP备18012622号-2 客服热线：400-096-9191 </div>
<?php if (!in_array(Yii::$app->requestedRoute, ['name/view'])):?>
    <div class="tabbar">
        <a href="<?= Url::to(['site/index', 'btype'=>'wap']); ?>" class="tabbar-item active">
            <i class="icon01"></i>
            <p>首页</p>
        </a>
        <a href="<?= Url::to(['name/index', 'btype'=>'wap']); ?>" class="tabbar-item">
            <i class="icon02"></i>
            <p>起名</p>
        </a>
        <a  href='#' class="tabbar-item eeDeving">
            <i class="icon03"></i>
            <p>核名</p>
        </a>
        <a  href='#' class="tabbar-item eeDeving">
            <i class="icon04"></i>
            <p>经营范围</p>
        </a>
    </div>
    
    <div class="modal fade modal-tip" id="modalTip">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <img src="<?= $this->theme->baseUrl;?>/images/icon22.png">
                    <div class="content">此功能正在建设当中
                        <br> 请各位用户敬请期待</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">我知道了</button>
                </div>
            </div>
        </div>
    </div>
<?php endif;?>