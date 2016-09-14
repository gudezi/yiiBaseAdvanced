<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "partidos".
 *
 * @property integer $id
 * @property string $descripcion
 * @property integer $provincia_id
 */
class Partidos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'partidos';
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
