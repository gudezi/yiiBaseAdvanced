<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\RolSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Rols';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rol-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Rol', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nombre',

            ['class' => 'yii\grid\ActionColumn',
            'template' => '{view} {delete} {update} {menu} {usuario}',
                        'buttons' => [
                'menu' => function ($url, $model, $key) {
                   //if($key == 1)
                   //{
                    return Html::a('<span class="glyphicon glyphicon-th-list"></span>', $url, [
                                        'title' => Yii::t('yii', 'Menu'),
                                ]);                                
                   /*}
                   else
                   {
                      return Html::a('<span class="glyphicon glyphicon-arrow-down"  style="visibility: hidden"></span>');
                   }*/
                },
                'usuario' => function ($url, $model, $key) {
                   /*$urlConfig = [];
                   foreach ($model->attributes as $clave => $valor) {
                        $urlConfig[$clave] = $valor;
                   }
                   $url = Url::toRoute(array_merge(['datos'], $urlConfig));
                   if($model->attributes['sexo'] == 2)
                   {*/
                    return Html::a('<span class="glyphicon glyphicon-user"></span>', $url, [
                                        'title' => Yii::t('yii', 'Usuario'),
                                ]);                                
                   /*}
                   else
                   {
                      return Html::a('<span class="glyphicon glyphicon-arrow-down" style="visibility: hidden"></span>');
                   }*/

                }
            ]
            ],
        ],
        
        
    ]); ?>
</div>
