<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "test".
 *
 * @property integer $id
 * @property string $name
 */
class Test extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'test';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * 验证insert前后事件
     */
    public function init ()
    {
        parent::init();
        $this->on(self::EVENT_BEFORE_INSERT, [$this, 'onBeforeInsert']);
        $this->on(self::EVENT_AFTER_INSERT, [$this, 'onAfterInsert']);
    }

    /**
     * insert前事件回掉
     * @param $event
     */
    public function onBeforeInsert ($event)
    {
        yii::info('This is beforeInsert event.');
    }

    /**
     * insert后事件回掉
     * @param $event
     */
    public function onAfterInsert ($event)
    {
        yii::info('This is alterInsert event.');
    }
}
