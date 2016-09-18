<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "rol_menu".
 *
 * @property integer $rol_id
 * @property integer $menu_id
 */
class RolMenu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rol_menu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rol_id', 'menu_id'], 'required'],
            [['rol_id', 'menu_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'rol_id' => 'Rol ID',
            'menu_id' => 'Menu ID',
        ];
    }
}
