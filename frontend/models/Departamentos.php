<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "departamentos".
 *
 * @property integer $id
 * @property string $descripcion
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
            [['descripcion', 'provincia_id'], 'required'],
            [['provincia_id'], 'integer'],
            [['descripcion'], 'string', 'max' => 100],
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
            'provincia_id' => 'Provincia',
        ];
    }
}
