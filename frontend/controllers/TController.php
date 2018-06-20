<?php
namespace frontend\controllers;

use Yii;
use frontend\components\FrontendBasedController;
use common\eeTools\eeNet;

use SimpleExcel\SimpleExcel;
use common\eeTools\eePaper;

use eeTools\eeWechat\Payment\Unifiedorder;
use common\eeTools\eeString;
use eeTools\eeWechat\Payment\JSAPI\PayRequest;
use eeTools\common\eeFile;
use yii\helpers\Json;
use common\models\User;



/**
 * Site controller
 */
class TController extends FrontendBasedController
{
    public function actionIndex() {
        $to = [];
        $to[] = ['mail'=>'boy.lee.here@gmail.com'];
        $sub = 'dinner?';
        $body = 'where?';
        exit;
        
        $user = new User();
        $user->validate();
        var_dump($user->errors);
        
        
        $user = new User();
        $user->scenario = 'restCreate';
        $user->validate();
        var_dump($user->errors);
        
        var_dump(explode('<=', 't_id<=12'));
        exit;
//         $paid = 1;
//         $jsRender = "
        
// var paid = ".$paid.";
// ";
        
//         var_dump($jsRender);
//         exit;
//         var_dump(\Yii::$app->user->id);
        
//         exit;
        
//         $string = eeString::randomString(32);
//         eeFile::saveFile($string);
//         var_dump($string);
        
//         exit;
//         var_dump(microtime ());
//         $time = explode ( " ", microtime () );
//         var_dump($time);
//         exit;
//         $time = $time[1] . ($time[0] * 1000);
//         $time2 = explode( ".", $time );
//         $time = $time2[0];
        
//         exit;
        
//         $subject = '签证测试结果[签小秘]';
//         $body = '123';
        
        
//         $toArr[1] = ['name'=>'Lee', 'mail'=>'lygmqkl@gmail.com'];
        
        
//         $result = eeMail::sendMailGunAPI($toArr, $subject, $body);
        
//         var_dump($result);
        
//         exit;
        //test paper new logic
        
        $depend = 'c+(a+b|f)';
//         $depend = 'z|s|(a+b)|h|i|(c+d)|f|g|e';
//         $depend = 'a+b+c+d';
        $select = 't-x-lx3';
        $selectArr = [];
        $tmpArr = explode('-', $select);
        foreach ($tmpArr as $value) {
            $selectArr[$value] = 1;
        }
        
//         var_dump(eePaper::FindQuestion(1, 2, $selectArr));
        var_dump(eePaper::FindMaterial(24, $selectArr));
        
        exit;
        
        var_dump(\Yii::$app->user->identity);
        
        exit;
        
        $excel = new SimpleExcel('CSV');
        
        //load by try
        try {
            $excel->parser->loadFile('/Users/boylee/Work/REBin/a1.csv');
        } catch (\Exception $e) {
            echo 'not exit';
            exit;
        }
        
        //file
//         var_dump($excel->parser);
//         exit;
        
        $cols = $excel->parser->getColumn(1);
        
        foreach ($cols as $rowKey=>$value) {
            $tmpKey = $rowKey+1;
            if ($excel->parser->isRowExists($tmpKey)) {
                $oneRow = $excel->parser->getRow($rowKey+1);
                var_dump($oneRow);
            }
        }
        
        exit;
        
        echo $excel->parser->getCell(2, 2);
        
        exit;
        
        
        
        //QXM SMS
        //http://api.jj-mobile.com:8080/eums/send_strong.do?name=test&seed=20130806102030&key=cd6e1aa6b89e8e413867b33811e70153&dest=13800138000,13012345678&content=test123
        $username = 'zzsn';
        $pass = 'udjdaobi';
        $seed = date('YmdHis');
        $key = md5(md5($pass).$seed);
        $content = '【签小秘】 group message test from Lee, 仅用于群发测试和中文内容显示测试<br>第二行';
        $content =  mb_convert_encoding($content, 'gb2312', 'utf-8');
        $content =  urlencode($content);
        
        $phone[] = '13810810334';
        $phone[] = '18661269967';
        
        $phones = implode(',', $phone);
        
//         var_dump($phones);
//         exit;
        
//         var_dump($content);
//         exit;
        $url = "http://api.jj-mobile.com:8080/eums/send_strong.do?name=$username&seed=$seed&key=$key&dest=$phones&content=$content";
        
//         var_dump(file_get_contents($url));
//         exit;
//         var_dump($url);
//         exit;
        
        var_dump(eeNet::load($url));
    }
    
    
    public function actionWc() {
        //unifiedorder
        //18661269967
        
        $pr = new PayRequest(['o_id'=>16]);
        var_dump($pr->generateConfig());
        exit;
        
        $uo = new Unifiedorder(['o_id'=>1]);
        var_dump($uo);
        exit;
        
        //values
        $uo->body = 'test product for wechat pay.';
        $uo->total_fee = 1;
        $uo->openid = 'oo5axt9DbdP2zoein7EqXXFbt13Y'; //get open id from session
        $uo->trade_type = 'JSAPI'; 
        $uo->out_trade_no = date('YmdHis').mt_rand(10000, 99999);  //fixed fake trade no.

        
        var_dump($uo->nonce_str);
        //validate
        var_dump($uo->createUnifiedOrder());
        var_dump($uo);
        
    }
    
    
    
}
