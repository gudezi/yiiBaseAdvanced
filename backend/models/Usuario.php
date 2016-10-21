<?php

namespace backend\models;

use Yii;
use common\models\Profile;
use common\models\User;
use backend\models\RolUsuario;
use backend\models\UsuarioOperacion;

/**
 * This is the model class for table "usuario".
 *
 * @property integer $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $status
 * @property integer $role
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $rol_id
 */
class Usuario extends \yii\db\ActiveRecord
{
    
    public $roles;
    
    public $permisos;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at'], 'required'],
            [['status', 'role', 'created_at', 'updated_at', 'rol_id'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
            [['roles','permisos'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Usuario',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Estado',
            'role' => 'Rol',
            'created_at' => 'Creado',
            'updated_at' => 'Modificado',
            'rol_id' => 'Rol ID',
        ];
    }
    
    public function afterSave($insert, $changedAttributes)
    {
        if(isset($this->roles))
        {
            \Yii::$app->db->createCommand()->delete('rol_usuario', 'usuario_id = '.(int) $this->id)->execute();
            //echo "<pre>";print_r($this);die;
            if(is_array($this->roles)>0){
                foreach ($this->roles as $id) {
                    $ru = new RolUsuario();
                    $ru->usuario_id = $this->id;
                    $ru->rol_id = $id;
                    $ru->save();
                }
            }
        }
        if(isset($this->permisos))
        {
            \Yii::$app->db->createCommand()->delete('usuario_operacion', 'usuario_id = '.(int) $this->id)->execute();
            //echo "<pre>";print_r($this);die;
            if(is_array($this->permisos)>0){
                foreach ($this->permisos as $id) {
                    //echo $id."<br>";
                    $uo = new UsuarioOperacion();
                    $uo->usuario_id = $this->id;
                    $uo->operacion_id = $id;
                    $uo->save();
                }
            }
            //die;
        }
    }
    
    public function getProfile()
    {
        $profile = Profile::find()->where(['id'=>$this->id])->one();
        if ($profile !==null)
            return $profile;
        return false;
    }
    
    public function getRolUsuarios()
    {
        return $this->hasMany(RolUsuario::className(), ['usuario_id' => 'id']);
    }
    
    public function getRolesPermitidos()
    {
        return $this->hasMany(Rol::className(), ['id' => 'rol_id'])
            ->viaTable('rol_usuario', ['usuario_id' => 'id']);
    }
 
    public function getRolesPermitidosList()
    {
        return $this->getRolesPermitidos()->asArray();
    }

    public function getUsuarioOperacion()
    {
        return $this->hasMany(UsuarioOperacion::className(), ['usuario_id' => 'id']);
    }
    
    public function getOperacionesPermitidas()
    {
        return $this->hasMany(Operacion::className(), ['id' => 'operacion_id'])
            ->viaTable('usuario_operacion', ['usuario_id' => 'id']);
    }
 
    public function getOperacionesPermitidasList()
    {
        return $this->getOperacionesPermitidas()->asArray();
    }
}
