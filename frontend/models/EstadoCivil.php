<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "estado_civil".
 *
 * @property integer $id
 * @property string $estado_civil_nombre
 */
class EstadoCivil extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estado_civil';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['estado_civil_nombre'], 'required'],
            [['estado_civil_nombre'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'estado_civil_nombre' => 'Estado Civil Nombre',
        ];
    }
}
