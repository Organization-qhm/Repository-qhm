<?php
namespace frontend\components;


use yii\base\ActionFilter;
use eeTools\common\eeDebug;
use eeTools\eeWeChat\User\wcUser;
use yii\web\HttpException;

/**
 * auto load wechat code to login correct user.
 * @author boylee
 *
 */
class WechatCheckFilter extends ActionFilter{
    
    public function beforeAction($action) {
        
        //init
        $wc = new wcUser();
        
        //ac
        $wc->getUserAccessToken();
        
        if (empty($wc->openId)) {
            throw new HttpException(404, 'wechat client data not load!');
        }
        
        return true;
    }
}
