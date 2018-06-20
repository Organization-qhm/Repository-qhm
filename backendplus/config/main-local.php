<?php
$config = [ 
        'components' => [ 
                'request' => [
                        // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
                        'cookieValidationKey' => '5iXmKbDy5tYknZIeDLQ2A15EYe9NBQYf',
                        'csrfParam' => '_backendCSRF' 
                ] 
        ] 
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config ['bootstrap'] [] = 'debug';
    $config ['modules'] ['debug'] = [ 
            'class' => 'yii\debug\Module' 
    ];

}

return $config;
