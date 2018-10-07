<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/7
 * Time: 10:57
 */

use kartik\widgets\Alert;

if($res['flag'] !== false){
    echo Alert::widget([
        'type' => Alert::TYPE_SUCCESS,
        'title' => $res['msg'],
        'icon' => 'glyphicon glyphicon-ok-sign',
//            'body' => 'You successfully read this important alert message.',
//            'showSeparator' => true,
        'delay' => 1000
    ]);
}