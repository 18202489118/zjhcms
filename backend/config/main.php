<?php

$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'name' => 'CMS - YII2.0',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
//    'defaultRoute' => 'site/index',
    // 配置语言
    'language' => 'zh-CN',
    // 配置时区
    'timeZone' => 'Asia/Chongqing',
    'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            //这里是允许访问的action，不受权限控制
            //controller/action
//            '*',//允许全部通过
            'site/login',
            'site/logout',
            'site/captcha',
        ]
    ],
    'modules' => [
        'admin' => [
            'class' => 'mdm\admin\Module',
        ],
        'gridview' => [
            'class' => '\kartik\grid\Module',
            'downloadAction' => 'gridview/export/download'
        ],
    ],
    'as theme' => [
        'class' => 'backend\components\ThemeControl',
    ],
    'components' => [
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            'defaultRoles' => ['guest'],
        ],

        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'backend\models\UserBackend',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [  
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
        'hello' => [
            'class' => 'common\components\Hello',
            'man' => 'zjh'
        ],
        'assetManager' => [
            'bundles' => [
                'dmstr\web\AdminLteAsset' => [
                    'skin' => 'skin-purple',
                ],
            ],
            //修改了资源文件之后，客户端的资源文件会重新请求服务器，而不是去缓存里获取 会给资源文件后面加上时间戳参数
            'appendTimestamp' => false,
        ],
//        'view' => [
//            'theme' => [
//                // 'basePath' => '@app/themes/spring',
//                // 'baseUrl' => '@web/themes/spring',
//                'pathMap' => [
//                    '@app/views' => [
//                        '@app/themes/spring',
//                    ]
//                ],
//            ],
//        ],


        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => false,
            'suffix' => '.html',
            'rules' => [
                "<controller>s" => "<controller>/index",
                "<module>/<controller>s" => "<module>/<controller>/index",
                "<module:\w+>/<controller:\w+>/<id:\d+>" => "<module>/<controller>/view",
                "<controller:\w+-\w+>/<id:\d+>" => "<controller>/view",
                "<controller:\w+-\w+>/update/<id:\d+>" => "<controller>/update",
            ],
        ],

    ],

    'params' => $params,

];
