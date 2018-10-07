<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\UserBackend */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => '管理员', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

use kartik\widgets\Alert;

if($res['flag'] !== false){
    echo Alert::widget([
        'type' => Alert::TYPE_SUCCESS,
        'title' => $res['msg'],
        'icon' => 'glyphicon glyphicon-ok-sign',
//            'body' => 'You successfully read this important alert message.',
//            'showSeparator' => true,
        'delay' => 1500
    ]);
}
?>
<div class="user-backend-view">

    <p>
        <?= Html::a('修改', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '确定删除该条记录吗?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
            'auth_key',
            'password_hash',
//            'password_reset_token',
            'email:email',
            [
                'attribute' => 'status',
                'value' => function($model){
                    return $model->status == 0? '未激活' : '已激活';
                }
            ],
            [
                'attribute' => 'created_at',
                'format' => ['date', 'php:Y-m-d H:i']
            ],
            [
                'attribute' => 'updated_at',
                'format' => ['date', 'php:Y-m-d H:i']
            ],
        ],
    ]) ?>

</div>
