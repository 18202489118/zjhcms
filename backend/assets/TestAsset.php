<?php

namespace backend\assets;
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/18
 * Time: 23:37
 */

/**
 * Test asset bundle.
 */
class TestAsset extends \yii\web\AssetBundle
{
    public $sourcePath = '@common/widgets/upload';
//    public $basePath = '@webroot';
//    public $baseUrl = '@web';
    public $css = [
//        'css/site_test.css',
        'css/widgets_test.css',
    ];
    public $js = [
        'js/test.js'
    ];
    public $depends = [
        'backend\assets\TestAsset2'//解决依赖问题
    ];
}