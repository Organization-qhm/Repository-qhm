<?php
return [ 
        'adminEmail' => 'admin@domain.org',
        'user.passwordResetTokenExpire' => 3600,
        
        'contentPCount' => 7, // auto hide by P's count, show more button

        //WeChat API
        'wechat.appAccessTokenExpired' => '7000',
        //change to correct url
        'wechat.pay.notifyUrl' => '',
        'wechat.msg.autoReplyIntervalSec' => 60*10, //10 hours as default, 1 min for test @LV1 fix auto replay interval sec
        'wechat.msg.tempId.reminder' => 'GhdeiEhVwLbI9QQXgzZQPL_SAFVJaJOuLEmWucgDB3o',
        'wechat.msg.tempId.followUp' => 'GhdeiEhVwLbI9QQXgzZQPL_SAFVJaJOuLEmWucgDB3o',
        
        //Salesforce API
        'sf.appAccessTokenExpired' => '36000',
        
        //SMS API
        'sms.templateId' => '52855',
        'sms.expiredHour' => 1,
        
                              
        // frontend
        'frontendWebRoot' => __DIR__ . '/../../frontend/web/', // point to frontend web root
                                                             
        // path for file save
        'path.template' => __DIR__ . '/../../common/templates/', // point to upload folder root
        
        'hashid.salt' => 'lm969',
        'hashid.minLength' => '10',
                                                   
        'share.expiredDay' => 30 
]
;
