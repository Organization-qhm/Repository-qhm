<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\components\CommonConst;
use yii\web\View;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\AccountTimeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $model common\models\AccountTime */

$this->title = '用户统计';
$this->params['breadcrumbs'][] = $this->title;




$tmpLabel1 = '[';
$tmpData1 = '[';

if (isset($cnt['cities'][''])) {
    $tmpLabel1 .= '"未设置"';
    $tmpData1 .= $cnt['cities'][''];
}

foreach ($cities as $oneK=>$oneC) {
    if ($tmpLabel1 != '[') {
        $tmpLabel1 .= ', ';
    }
    $tmpLabel1 .= '"'.$oneC.'"';


    if ($tmpData1 != '[') {
        $tmpData1 .= ', ';
    }
    if(isset($cnt['cities'][$oneK])){
        $tmpData1 .= $cnt['cities'][$oneK];
    }else{
        $tmpData1 .= 0;
    }
}

$tmpLabel1 .= ']';
$tmpData1 .= ']';



$tmpLabel2 = '[';
$tmpData2 = '[';


foreach ($skills as $oneK=>$oneS) {
    if ($tmpLabel2 != '[') {
        $tmpLabel2 .= ', ';
    }
    $tmpLabel2 .= '"'.$oneS.'"';


    if ($tmpData2 != '[') {
        $tmpData2 .= ', ';
    }
    if(isset($cnt['skills'][$oneK])){
        $tmpData2 .= $cnt['skills'][$oneK];
    }else{
        $tmpData2 .= 0;
    }
}

$tmpLabel2 .= ']';
$tmpData2 .= ']';



// var_dump($tmpLabel2);
// var_dump($tmpData2);
// exit;


$jsReady = "
var data1 = {
        labels: $tmpLabel1,
        datasets: [{
            label: '11ee# of Votes',
            data: $tmpData1,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(96, 134, 167, 0.2)',
                'rgba(146, 103, 191, 0.2)',
                'rgba(197, 129, 191, 0.2)',
                'rgba(255, 1, 1, 0.2)',
                'rgba(247, 255, 0, 0.2)',
                'rgba(236, 75, 7, 0.2)',
                'rgba(0, 255, 47, 0.2)',
                'rgba(0, 255, 247, 0.2)',
                'rgba(71, 199, 50, 0.2)',
                'rgba(48, 234, 19, 0.2)',
                'rgba(79, 253, 112, 0.2)',
                'rgba(247, 155, 116, 0.2)',
                'rgba(206, 208, 168, 0.2)',
                'rgba(9, 51, 88, 0.2)',
                'rgba(76, 61, 90, 0.2)',
                'rgba(99, 9, 91, 0.2)',
                'rgba(132, 37, 37, 0.2)',
                'rgba(232, 208, 198, 0.2)',
                'rgba(195, 232, 202, 0.2)',
                'rgba(67, 115, 114, 0.2)',
                'rgba(31, 148, 148, 0.2)',
                'rgba(111, 156, 104, 0.2)',
                'rgba(181, 187, 72, 0.2)',
                'rgba(17, 134, 236, 0.2)',
                'rgba(129, 4, 247, 0.2)',
                'rgba(230, 214, 229, 0.2)',
                'rgba(232, 188, 188, 0.2)',
                'rgba(194, 234, 234, 0.2)',
                'rgba(30, 115, 46, 0.2)',
                'rgba(136, 64, 34, 0.2)',
                'rgba(237, 247, 66, 0.2)',
                'rgba(236, 48, 225, 0.2)',
                'rgba(103, 150, 191, 0.2)',
                'rgba(247, 4, 224, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(96, 134, 167, 1)',
                'rgba(146, 103, 191, 1)',
                'rgba(197, 129, 191, 1)',
                'rgba(255, 1, 1, 1)',
                'rgba(247, 255, 0, 1)',
                'rgba(236, 75, 7, 1)',
                'rgba(0, 255, 47, 1)',
                'rgba(0, 255, 247, 1)',
                'rgba(71, 199, 50, 1)',
                'rgba(48, 234, 19, 1)',
                'rgba(79, 253, 112, 1)',
                'rgba(247, 155, 116, 1)',
                'rgba(206, 208, 168, 1)',
                'rgba(9, 51, 88, 1)',
                'rgba(76, 61, 90, 1)',
                'rgba(99, 9, 91, 1)',
                'rgba(132, 37, 37, 1)',
                'rgba(232, 208, 198, 1)',
                'rgba(195, 232, 202, 1)',
                'rgba(67, 115, 114, 1)',
                'rgba(31, 148, 148, 1)',
                'rgba(111, 156, 104, 1)',
                'rgba(181, 187, 72, 1)',
                'rgba(17, 134, 236, 1)',
                'rgba(129, 4, 247, 1)',
                'rgba(230, 214, 229, 1)',
                'rgba(232, 188, 188, 1)',
                'rgba(194, 234, 234, 1)',
                'rgba(30, 115, 46, 1)',
                'rgba(136, 64, 34, 1)',
                'rgba(237, 247, 66, 1)',
                'rgba(236, 48, 225, 1)',
                'rgba(103, 150, 191, 1)',
                'rgba(247, 4, 224, 1)',
            ],
            borderWidth: 1
        }]
    };
