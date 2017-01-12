<?php

namespace frontend\models;

use \frontend\models\base\Clienteio as BaseClienteio;

/**
 * This is the model class for table "clienteio".
 */
class Clienteio extends BaseClienteio
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['apellido', 'nombre', 'dni', 'fecha_nacimiento', 'domicilio', 'localidad_id'], 'required'],
            [['dni', 'localidad_id'], 'integer'],
            [['fecha_nacimiento'], 'safe'],
            [['apellido', 'nombre', 'domicilio'], 'string', 'max' => 45],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
	
    /**
     * @inheritdoc
     */
    public function attributeHints()
    {
        return [
            'id' => Yii::t('frontend', 'ID'),
            'apellido' => Yii::t('frontend', 'Apellido'),
            'nombre' => Yii::t('frontend', 'Nombre'),
            'dni' => Yii::t('frontend', 'Dni'),
            'fecha_nacimiento' => Yii::t('frontend', 'Fecha Nacimiento'),
            'domicilio' => Yii::t('frontend', 'Domicilio'),
            'localidad_id' => Yii::t('frontend', 'Localidad ID'),
        ];
    }
}
