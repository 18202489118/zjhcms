<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-api',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'api\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'v1' => 'api\modules\v1\Module',
    ],
    'components' => [
//        'response' => [
//            'class' => 'yii\web\Response',
//            'on beforeSend' => function ($event) {
//                $response = $event->sender;
//                $response->data = [
//                    'code' => $response->getStatusCode(),
//                    'data' => $response->data,
//                    'message' => $response->statusText
//                ];
//                $response->format = yii\web\Response::FORMAT_JSON;
//            },
//        ],
        'response' => [
            'class' => 'yii\web\Response',
            'on beforeSend' => function ($event) {
                $response = $event->sender;
                $msg = $response->statusText;
                $code = $response->getStatusCode();
                $data = $response->data;
                $rdata = [];

                if ($code !== 200) {
                    $response->setStatusCode(200);
                    isset($data['status']) && $code = $data['status'];
                    isset($data['data']) && $data = $data['data'];
                    isset($data['message']) && $msg = $data['message'];
                }
                $rdata = [
                    'code' => $code,
                    'msg' => $msg,
                    'data' => $data
                ];

                $response->data = $rdata;
                $response->format = yii\web\Response::FORMAT_JSON;
            },
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'enableSession' => false
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
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
//        'urlManager' => [
//            'enablePrettyUrl' => true,
//            'showScriptName' => false,
//            'enableStrictParsing' =>true,
//            'rules' => [
//                [
//                    'class' => 'yii\rest\UrlRule',
//                    'controller' => ['v1/user']
//                ],
//            ]
//        ],


        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => true,
//            "suffix" => ".html",
            'rules' => require(__DIR__ . '/url-rules.php'),
        ],
    ],
    'params' => $params,
];
