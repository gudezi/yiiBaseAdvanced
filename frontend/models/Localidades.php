<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "localidades".
 *
 * @property integer $id
 * @property string $descripcion
 * @property integer $partido_id
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
            [['descripcion', 'partido_id'], 'required'],
            [['partido_id'], 'integer'],
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
            'partido_id' => 'Partido',
        ];
    }
	
	public static function getPartidoId($id)
    {
		return static::findOne(['id' => $id])->partido_id;
    }
}
