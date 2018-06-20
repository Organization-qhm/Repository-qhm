<?php

//load params from files
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);


return [
    'id' => 'app-backendplus',
    'language' => 'zh-CN',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backendplus\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'components' => [
        'user' => [
            'identityClass' => 'backendplus\models\AdminUser',
            'identityCookie' => ['name'=>'_identityBackendPlus_lm969', 'httpOnly' => true],
            'enableAutoLogin' => true,
        ],
        'session' => [
                'name' => 'BACKENDPLUSSESSID_LM969',
                'savePath' => sys_get_temp_dir(),
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'assetManager'=>[
                'bundles'=>[
//                         'yii\web\JqueryAsset'=>false,
//                         'yii\bootstrap\BootstrapAsset'=>false,
                        'dmstr\web\AdminLteAsset' => [
                                'skin' => 'skin-blue-light',
                        ],
                ]
        ],
            
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => true,
//             'scriptUrl'=>'http://test.purekiwi.cn/frontend/web/index.php',
            'rules' => [
            ],
        ],
            
//         'urlManagerF' => [
//             'class' => 'yii\web\urlManager',
//             'baseUrl'=>'http://wc.splashwechat.com/index.php',
//             'enablePrettyUrl' => true,
//             'showScriptName' => false,
//             'rules' => [
//             ],
//         ],

    ],
    'params' => $params,
];
