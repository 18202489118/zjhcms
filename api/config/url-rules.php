<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/19
 * Time: 14:32
 */
/**
 * 在这里配置所有的路由规则
 */
$urlRuleConfigs = [
    [
        'controller' => ['v1/user'],
//        'pluralize' => false,    //设置为false 就可以去掉复数形式了
        'extraPatterns' => [
            'POST login' => 'login',
            'GET signup-test' => 'signup-test',
            'GET user-profile' => 'user-profile',
        ],
    ],
    [
        'controller' => ['v1/goods'],
//        'pluralize' => false,    //设置为false 就可以去掉复数形式了
//        'extraPatterns' => [
//            'POST login' => 'login',
//        ],
    ],

];
/**
 * 基本的url规则配置
 */
function baseUrlRules($unit)
{
    $config = [
        'class' => 'yii\rest\UrlRule',
    ];
    return array_merge($config, $unit);
}
return array_map('baseUrlRules', $urlRuleConfigs);