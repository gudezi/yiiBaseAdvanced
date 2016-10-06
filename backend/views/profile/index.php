<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProfileSearch */ 
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Profiles';
$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['..\usuario\index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profile-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php//= Html::a('Create Profile', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id',
            [
               'attribute' => 'id',
               'value' => 'username0.username',
               'filter' => yii\helpers\ArrayHelper::map(common\models\user::find()->all(), 'id', 'username')
            ],
            'apellido',
            'nombre',
            //'perfil',
            //'grupo',
            // 'entidad',
            // 'empresa',
            // 'calle',
            // 'numero',
            // 'piso',
            // 'depto',
            // 'pais_id',
            // 'provincia_id',
            // 'partido_id',
            // 'localidad_id',
            // 'coordenadas',
            ['attribute' => 'telefono','filter' => false],
            ['attribute' => 'celular','filter' => false],
            //'telefono',
            //'celular',
            ['class' => 'yii\grid\ActionColumn',
            'template' => '{view}'
            ],
        ],
    ]); ?>
</div>
