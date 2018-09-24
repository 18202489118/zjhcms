<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/16
 * Time: 20:09
 */

namespace backend\components;

use Yii;
use yii\base\Behavior;

class MyBehavior extends Behavior
{
    public function beforeAction($action)
    {
        $action = Yii::$app->controller->action->id;
        if(Yii::$app->user->can($action)){
            return true;
        }else{
            throw new \yii\web\UnauthorizedHttpException('对不起，您现在还没获此操作的权限');
        }
    }
}