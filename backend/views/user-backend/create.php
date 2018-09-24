<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\UserBackend */

$this->title = '管理员新增';
$this->params['breadcrumbs'][] = ['label' => '管理员', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-backend-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
