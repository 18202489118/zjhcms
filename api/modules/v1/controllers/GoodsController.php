<?php

namespace api\modules\v1\controllers;

use yii\data\ActiveDataProvider;
use yii\filters\auth\HttpBearerAuth;
use yii\rest\ActiveController;

class GoodsController extends ActiveController
{
    public $modelClass = 'api\models\Goods';

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            //token的传递方式放在header中的bearer中 格式：bearer yourtoken
            //客户端发起请求首先执行的是AuthMethod类的beforeAction方法，验证header中的token的有效性
            'class' => HttpBearerAuth::className(),
            'optional' => [
            ],
        ];
        return $behaviors;
    }

//    public function actions()
//    {
//        $actions = parent::actions();
//
//        // 禁用"delete" 和 "create" 动作
//        unset($actions['delete'], $actions['create']);
//
//        // 使用"prepareDataProvider()"方法自定义数据provider
//        $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider1'];
//
//        return $actions;
//    }
//
//    public function prepareDataProvider1()
//    {
//        // 为"index"动作准备和返回数据provider
//        return 11;
//    }

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['index']);
        return $actions;
    }

    public function actionIndex()
    {
        $modelClass = $this->modelClass;
        return new ActiveDataProvider([
            'query' => $modelClass::find()->asArray(),
            'pagination' => ['pageSize' => 10]
        ]);
    }


}
