<?php

namespace frontend\models;

use Yii;
use frontend\models\Sexo;
use frontend\models\EstadoCivil;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "solicitante".
 *
 * @property integer $id
 * @property string $nombre
 * @property string $apellido
 * @property string $numero_identificacion
 * @property string $fecha_nacimiento
 * @property string $nacionalidad
 * @property integer $estado_civil_id
 * @property integer $sexo_id
 * @property string $email
 * @property string $telefono_movil
 */
class Solicitante extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'solicitante';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'apellido', 'numero_identificacion', 'fecha_nacimiento', 'nacionalidad', 'estado_civil_id', 'sexo_id', 'email'], 'required'],
            [['fecha_nacimiento'], 'safe'],
            [['fecha_nacimiento'], 'date', 'format'=>'Y-m-d'],
            [['estado_civil_id', 'sexo_id'], 'integer'],
            [['nombre', 'apellido', 'numero_identificacion', 'nacionalidad', 'email', 'telefono_movil'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'numero_identificacion' => 'Numero Identificacion',
            'fecha_nacimiento' => 'Fecha Nacimiento',
            'nacionalidad' => 'Nacionalidad',
            'estado_civil_id' => 'Estado Civil ID',
            'sexo_id' => 'Sexo ID',
            'email' => 'Email',
            'telefono_movil' => 'Telefono Movil',
        ];
    }
    
   public static function getListaSexo()
   {
       $opciones = Sexo::find()->asArray()->all();
       return ArrayHelper::map($opciones, 'id', 'sexo_nombre');
   }
    
   public static function getListaEstadoCivil()
   {
       $opciones = EstadoCivil::find()->asArray()->all();
       return ArrayHelper::map($opciones, 'id', 'estado_civil_nombre');
   }
}
