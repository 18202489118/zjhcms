<?php

$config = [
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'cg0jFWkVgQI8suy-9yWZt9keznY6PCsf',
            'csrfParam' => '_csrf-backend',
            //客户端传来json 直接配置parsers解析成数组格式
            'parsers' => [
                'application/json' => 'yii\web\JsonParser'
            ]
        ],
    ],
];

if (!YII_ENV_TEST) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
