<?php 
namespace frontend\controllers; 
use Yii; 
use yii\web\Controller; 
use common\models\AccessHelpers; 
use common\models\Menu;
 
class BaseController extends Controller { 
 
    //public $items_menu = array(['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
    //                ['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => ['/gii']],
    //                ['label' => 'Debug', 'icon' => 'fa fa-dashboard', 'url' => ['/debug']],);
	public $items_menu;// = Menu::getTree(0) 
	
	public function init(){
        parent::init();
		$this->items_menu = Menu::getTreeLte();
		//print_r($this->items_menu); die;
		
    }
	/*public function beforeAction($action) { 
        if (!parent::beforeAction($action)) { 
             return false; 
        } 
        $operacion = str_replace("/", "-", Yii::$app->controller->route);
        $permitirSiempre = ['site-captcha', 'site-signup', 'site-index', 'site-error', 'site-about', 'site-contact', 'site-login', 'site-logout'];
 
        if (in_array($operacion, $permitirSiempre)) {
            return true;
        }
        if (!AccessHelpers::getAcceso($operacion)) {
            echo $this->render('/site/nopermitido');
            return false;
        }
 
        return true;
    }*/
}
?>