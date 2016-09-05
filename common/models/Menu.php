<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "menu".
 *
 * @property integer $id_menu
 * @property string $descripcion
 * @property string $imagen
 * @property string $destino
 * @property string $directorio
 * @property string $perfil
 * @property integer $activo
 * @property integer $padre
 * @property integer $submenu
 * @property integer $orden
 * @property string $grupo
 * @property string $target
 */
class Menu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'menu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['activo', 'padre', 'submenu', 'orden'], 'integer'],
            [['descripcion', 'imagen', 'grupo'], 'string', 'max' => 100],
            [['destino', 'directorio', 'perfil'], 'string', 'max' => 200],
            [['target'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_menu' => 'Id Menu',
            'descripcion' => 'Descripcion',
            'imagen' => 'Imagen',
            'destino' => 'Destino',
            'directorio' => 'Directorio',
            'perfil' => 'Perfil',
            'activo' => 'Activo',
            'padre' => 'Padre',
            'submenu' => 'Submenu',
            'orden' => 'Orden',
            'grupo' => 'Grupo',
            'target' => 'Target',
        ];
    }
    public static function findByParent($id)
    {
        return static::findAll(['padre' => $id, 'activo' => '1']);
    }
    public static function getTree($id = 0)
    {
        $return = array();
      
        $menu = static::findAll(['padre' => $id, 'activo' => '1']); 

        $menu = ArrayHelper::toArray($menu, [
            'common\models\Menu' => [
            'id' => 'id_menu','descripcion','imagen','destino',
            'padre','submenu'
            ],
        ]);

        foreach($menu as $item)
        {
            $ret=array();
            if($item['imagen']=='')
            {
                $ret['label']=$item['descripcion'];
            }
            else
            {
                $imagen = "<span class='glyphicon glyphicon-".$item['imagen']."'></span>";
                $ret['label']=$imagen.' '.$item['descripcion'];
            }
            if($item['submenu']=='1')
            {
                $items =	static::getTree($item['id']);
                if( count($items)>0)
                {
                    $ret['items']=$items;
                }
            }
            else
            {
                $ret['url']=[$item['destino']];
            }
            $return[]=$ret;
        }
        return $return;
    }
   
    public static function getTreeLte($id = 0)
    {
        $return = array();
      
        $menu = static::findAll(['padre' => $id, 'activo' => '1']); 

        $menu = ArrayHelper::toArray($menu, [
            'common\models\Menu' => [
            'id' => 'id_menu','descripcion','imagen','destino',
            'padre','submenu'
            ],
        ]);

        foreach($menu as $item)
        {
            $ret=array();
            $ret['label']=$item['descripcion'];
		 
            if($item['imagen']!='')
            {
                $ret['icon']="fa fa-".$item['imagen'];
            }

            if($item['submenu']=='1')
            {
                $ret['url'] = '#';
                $items = static::getTreeLte($item['id']);
                if( count($items)>0)
                {
                    $ret['items']=$items;
                }
            }
            else
            {
                $ret['url']=[$item['destino']];
            }
            $return[]=$ret;
        }
        return $return;
    }
    
    public function getPadre0()
    {
        return $this->hasOne(Menu::className(), ['id_menu' => 'padre']);
    }
}
