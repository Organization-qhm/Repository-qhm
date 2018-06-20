<?php
$config = [ 
        'components' => [ 
                'request' => [
                        // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
                        'cookieValidationKey' => 'x0T_4duUpPxikHVRSXvIs5C_5osZaNqm',
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
