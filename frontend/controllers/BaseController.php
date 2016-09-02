<?php 
namespace frontend\controllers; 
use Yii; 
use yii\web\Controller; 
use common\models\AccessHelpers; 
use common\models\Menu;
use yii\helpers\ArrayHelper;
 
class BaseController extends Controller { 
 
	public $items_menu;
	
	public function init(){
      parent::init();
		$home = [  
			['label' => 'Home', 'icon' => 'fa fa-home', 'url' => ['/site/index']],
			['label' => 'About', 'icon' => 'fa fa-info', 'url' => ['/site/about']],
			['label' => 'Contact', 'icon' => 'fa fa-mail', 'url' => ['/site/contact']],
		];
		if (Yii::$app->user->isGuest)
		{
			$this->items_menu = $home;
		}
		else
		{
			$menu = Menu::getTreeLte();
			$this->items_menu = ArrayHelper::merge($home,$menu);
		}	
    }

	public function beforeAction($action) { 
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
    }
}
?>