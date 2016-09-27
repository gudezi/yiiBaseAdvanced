<?php

namespace common\models;

use Yii;
use karpoff\icrop\CropImageUploadBehavior;

/**
 * This is the model class for table "profile".
 *
 * @property integer $id
 * @property string $apellido
 * @property string $nombre
 * @property string $perfil
 * @property integer $grupo
 * @property integer $entidad
 * @property integer $empresa
 * @property string $calle
 * @property string $numero
 * @property string $piso
 * @property string $depto
 * @property integer $pais_id
 * @property integer $provincia_id
 * @property integer $partido_id
 * @property integer $localidad_id
 * @property string $coordenadas
 * @property string $telefono
 * @property string $celular
 
 * @property Username $username0
 */
class Profile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'profile';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'apellido', 'nombre'], 'required'],
            [['id', 'grupo', 'entidad', 'empresa', 'pais_id', 'provincia_id', 'partido_id', 'localidad_id'], 'integer'],
            [['apellido', 'nombre', 'calle', 'coordenadas'], 'string', 'max' => 30],
            [['perfil'], 'string', 'max' => 15],
            [['numero'], 'string', 'max' => 8],
            [['piso'], 'string', 'max' => 3],
            [['depto'], 'string', 'max' => 5],
            [['telefono', 'celular'], 'string', 'max' => 100],
			['photo', 'file', 'extensions' => 'png, jpeg, jpg, gif', 'on' => ['insert', 'update']],
			[['photo_crop', 'photo_cropped'], 'string', 'max' => 100]        ];
    }

    /**
     * @inheritdoc
     */
	function behaviors()
	{
		return [
			[
				'class' => CropImageUploadBehavior::className(),
				'attribute' => 'photo',
				'scenarios' => ['insert', 'update'],
				'path' => '@webroot/uploads',
				'url' => '@web/uploads',
				'ratio' => 1,
				'crop_field' => 'photo_crop',
				'cropped_field' => 'photo_cropped',
			],
		];
	}
    
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'apellido' => 'Apellido',
            'nombre' => 'Nombre',
            'perfil' => 'Perfil',
            'grupo' => 'Grupo',
            'entidad' => 'Entidad',
            'empresa' => 'Empresa',
            'calle' => 'Calle',
            'numero' => 'Numero',
            'piso' => 'Piso',
            'depto' => 'Depto',
            'pais_id' => 'Pais',
            'provincia_id' => 'Provincia',
            'partido_id' => 'Partido',
            'localidad_id' => 'Localidad',
            'coordenadas' => 'Coordenadas',
            'telefono' => 'Telefono',
            'celular' => 'Celular',
            'photo' => 'Foto',
        ];
    }
    
    public function getUsername0()
    {
        return $this->hasOne(User::className(), ['id' => 'id']);
    }
}
