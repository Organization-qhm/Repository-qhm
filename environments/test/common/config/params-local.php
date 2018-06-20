<?php
return [ 
        // wechat API
        'wechat.token' => '',
        
        // real
        'wechat.appId' => '',
        'wechat.appSecret' => '',
        'wechat.webApp.appId' => '',
        'wechat.webApp.appSecret' => '',
        'wechat.pay.key' => '',
        'wechat.pay.mchId' => '',

        //Salesforce API params
        'sf.app.key' => '',
        'sf.app.secret' => '',
        'sf.app.loginUsername' => '',
        'sf.app.loginPassword' => '',
        
        
        // SMS API
        'sms.accountId' => '',
        'sms.accountAuthToken' => '',
        'sms.appId' => '',

        
        // mailGun
        // https://api:key-8da18724c8aae3bc16a7347081c8ba50@api.mailgun.net/v3/yiilib.com/messages
        'mailGun_API_url' => '',
        'mailGun_API_key' => '',
        

        'sendcloud_API_url' => '',
        'sendcloud_API_user' => '',
        'sendcloud_API_key' => '',
        
        //move to changable file for some condition need chagne it.
        'path.upload' => __DIR__ . '/../../upload/', // point to upload folder root
        
        // log file save path on server, for need save log file out app to a special path
        'log.filePath' => '',
        
        // pre-url, for frontend, sometime need use frontend-url in backend or somewhere.
        'url.frontendBased' => '',
        
        // pre-url for static resource, this idea for CND like 7-Niu
        'url.resourceBased' => '',
];
