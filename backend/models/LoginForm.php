<?php
namespace backend\models;

use Yii;
use yii\base\Model;

/**
 * Login form
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;
    public $captcha;
    private $_user;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
            [
                'captcha',
                'captcha',
                'captchaAction' => 'site/captcha',
                'message' => yii::t('yii', 'Verification code error.')
            ],
        ];
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'rememberMe' => Yii::t('com', 'remember Me'),
            'username' => Yii::t('com', 'username'),
            'password' => Yii::t('com', 'password'),
        ];
    }
    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            Yii::$app->user->on(yii\web\User::EVENT_AFTER_LOGIN, [$this, 'onAfterLogin']);
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        }
        
        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return UserBackend|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = UserBackend::findByUsername($this->username);
        }

        return $this->_user;
    }

    /**
     * 登录之后事件回掉
     * @param $event
     */
    public function onAfterLogin ($event)
    {
        $identity = $event->identity;
        $date = date('Y-m-d H:i:s');
        Yii::info("id={$identity->id}的用户最后一次登录系统的时间是{$date}");
    }
}
