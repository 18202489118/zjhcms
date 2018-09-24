<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/18
 * Time: 16:37
 */

namespace backend\components;


use Yii;
use yii\base\ActionFilter;

class ThemeControl extends ActionFilter
{
    public function init ()
    {
        $switch = intval(Yii::$app->request->get('switch'));
        $theme = $switch ? 'spring' : 'christmas';
        if($theme){
            Yii::$app->view->theme = Yii::createObject([
                'class' => 'yii\base\Theme',
                'pathMap' => [
                    '@app/views' => [
                        "@app/themes/{$theme}",
                    ]
                ],
            ]);
        }
    }
}