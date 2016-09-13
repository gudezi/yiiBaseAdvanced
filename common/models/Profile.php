<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "profile".
 *
 * @property integer $id
 * @property string $apellido
 * @property string $nombre
 * @property string $perfil
 * @property integer $grupo
 * @property integer $entidad
 * @property string $calle
 * @property string $numero
 * @property string $piso
 * @property string $depto
 * @property integer $id_pais
 * @property integer $id_provincia
 * @property string $id_localidad
 * @property string $coordenadas
 * @property string $telefono
 * @property string $mail
 * @property integer $id_empresa
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
            [['id'], 'required'],
            [['id', 'grupo', 'entidad', 'id_pais', 'id_provincia', 'id_empresa'], 'integer'],
            [['apellido', 'nombre', 'calle', 'coordenadas'], 'string', 'max' => 30],
            [['perfil'], 'string', 'max' => 15],
            [['numero'], 'string', 'max' => 8],
            [['piso'], 'string', 'max' => 3],
            [['depto'], 'string', 'max' => 5],
            [['id_localidad'], 'string', 'max' => 20],
            [['telefono', 'mail'], 'string', 'max' => 100],
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
            'calle' => 'Calle',
            'numero' => 'Numero',
            'piso' => 'Piso',
            'depto' => 'Depto',
            'id_pais' => 'Id Pais',
            'id_provincia' => 'Id Provincia',
            'id_localidad' => 'Id Localidad',
            'coordenadas' => 'Coordenadas',
            'telefono' => 'Telefono',
            'mail' => 'Mail',
            'id_empresa' => 'Id Empresa',
        ];
    }
}
