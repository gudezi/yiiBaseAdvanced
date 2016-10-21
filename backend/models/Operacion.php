<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "operacion".
 *
 * @property integer $id
 * @property string $nombre
 */
class Operacion extends \yii\db\ActiveRecord
{
    public $operaciones;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'operacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre'], 'string', 'max' => 64],
            [['operaciones'], 'safe'],
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
        ];
    }
    
    public function generate()
    {
        if(isset($this->operaciones))
        {
            if(is_array($this->operaciones)>0){
                foreach ($this->operaciones as $id) {
                    $oper = new Operacion();
                    $oper->nombre = $id;
                    $oper->save();
                }
            }
        }
        return true;
    }
}
