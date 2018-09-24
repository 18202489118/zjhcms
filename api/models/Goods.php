<?php

namespace api\models;

use Yii;

/**
 * This is the model class for table "goods".
 *
 * @property integer $id
 * @property string $name
 */
class Goods extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'goods';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 100],
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
    // 明确列出每个字段，适用于你希望数据表或
    // 模型属性修改时不导致你的字段修改（保持后端API兼容性）
//    public function fields()
//    {
//        return [
//            // 字段名和属性名相同
//            'id',
//            // 字段名为"email", 对应的属性名为"email_address"
//            'email_address' => 'name',
//            // 字段名为"name_d", 值由一个PHP回调函数定义
//            'name_d' => function ($model) {
//                return $model->id . ' ' . $model->name;
//            },
//        ];
//    }

    // 过滤掉一些字段，适用于你希望继承
    // 父类实现同时你想屏蔽掉一些敏感字段
//    public function fields()
//    {
//        $fields = parent::fields();
//
//        // 删除一些包含敏感信息的字段
////        unset($fields['auth_key'], $fields['password_hash'], $fields['password_reset_token']);
//        unset($fields['id']);
//
//        return $fields;
//    }

}
