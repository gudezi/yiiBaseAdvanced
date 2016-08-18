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