var ctx1 = document.getElementById('cityChart');
        
var stackedBar1 = new Chart(ctx1, {
    type: 'doughnut',
    data: data1,
    options: {responsive: false}
});

var data2 = {
        labels: $tmpLabel2,
        datasets: [{
            label: '11ee# of Votes',
            data: $tmpData2,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(96, 134, 167, 0.2)',
                'rgba(146, 103, 191, 0.2)',
                'rgba(197, 129, 191, 0.2)',
                'rgba(255, 1, 1, 0.2)',
                'rgba(247, 255, 0, 0.2)',
                'rgba(236, 75, 7, 0.2)',
                'rgba(0, 255, 47, 0.2)',
                'rgba(0, 255, 247, 0.2)',
                'rgba(71, 199, 50, 0.2)',
                'rgba(48, 234, 19, 0.2)',
                'rgba(79, 253, 112, 0.2)',
                'rgba(247, 155, 116, 0.2)',
                'rgba(206, 208, 168, 0.2)',
                'rgba(9, 51, 88, 0.2)',
                'rgba(76, 61, 90, 0.2)',
                'rgba(99, 9, 91, 0.2)',
                'rgba(132, 37, 37, 0.2)',
                'rgba(232, 208, 198, 0.2)',
                'rgba(195, 232, 202, 0.2)',
                'rgba(67, 115, 114, 0.2)',
                'rgba(31, 148, 148, 0.2)',
                'rgba(111, 156, 104, 0.2)',
                'rgba(181, 187, 72, 0.2)',
                'rgba(17, 134, 236, 0.2)',
                'rgba(129, 4, 247, 0.2)',
                'rgba(230, 214, 229, 0.2)',
                'rgba(232, 188, 188, 0.2)',
                'rgba(194, 234, 234, 0.2)',
                'rgba(30, 115, 46, 0.2)',
                'rgba(136, 64, 34, 0.2)',
                'rgba(237, 247, 66, 0.2)',
                'rgba(236, 48, 225, 0.2)',
                'rgba(103, 150, 191, 0.2)',
                'rgba(247, 4, 224, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(96, 134, 167, 1)',
                'rgba(146, 103, 191, 1)',
                'rgba(197, 129, 191, 1)',
                'rgba(255, 1, 1, 1)',
                'rgba(247, 255, 0, 1)',
                'rgba(236, 75, 7, 1)',
                'rgba(0, 255, 47, 1)',
                'rgba(0, 255, 247, 1)',
                'rgba(71, 199, 50, 1)',
                'rgba(48, 234, 19, 1)',
                'rgba(79, 253, 112, 1)',
                'rgba(247, 155, 116, 1)',
                'rgba(206, 208, 168, 1)',
                'rgba(9, 51, 88, 1)',
                'rgba(76, 61, 90, 1)',
                'rgba(99, 9, 91, 1)',
                'rgba(132, 37, 37, 1)',
                'rgba(232, 208, 198, 1)',
                'rgba(195, 232, 202, 1)',
                'rgba(67, 115, 114, 1)',
                'rgba(31, 148, 148, 1)',
                'rgba(111, 156, 104, 1)',
                'rgba(181, 187, 72, 1)',
                'rgba(17, 134, 236, 1)',
                'rgba(129, 4, 247, 1)',
                'rgba(230, 214, 229, 1)',
                'rgba(232, 188, 188, 1)',
                'rgba(194, 234, 234, 1)',
                'rgba(30, 115, 46, 1)',
                'rgba(136, 64, 34, 1)',
                'rgba(237, 247, 66, 1)',
                'rgba(236, 48, 225, 1)',
                'rgba(103, 150, 191, 1)',
                'rgba(247, 4, 224, 1)',
            ],
            borderWidth: 1
        }]
    };
var ctx2 = document.getElementById('skillChart');
        
var stackedBar2 = new Chart(ctx2, {
    type: 'doughnut',
    data: data2,
    options: {responsive: false}
});
";

$jsEnd = "
jsEndContent
";

$this->registerJs($jsReady, View::POS_READY, 'statistics-user-ready');
//$this->registerJs($jsEnd, View::POS_END, 'regName-end');
$this->registerJsFile(Url::base().'/js/chart.bundle.min.js', [[View::POS_END]]);
//$this->registerCssFile($this->theme->baseUrl.'/style/lib/jquery.dataTables.css', [[View::POS_HEAD]]);
?>
<div>
    <canvas id="cityChart" width="1000" height="400"></canvas>
</div>
<br/>
<br/>
<div>
    <canvas id="skillChart" width="1000" height="400"></canvas>
</div>