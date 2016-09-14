<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "localidades".
 *
 * @property integer $id
 * @property string $descripcion
 * @property integer $departamento_id
 */
class Localidades extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'localidades';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion', 'departamento_id'], 'required'],
            [['departamento_id'], 'integer'],
            [['descripcion'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'descripcion' => 'Descripcion',
            'departamento_id' => 'Departamento',
        ];
    }
}
