<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "usuario_operacion".
 *
 * @property integer $usuario_id
 * @property integer $operacion_id
 */
class UsuarioOperacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuario_operacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['usuario_id', 'operacion_id'], 'required'],
            [['usuario_id', 'operacion_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'usuario_id' => 'Usuario ID',
            'operacion_id' => 'Operacion ID',
        ];
    }
}
