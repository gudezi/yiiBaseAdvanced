<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "rol_usuario".
 *
 * @property integer $rol_id
 * @property integer $usuario_id
 */
class RolUsuario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rol_usuario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rol_id', 'usuario_id'], 'required'],
            [['rol_id', 'usuario_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'rol_id' => 'Rol ID',
            'usuario_id' => 'Usuario ID',
        ];
    }
}
