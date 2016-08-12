<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "sexo".
 *
 * @property integer $id
 * @property string $sexo_nombre
 */
class Sexo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sexo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sexo_nombre'], 'required'],
            [['sexo_nombre'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sexo_nombre' => 'Sexo Nombre',
        ];
    }
}
