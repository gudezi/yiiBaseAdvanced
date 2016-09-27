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