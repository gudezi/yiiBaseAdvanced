<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "orden".
 *
 * @property integer $id
 * @property integer $cliente_id
 * @property string $fecha
 * @property string $estado
 */
class Orden extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orden';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cliente_id', 'fecha', 'estado'], 'required'],
            [['cliente_id'], 'integer'],
            [['fecha'], 'safe'],
            [['estado'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cliente_id' => 'Cliente ID',
            'fecha' => 'Fecha',
            'estado' => 'Estado',
        ];
    }
}
