<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "prueba".
 *
 * @property integer $id
 * @property string $descripcion
 * @property string $urlUpload
 * @property string $urlCrop
 */
class Prueba extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'prueba';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion'], 'string', 'max' => 100],
            [['urlUpload', 'urlCrop'], 'string', 'max' => 200],
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
            'urlUpload' => 'Url Upload',
            'urlCrop' => 'Url Crop',
        ];
    }
}
