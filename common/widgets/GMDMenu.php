<?
namespace common\widgets;

use yii;
use yii\base\Widget;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use common\models\Menu;
use yii\helpers\ArrayHelper;
use kartik\nav\NavX;

class GMDMenu extends Widget
{
   public $message;

   public function init()
   {
      parent::init();
      if ($this->message === null) 
      {
         $this->message = 'Hello World';
      }
   }

   public function run()
   {
      $lines = '';

      $home = [  
         ['label' => 'Home', 'url' => ['/site/index']],
         ['label' => 'About', 'url' => ['/site/about']],
         ['label' => 'Contact', 'url' => ['/site/contact']],
      ];
   
      if (Yii::$app->user->isGuest) 
      {
         $menuItems = $home;
         $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
         $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
      }
      else
      {
         $menuItems = Menu::getTree();       
         $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
            'Logout (' . Yii::$app->user->identity->username . ')',
               ['class' => 'btn btn-link']
            )
            . Html::endForm()
            . '</li>';
         $menuItems = ArrayHelper::merge($home,$menuItems);
      }
      /*echo "<pre>";
      print_r($menuItems);
      die;*/
      $lines .= NavX::widget([
         'options' => ['class' => 'navbar-nav  navbar-right'],
         'items' => $menuItems,
         'activateItems' => true,
         'activateParents' => true,
         'encodeLabels' => false
      ]);

      /*$lines .= Nav::widget([
         'options' => ['class' => 'navbar-nav navbar-right'],
         'encodeLabels' => false,
         'items' => $menuItems,
      ]);*/

      return $lines;
   }
}
?>