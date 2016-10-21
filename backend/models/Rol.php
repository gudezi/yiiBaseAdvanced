<?php

namespace backend\models;

use Yii;
use common\models\User;
use backend\models\RolOperacion;
use backend\models\RolUsuario;
use backend\models\Operacion;
use common\models\Menu;

/**
 * This is the model class for table "rol".
 *
 * @property integer $id
 * @property string $nombre
 */
class Rol extends \yii\db\ActiveRecord
{
    
    public $operaciones;
    
    public $usuarios;
    
    public $menues;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rol';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre'], 'string', 'max' => 32],
            [['operaciones','usuarios','menues'], 'safe'],
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
    
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['rol_id' => 'id']);
    }
    
    public function afterSave($insert, $changedAttributes)
    {
        if(isset($this->operaciones))
        {
            \Yii::$app->db->createCommand()->delete('rol_operacion', 'rol_id = '.(int) $this->id)->execute();
     
            if(is_array($this->operaciones)>0){
                foreach ($this->operaciones as $id) {
                        $ro = new RolOperacion();
                        $ro->rol_id = $this->id;
                        $ro->operacion_id = $id;
                        $ro->save();
                    }
            }
        }
        elseif(isset($this->usuarios))
        {
            \Yii::$app->db->createCommand()->delete('rol_usuario', 'rol_id = '.(int) $this->id)->execute();
            //echo "<pre>";print_r($this->usuarios);die();
            if(is_array($this->usuarios)>0){
                foreach ($this->usuarios as $id) {
                    $ru = new RolUsuario();
                    $ru->rol_id = $this->id;
                    $ru->usuario_id = $id;
                    $ru->save();
                }
            }
        }
        elseif(isset($this->menues))
        {
            \Yii::$app->db->createCommand()->delete('rol_menu', 'rol_id = '.(int) $this->id)->execute();
            if(is_array($this->menues)>0){
                foreach ($this->menues as $id) {
                    $rm = new RolMenu();
                    $rm->rol_id = $this->id;
                    $rm->menu_id = $id;
                    $rm->save();
                }        
            }
        }
    }

    public function getRolOperaciones()
    {
        return $this->hasMany(RolOperacion::className(), ['rol_id' => 'id']);
    }

    public function getOperacionesPermitidas()
    {
        return $this->hasMany(Operacion::className(), ['id' => 'operacion_id'])
            ->viaTable('rol_operacion', ['rol_id' => 'id']);
    }
 
    public function getOperacionesPermitidasList()
    {
        return $this->getOperacionesPermitidas()->asArray();
    }
    
    public function getRolUsuarios()
    {
        return $this->hasMany(RolUsuario::className(), ['rol_id' => 'id']);
    }
    
    public function getUsuariosPermitidos()
    {
        return $this->hasMany(User::className(), ['id' => 'usuario_id'])
            ->viaTable('rol_usuario', ['rol_id' => 'id']);
    }
 
    public function getUsuariosPermitidosList()
    {
        return $this->getUsuariosPermitidos()->asArray();
    }
    
    public function getRolMenues()
    {
        return $this->hasMany(RolMenu::className(), ['rol_id' => 'id']);
    }
    
    public function getMenuesPermitidos()
    {
        return $this->hasMany(Menu::className(), ['id_menu' => 'menu_id'])
            ->viaTable('rol_menu', ['rol_id' => 'id']);
    }
 
    public function getMenuesPermitidosList()
    {
        return $this->getMenuesPermitidos()->asArray();
    }

}
