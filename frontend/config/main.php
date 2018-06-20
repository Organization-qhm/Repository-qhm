<?php

//load params
$params = array_merge(
        require(__DIR__ . '/../../common/config/params.php'),
        require(__DIR__ . '/../../common/config/params-local.php'),
        require(__DIR__ . '/params.php'),
        require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'language' => 'zh-CN', //frontend default locale
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'frontend\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'defaultRoute'=>'site',
    'components' => [
        'user' => [
            'identityClass' => 'common\models\Account',
            'identityCookie' => ['name'=>'_identityFrontend_lm969', 'httpOnly' => true],
            'enableAutoLogin' => true,
        ],
        'session' => [
                'name' => 'FRONTENDSESSID_LM969',
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

        'urlManager' => require(__DIR__ . '/frontUrlManage.php'),
            
        'assetManager'=>[
                'bundles'=>[
                        'yii\web\JqueryAsset'=>false,
                        'yii\bootstrap\BootstrapAsset'=>false,
                ]
        ],
            
        //theme
        'view' => [
                'theme' => [
                        'pathMap' => ['@frontend/views' => '@frontend/themes/eev1/views'],
                        'basePath' => '@frontend/themes/eev1',
                        'baseUrl' => $params['url.resourceBased'].'web/themes/eev1', //resource file.
                ],
        ],

    ],
    'params' => $params,
];
