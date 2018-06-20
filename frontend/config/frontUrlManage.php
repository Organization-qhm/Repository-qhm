<?php
//PROD
//display index.php in url
$urlManageShowScriptName = false;
if (YII_ENV_DEV) {
    $urlManageShowScriptName = true;
}

return 
[
    'class'=>'\yii\web\UrlManager',
        
//     'scriptUrl'=>'/lm958/frontend/web/index_l.php',
//     'baseUrl'=>'http://t2.yiilib.com/',
    'enablePrettyUrl' => true,
    'showScriptName' => $urlManageShowScriptName,
    'rules' => [
            
    	'/' => 'site/index', // site level actions.
    	'<btype:(wap)>' => 'site/index', // site level actions.
    	'<btype:(wap)>/<action:(login|signup|logout)>' => 'site/<action>', // site level actions.
    	'<btype:(wap)>/<controller>' => '<controller>', // site level actions.
    	'<btype:(wap)>/<controller>/<action>' => '<controller>/<action>', // site level actions.
    	'<action:(login|signup|logout)>' => 'site/<action>', // site level actions.
    	
//         'product/<p_id:\d+>' => 'product/order', // product order form.
    	
//     	'order/payment-method' => 'order/payment-method', // order payment method select.
//     	'order/<o_id:\d+>/<action>' => 'order/<action>', // order payment method select.
    	
//     	'paper' => 'paper/index', // paper index page, provide country list
//     	'paper/<c_id:\d+>' => 'paper/view', // given country's paper form display.
    	
//     	'uc/order/<o_id:\d+>' => 'user-center/order-view', // view one order
//     	'uc/order/<action>' => 'user-center/order-<action>', // order actions
//     	'uc/paper/<up_id:\d+>' => 'user-center/paper-view', // paper view page.
//     	'uc/<action>' => 'user-center/<action>', // order actions
    	
//     	'custom-travel' => 'custom-travel/index', // custom-travel index.
//     	'sms' => 'sms/index', // custom-travel index.   
    	
    ],
];