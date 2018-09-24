<?php

namespace api\modules\v1\controllers;

use Yii;
use api\models\LoginForm;
use common\models\User;
use yii\filters\auth\HttpBearerAuth;
use yii\helpers\ArrayHelper;
use yii\rest\ActiveController;

class UserController extends ActiveController
{
    public $modelClass = 'common\models\User';

    public function behaviors()
    {
        return ArrayHelper::merge(parent::behaviors(), [
            'authenticator' => [
                //token的传递方式放在header中的bearer中 格式：bearer yourtoken
                //客户端发起请求首先执行的是AuthMethod类的beforeAction方法，验证header中的token的有效性
                'class' => HttpBearerAuth::className(),
                'optional' => [
                    'login',
                    'signup-test'
                ],
            ],
            //增加一个跨域过滤，允许请求来源域访问，同时允许请求头携带authorization，这个是携带token的key
//            'corsFilter' => [
//                'class' => \yii\filters\Cors::className(),
//                'cors' => [
//                    'Origin' => ['*'],
//                    'Access-Control-Request-Headers' => ['authorization'],
//                ],
//            ],
        ]);
    }

    /**
     * 在做restul api开发时，认证 和 跨域需要配置还是跟普通的有所区别，文档上是英文，照着文档配出来了，基本意思就是 跨域访问时 如果需要认证，需要把认证unset（）掉，先允许跨域访问之后再进行认证
     * @return array
     */
//    public function behaviors()
//    {
//
//        $behaviors = parent::behaviors();
//
//// remove authentication filter
//        $auth = $behaviors['authenticator'];
//        unset($behaviors['authenticator']);
//
//// add CORS filter
//        $behaviors['corsFilter'] = [
//            'class' => \yii\filters\Cors::className(),
//        ];
//
//// re-add authentication filter
//        $behaviors['authenticator'] = $auth;
//// avoid authentication on CORS-pre-flight requests (HTTP OPTIONS method)
//        $behaviors['authenticator']['except'] = ['options'];
//
//        return $behaviors;
//    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * 添加测试用户
     */
    public function actionSignupTest()
    {
        $user = new User();
        $user->generateAuthKey();
        $user->setPassword('222');
        $user->username = '222';
        $user->email = '222@222.com';

        return $user->save(false);
    }

    /**
     * 登录
     */
    public function actionLogin()
    {
        $model = new LoginForm();
        $model->setAttributes(Yii::$app->request->post());
        if (($user = $model->login())) {
            return [
                'code' => 0,
                'data' => [
                    'token' => $user->api_token
                ],
            ];
        } else {
            $errors = $model->errors;
            $firstError = current($errors);
            return [
                'code' => 10001,
                'msg' => $firstError[0]
            ];
        }
    }

    /**
     * 获取用户信息
     */
    public function actionUserProfile()
    {
//        var_dump(Yii::$app->request->getBodyParams());die;
//        Yii::$app->request->queryParams;
        // 到这一步，token都认为是有效的了
        // 下面只需要实现业务逻辑即可
        $user = $this->authenticate(Yii::$app->user, Yii::$app->request, Yii::$app->response);
        return [
            'id' => $user->id,
            'username' => $user->username,
            'email' => $user->email,
        ];
    }

}
