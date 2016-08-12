<?php 
namespace frontend\controllers; 
use Yii; 
use yii\web\Controller; 
use common\models\AccessHelpers; 
 
class BaseController extends Controller { 
 
    public function beforeAction($action) { 
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
    }
}
?>