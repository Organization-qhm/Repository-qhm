<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use common\components\CommonConst;
/* @var $this yii\web\View */
/* @var $model common\models\Page */
/* @var $onePI common\models\PageItem */

$jsReady = "
        
        
";

$jsEnd = "
";

// $this->registerJs($jsReady, View::POS_READY, 'about-ready');
// $this->registerJs($jsEnd, View::POS_END, 'about-end');
// $this->registerJsFile($this->theme->baseUrl.'/js/lib/popcorn.min.js', [[View::POS_END]]);
// $this->registerJsFile($this->theme->baseUrl.'/js/lib/popcorn.capture.js', [[View::POS_END]]);
//$this->registerJsFile($this->theme->baseUrl.'/js/lib/jquery.dataTables.js', [[View::POS_END]]);
//$this->registerCssFile($this->theme->baseUrl.'/style/lib/jquery.dataTables.css', [[View::POS_HEAD]]);


?>

    <div class="main-wrap">
        <div class="container">
            <div class="notice shadow">
                <div class="notice-heading">
                    <h3 class="notice-title"><?= CommonConst::getName(CommonConst::PAGES_GYWM, 'Pages'); ?></h3>
                </div>
                <div class="notice-body" style="max-height: 2000px;">
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;中国·支教联盟（CNAEF）创立于2006年4月，由社会各界自愿支持偏远地区青少年教育的爱心人士组成，是中国最早成立的民间支教公益组织、中国青少年教育平等运动的倡导者和实践者、一直致力于偏远地区教育事业发展的非营利性民间机构。</p>
                    <br>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;自成立以来，联盟始终恪守“知识改变命运，教育提高素质”的宗旨，广泛动员社会力量，积极倡导青少年教育平等运动，极大地推动了偏远地区教育事业的发展。</p>
                    <br>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;联盟的主要工作是：收集和展示偏远地区教育现状，发布支教需求信息，呼吁全民共同关注偏远地区孩子的成长；牵线支教志愿者，为偏远地区提供支教资源，缓解师资匮乏现状；为贫困地区提供生活及教学物资的支持；搭建一对一助学和捐赠的桥梁。</p>
                    <br>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;十二年来，我们的脚步到达了宁夏、贵州、云南、四川、陕西、湖南、广西、青海、新疆、河南、江西等43个县，最远到达了缅甸的缅北华人地区；支援偏远山区中小学将近240所，定向资助高中生4百余人，中小学生2千余人；通过联盟参加支教志愿者老师2千余人，支教课时20万余节；援建教学场所70余处，捐赠图书2万余册、物资45万件，惠及人数达到100万人次。</p>
                    
                    <br>
                    <h4>团队理念</h4>
                    <p>聚是一团火 散作满天星</p>
                    <br>
                    <h4>支教足迹图</h4>
                    <p><img alt="支教足迹图" src="<?= $this->theme->baseUrl;?>/images/footerprint.jpg"></p>
                </div>
                <div class="notice-footer">
                    <div class="btns">
                    </div>
                </div>
            </div>
        </div>
    </div>