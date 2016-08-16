<?
namespace common\widgets;

use yii;
use yii\base\Widget;
//use yii\helpers\Html;
//use yii\bootstrap\NavBar;
use yii\bootstrap\Nav;

class GMDMenu extends Widget
{
    public $message;

    public function init()
    {
        parent::init();
        if ($this->message === null) {
            $this->message = 'Hello World';
        }
    }

    public function run()
    {
        //return Html::encode($this->message);

        $lines = '';
        /*$lines = Html::encode(NavBar::begin([
         'brandLabel' => 'MeetingPlanner',//Yii::t('frontend','MeetingPlanner.io'), //
         'brandUrl' => Yii::$app->homeUrl,
         'options' => [
         'class' => 'navbar-inverse navbar-fixed-top',
         ],
        ]));*/

         if (Yii::$app->user->isGuest)
         {
            $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
            $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
            //$menuItems[] = ['label' => Yii::t('frontend','Signup'), 'url' => ['/site/signup']];
            //$menuItems[] = ['label' => Yii::t('frontend','Login'), 'url' => ['/site/login']];
         }
         else 
         {
            $menuItems = [
            ['label' => 'Meetings', 'url' => ['/meeting'], 'image' => 'glyphicon glyphicon-info'],
            ['label' => '<span class="glyphicon glyphicon-home"></span>Places', 'url' => ['/place/yours']],
            //['label' => Yii::t('frontend','Meetings'), 'url' => ['/meeting']],
            //['label' => Yii::t('frontend','Places'), 'url' => ['/place/yours']],
            ];
         }
         //$menuItems[]=['label' => Yii::t('frontend','About'),
         $menuItems[]=['label' => 'About',
         'items' => [
            ['label' => 'Learn more', 'url' => ['/site/about']],
            ['label' => 'Contact us', 'url' => ['/site/contact']],
            //['label' => Yii::t('frontend','Learn more'), 'url' => ['/site/about']],
            //['label' => Yii::t('frontend','Contact us'), 'url' => ['/site/contact']],
            ],
         ];
         if (!Yii::$app->user->isGuest) 
         {
            $menuItems[] = [
            'label' => 'Account',
            'items' => [
               [
                  //'label' => Yii::t('frontend','Friends'),
                  'label' => 'Friends',
                  'url' => ['/friend'],
               ],
               [
               //'label' => Yii::t('frontend','Contact information'),
               'label' => 'Contact information',
               'url' => ['/user-contact'],
               ],
               [
               //'label' => Yii::t('frontend','Settings'),
               'label' => 'Settings',
               'url' => ['/user-setting'],
               ],
               [
               //'label' => Yii::t('frontend','Logout').' (' . Yii::$app->user->identity->username . ')',
               'label' => 'Logout'.' (' . Yii::$app->user->identity->username . ')',
               'url' => ['/site/logout'],
               'linkOptions' => ['data-method' => 'post']
               ],
            ],
         ];
         }
        
        $lines .= Nav::widget([
         'options' => ['class' => 'navbar-nav navbar-right'],
         'encodeLabels' => false,
         'items' => $menuItems,
         ]);
         
        //$lines .= Html::encode(NavBar::end());
        return $lines;
        //return implode("\n", $lines);
    }
}
?>