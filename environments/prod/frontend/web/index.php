<?php
defined ( 'YII_DEBUG' ) or define ( 'YII_DEBUG', false );
defined ( 'YII_ENV' ) or define ( 'YII_ENV', 'prod' );

defined ( 'EE_VENDORPATH' ) or define ( 'EE_VENDORPATH', __DIR__ . '/../../vendor' );

require (EE_VENDORPATH . '/autoload.php');
require (EE_VENDORPATH . '/yiisoft/yii2/Yii.php');

require (__DIR__ . '/../../common/config/bootstrap.php');
require (__DIR__ . '/../config/bootstrap.php');

$config = yii\helpers\ArrayHelper::merge ( 
        require (__DIR__ . '/../../common/config/main.php'), 
        require (__DIR__ . '/../../common/config/main-local.php'), 
        require (__DIR__ . '/../config/main.php'), 
        require (__DIR__ . '/../config/main-local.php') 
        );

$application = new yii\web\Application ( $config );
$application->run ();
