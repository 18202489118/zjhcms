<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Sign In';

$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
];

$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];
?>

<div class="login-box">
    <div class="login-logo">
        <a href="#"><b><?php echo Yii::t('com', 'CMS-YII2.0')?></b></a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg"><?php echo Yii::t('com', 'Please Sign in to start your session') ?></p>

        <?php $form = ActiveForm::begin(['id' => 'login-form', 'enableClientValidation' => false]); ?>

        <?= $form
            ->field($model, 'username', $fieldOptions1)
            ->label(false)
            ->textInput(['placeholder' => $model->getAttributeLabel('username')]) ?>

        <?= $form
            ->field($model, 'password', $fieldOptions2)
            ->label(false)
            ->passwordInput(['placeholder' => $model->getAttributeLabel('password')]) ?>

        <?= $form->field($model, 'captcha', ['template' => '<div style="position:relative;bottom: 10px">{input}{error}{hint}</div>'])->widget(Captcha::classname(), [
            'template' => '{input}{image}',
            'options' => [
                "class"=>"form-control pull-left",
                'style' => "width:67%;height:34px;position:relative",
                'placeholder' => yii::t("yii", "Verification Code"),
            ],
            'imageOptions' => [
                "style" => "cursor:pointer;",
                "class" => "pull-right"
            ]
        ]) ?>
        <div class="row">
            <div class="col-xs-8">
                <?= $form->field($model, 'rememberMe')->checkbox() ?>
            </div>
            <!-- /.col -->
            <div class="col-xs-4">
                <?= Html::submitButton(Yii::t('com', 'Sign in'), ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
            </div>
            <!-- /.col -->
        </div>


        <?php ActiveForm::end(); ?>

        <div class="social-auth-links text-center">
            <p>- <?php echo Yii::t('com', 'OR') ?> -</p>
            <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> <?php echo Yii::t('com', 'Sign in using QQ') ?></a>
            <a href="#" class="btn btn-block btn-social btn-google-plus btn-flat"><i class="fa fa-google-plus"></i> <?php echo Yii::t('com', 'Sign in using Google+') ?></a>
        </div>
        <!-- /.social-auth-links -->

        <a href="#"><?php echo Yii::t('com', 'I forgot my password') ?></a><br>
        <a href="register.html" class="text-center"><?php echo Yii::t('com', 'Register a new membership') ?></a>

    </div>
    <!-- /.login-box-body -->
</div><!-- /.login-box -->
