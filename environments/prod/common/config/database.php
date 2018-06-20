<?php
/**
 * db class
 */

// @LV5 change db connection params to live data
$dbIp = 'localhost';
$dbName = 'lm969';
$dbUserName = 'boy_test';
$dbPassword = 'password';

return [ 
        'db' => [ 
                'class' => 'yii\db\Connection',
                'dsn' => 'mysql:host=' . $dbIp . ';dbname=' . $dbName,
                'username' => $dbUserName,
                'password' => $dbPassword,
                'charset' => 'utf8' 
        ] 
];
