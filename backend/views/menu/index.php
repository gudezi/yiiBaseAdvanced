<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\MenuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Menus';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Menu', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_menu',
            'descripcion',
            'imagen',
            'destino',
            //'directorio',
            // 'perfil',
            [
               'attribute' => 'padre',
               'value' => 'padre0.descripcion',
               'filter' => yii\helpers\ArrayHelper::map(common\models\menu::find()->all(), 'id_menu', 'descripcion')
            ],
            [
               'attribute' => 'submenu',
               'format' => 'boolean',
               'filter' => [1 => 'Yes', 0 => 'No']
            ],
            [
               'attribute' => 'activo',
               'format' => 'boolean',
               'filter' => [1 => 'Yes', 0 => 'No']
            ],
            //'activo',
            //'padre',
            //'submenu',
            // 'orden',
            // 'grupo',
            // 'target',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
