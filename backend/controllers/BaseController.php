<?php 
namespace backend\controllers; 
use Yii; 
use yii\web\Controller; 
use common\models\AccessHelpers; 
use common\models\Menu;
use yii\helpers\ArrayHelper;
 
class BaseController extends Controller { 
 
	public $items_menu;
    public $items_message;
    public $items_alert;
    public $items_task;
    public $items_flag;
	
	public function init(){
      parent::init();
		$home = [  
			['label' => 'Inicio', 'icon' => 'fa fa-home', 'url' => ['/site/index']],
			//['label' => 'Acerca', 'icon' => 'fa fa-info', 'url' => ['/site/about']],
			//['label' => 'Contacto', 'icon' => 'fa fa-envelope-o', 'url' => ['/site/contact']],
		];
		if (Yii::$app->user->isGuest)
		{
			$this->items_menu = $home;
		}
		else
		{
			//$menu = Menu::getTreeLte();
            $menu = [  
                ['label' => 'Usuarios', 'icon' => 'fa fa-user', 'url' => ['/usuario']],
                ['label' => 'Operaciones', 'icon' => 'fa fa-tasks', 'url' => ['/operacion']],
                ['label' => 'Roles', 'icon' => 'fa fa-heart', 'url' => ['/rol']],
                ['label' => 'Menues', 'icon' => 'fa fa-navicon  ', 'url' => ['/menu']],
            ];
			$this->items_menu = ArrayHelper::merge($home,$menu);
		}	

        $items = array();
        $item['url']='';
        $item['user']='Equipo de soporte';
        $item['image']='';
        $item['time']='5 min';
        $item['message']='Hacemos el deploy?';
        $items[]=$item;

        $item['url']='';
        $item['user']='Equipo de soporte';
        $item['image']=Yii::$app->getUrlManager()->getBaseUrl().'/uploads/'.Yii::$app->user->identity->profile->photo_cropped;
        $item['time']='5 min';
        $item['message']='Hacemos el deploy?';
        $items[]=$item;
        $this->items_message = $items;
        
        $items = array();
        $item['url']='';
        $item['user']='';
        $item['image']='';
        $item['time']='';
        $item['message']='5 usuarios se agregarón hoy';
        $items[]=$item;

        $item['url']='';
        $item['user']='';
        $item['image']='info';
        $item['time']='';
        $item['message']='10 usuarios se agregarón hoy';
        $items[]=$item;
        $this->items_alert = $items;
        
        $items = array();
        $item['url']='';
        $item['user']='';
        $item['image']='';
        $item['time']=40;
        $item['message']='Customizar el adminlte';
        $items[]=$item;

        $item['url']='';
        $item['user']='';
        $item['image']='';
        $item['time']=20;
        $item['message']='Customizar el yii2';
        $items[]=$item;

        $item['url']='';
        $item['user']='';
        $item['image']='';
        $item['time']=95;
        $item['message']='Deploy WebSofse';
        $items[]=$item;
        $this->items_task = $items;        
                
        $items = array();
        $item['url']='';
        $item['user']='';
        $item['image']='';
        $item['time']='';
        $item['message']='SECTOR AZUL';
        $items[]=$item;

        $item['url']='';
        $item['user']='';
        $item['image']='info';
        $item['time']='';
        $item['message']='SECTOR ROJO';
        $items[]=$item;
        $this->items_flag = $items;     
    }

    /*	public function beforeAction($action) { 
        if (!parent::beforeAction($action)) { 
             return false; 
        } 
        $operacion = str_replace("/", "-", Yii::$app->controller->route);
        //die($operacion);
        $permitirSiempre = ['site-captcha', 'site-signup', 'site-index', 'site-error', 'site-about', 'site-contact', 'site-login', 'site-logout'];
 
        if (in_array($operacion, $permitirSiempre)) {
            return true;
        }
        if (!AccessHelpers::getAcceso($operacion)) {
            echo $this->render('//site/nopermitido');
            return false;
        }
 
        return true;
    }*/
}
?>