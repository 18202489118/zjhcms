<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mdm\admin\models\Menu;
use yii\helpers\Json;
use mdm\admin\AutocompleteAsset;

/* @var $this yii\web\View */
/* @var $model mdm\admin\models\Menu */
/* @var $form yii\widgets\ActiveForm */
AutocompleteAsset::register($this);
$opts = Json::htmlEncode([
        'menus' => Menu::getMenuSource(),
        'routes' => Menu::getSavedRoutes(),
    ]);
$this->registerJs("var _opts = $opts;");
$this->registerJs($this->render('_script.js'));

use kartik\widgets\Alert;

echo Alert::widget([
    'type' => Alert::TYPE_WARNING,
    'title' => Yii::t('rbac-admin', 'Tips') . ' :',
    'icon' => 'glyphicon glyphicon-exclamation-sign',
    'body' => '“图标内容” 的填写请参照 【<a href="http://fontawesome.dashgame.com/" target="_blank">链接</a>】 查看图标对应的字符。',
    'showSeparator' => true,
    'delay' => false
]);
?>
<div class="menu-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= Html::activeHiddenInput($model, 'parent', ['id' => 'parent_id']); ?>
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'name')->textInput(['maxlength' => 128]) ?>

            <?= $form->field($model, 'parent')
                ->dropDownList(Menu::find()
                    ->select(['name','id'])
                    ->indexBy('id')
                    ->column(),
                    ['prompt'=>'请选择父级']); ?>
            <?= $form->field($model, 'route')
                ->dropDownList(array_combine(Menu::getSavedRoutes(),Menu::getSavedRoutes()),
                    ['prompt'=>'请选择路由']); ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'order')->input('number') ?>

            <?= $form->field($model, 'icon')->input('string') ?>

            <?= $form->field($model, 'data')->textarea(['rows' => 4]) ?>
        </div>
    </div>

    <div class="form-group">
        <?=
        Html::submitButton($model->isNewRecord ? Yii::t('rbac-admin', 'Create') : Yii::t('rbac-admin', 'Update'), ['class' => $model->isNewRecord
                    ? 'btn btn-success' : 'btn btn-primary'])
        ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
