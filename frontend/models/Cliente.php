<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "cliente".
 *
 * @property integer $id
 * @property string $apellido
 * @property string $nombre
 * @property integer $dni
 * @property string $fecha_nacimiento
 * @property string $domicilio
 * @property integer $localidad_id
 */
class Cliente extends \yii\db\ActiveRecord
{
    public $provincia_id;
 
    public $partido_id;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cliente';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['apellido', 'nombre', 'dni', 'fecha_nacimiento', 'domicilio', 'localidad_id'], 'required'],
            [['dni', 'localidad_id'], 'integer'],
            [['fecha_nacimiento'], 'safe'],
            [['apellido', 'nombre', 'domicilio'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
        'id' => 'ID',
        'apellido' => 'Apellido',
        'nombre' => 'Nombre',
        'dni' => 'Dni',
        'fecha_nacimiento' => 'Fecha Nacimiento',
        'domicilio' => 'Domicilio',
        'provincia_id' => 'Provincia',
        'partido_id' => 'Partido',
        'localidad_id' => 'Localidad',
        ];
    }
}
