<?php
/**
 * 主命令
 * 本例预计执行示例：在yii根目录执行 yii test(或者 yii test/tes)
 */

//不可少
namespace console\controllers;

//不可少
use Yii;

//控制器的名字首字母必须为大写，继承 console 控制器
class PController extends \yii\console\Controller
{
    //默认执行的子命令，首字母必须为小写
    public $defaultAction = 'tes';

    //执行的子命令
    public function actionTes()
    {
        echo Yii::$app->getSecurity()->generatePasswordHash('123123');//123123 是需要被设置的密码
        return 0;
    }
}