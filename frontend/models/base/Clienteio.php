<?php

namespace frontend\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "clienteio".
 *
 * @property integer $id
 * @property string $apellido
 * @property string $nombre
 * @property integer $dni
 * @property string $fecha_nacimiento
 * @property string $domicilio
 * @property integer $localidad_id
 */
class Clienteio extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['apellido', 'nombre', 'dni', 'fecha_nacimiento', 'domicilio', 'localidad_id'], 'required'],
            [['dni', 'localidad_id'], 'integer'],
            [['fecha_nacimiento'], 'safe'],
            [['apellido', 'nombre', 'domicilio'], 'string', 'max' => 45],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'clienteio';
    }

    /**
     * 
     * @return string
     * overwrite function optimisticLock
     * return string name of field are used to stored optimistic lock 
     * 
     */
    public function optimisticLock() {
        return 'lock';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
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

/**
     * @inheritdoc
     * @return array mixed
     */ 
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new \yii\db\Expression('NOW()'),
            ],
            'blameable' => [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'created_by',
                'updatedByAttribute' => 'updated_by',
            ],
            'uuid' => [
                'class' => UUIDBehavior::className(),
                'column' => 'id',
            ],
        ];
    }
}
