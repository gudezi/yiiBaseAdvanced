<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Collapse;
use yii\bootstrap\NavBar;
use yii\bootstrap\Nav;
use kartik\widgets\DatePicker;
use kartik\daterange\DateRangePicker;
use yii\widgets\Menu;
use common\widgets\GMDMenu;

//use kartik\icons\Icon;
//Icon::map($this);

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\OrdenSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ordens';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orden-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
	<?php echo Collapse::widget([
    'items' => [
        [
            'label' => 'Buscar',
            'content' => $this->render('_search', ['model' => $searchModel]) ,
        ],
    ]
]);
?>

    <p>
        <?= Html::a('Create Orden', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
	
       <?
/*NavBar::begin([
'brandLabel' => 'MeetingPlanner',//Yii::t('frontend','MeetingPlanner.io'), //
'brandUrl' => Yii::$app->homeUrl,
'options' => [
'class' => 'navbar-inverse navbar-fixed-top',
],
]);
if (Yii::$app->user->isGuest) {
$menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
$menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
//$menuItems[] = ['label' => Yii::t('frontend','Signup'), 'url' => ['/site/signup']];
//$menuItems[] = ['label' => Yii::t('frontend','Login'), 'url' => ['/site/login']];
} else {
$menuItems = [
['label' => Icon::Show('home').'Meetings', 'url' => ['/meeting'], 'image' => 'glyphicon glyphicon-info'],
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
if (!Yii::$app->user->isGuest) {
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
echo Nav::widget([
'options' => ['class' => 'navbar-nav navbar-right'],
'encodeLabels' => false,
'items' => $menuItems,
]);
NavBar::end();*/
?>
<?
//echo GMDMenu::widget(['message' => 'Hola Prueba de Widget']);

/*echo Menu::widget([
  'items' => [
          // Important: you need to specify url as 'controller/action',
          // not just as 'controller' even if default action is used.
          ['label' => 'Home', 'url' => ['site/index']],
          // 'Products' menu item will be selected as long as the route is 'product/index'
          ['label' => 'Products', 'url' => ['product/index'], 'items' => [
              ['label' => 'New Arrivals', 'url' => ['product/index', 'tag' => 'new']],
              ['label' => 'Most Popular', 'url' => ['product/index', 'tag' => 'popular']],
          ]],
          ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
      ],
      'options' => ['class' => 'navbar-nav navbar-right'],
      //navbar-inverse navbar-fixed-top
  ]);*/
?>

	<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
 
        'id',
        'cliente_id',
        //'fecha',
        [
            'attribute' => 'rango_fecha',
            'value' => 'fecha',
            'format'=>'raw',
            'options' => ['style' => 'width: 25%;'],
            'filter' => DateRangePicker::widget([
                'language' => 'es',
                'model' => $searchModel,
                'attribute' => 'rango_fecha',
                'useWithAddon'=>false,
                'convertFormat'=>true,
                'pluginOptions'=>[
                    'locale'=>['format'=>'Y-m-d']
                ],
            ])
        ],
        'estado',
 
        ['class' => 'yii\grid\ActionColumn'],
    ],
	]); ?>
	
	<?/*= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        'id',
        'cliente_id',
        //'fecha',
        [
            'attribute' => 'fecha',
            'value' => 'fecha',
            'format' => 'raw',
            'options' => ['style' => 'width: 20%;'],
            'filter' => DatePicker::widget([
                'model' => $searchModel,
                'attribute' => 'fecha',
                'options' => ['placeholder' => ''],
                'pluginOptions' => [
                    'id' => 'fecha2',
                    'autoclose'=>true,
                    'format' => 'yyyy-mm-dd',
                    'startView' => 'year',
                ]
            ])
        ],
        'estado',

        ['class' => 'yii\grid\ActionColumn'],
    ],
	]); */?>
	
    <?/*= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'cliente_id',
            'fecha',
            'estado',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); */?>
</div>
