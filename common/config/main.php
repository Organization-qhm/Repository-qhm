<?php
/**
 * public components
 * like db, cache
 */

// DB Config Info
$dbConfig = require (__DIR__ . '/database.php');

return [ 
        'vendorPath' => EE_VENDORPATH,
        'components' => [ 
                'cache' => [ 
                        'class' => 'yii\caching\FileCache' 
                ],
        ] + $dbConfig 
];
