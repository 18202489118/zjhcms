<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\UserBackend */

$this->title = '管理员修改: ' . $model->username;
$this->params['breadcrumbs'][] = ['label' => '管理员', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->username, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '修改';
?>
<div class="user-backend-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
