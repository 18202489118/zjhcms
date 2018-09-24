<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/15
 * Time: 13:51
 */

namespace backend\controllers;


use common\components\upload\Upload;
use yii\web\Controller;
use common\components\upload\Upload as NewUpload;
use yii\web\Response;
use Yii;

class TestController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index', [
            'model' => new Upload()
        ]);
    }

    public function actionUpload()
    {
        try {
            Yii::$app->response->format = Response::FORMAT_JSON;

            $model = new NewUpload();
            $info = $model->upImage();
            if ($info && is_array($info)) {
                return $info;
            } else {
                return ['code' => 1, 'msg' => 'error'];
            }

        } catch (\Exception $e) {
            return ['code' => 1, 'msg' => $e->getMessage()];
        }
    }
}