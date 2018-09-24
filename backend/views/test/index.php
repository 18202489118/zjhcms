<?php

use yii\widgets\ActiveForm;
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/15
 * Time: 13:50
 */
$form = ActiveForm::begin();
echo $form->field($model, 'file')->widget('manks\FileInput', [
    'clientOptions' => [
        'pick' => [
            'multiple' => true,
        ],
        // 'server' => Url::to('upload/u2'),
        // 'accept' => [
        //     'extensions' => 'png',
        // ],
    ],
]);
ActiveForm::end();