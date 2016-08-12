<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "departamentos".
 *
 * @property integer $departamento_id
 * @property string $departamento
 * @property integer $provincia_id
 */
class Departamentos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'departamentos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['departamento', 'provincia_id'], 'required'],
            [['provincia_id'], 'integer'],
            [['departamento'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'departamento_id' => 'Departamento ID',
            'departamento' => 'Departamento',
            'provincia_id' => 'Provincia ID',
        ];
    }
}
