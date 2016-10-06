<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\UsuarioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuario-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php //= Html::a('Create Usuario', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
            'email:email',
            'status',
            // 'role',
            // 'created_at',
            // 'updated_at',
            //'rol_id',
            ['class' => 'yii\grid\ActionColumn',
            'template' => '{view} {delete} {profile} {rol} {permiso}',
            'buttons' => [
                'profile' => function ($url, $model, $key) {
                    return Html::a('<span class="glyphicon glyphicon-user"></span>', $url, [
                                        'title' => 'Profile',
                                ]);                                
                },
                'rol' => function ($url, $model, $key) {
                    return Html::a('<span class="glyphicon glyphicon-list-alt"></span>', $url, [
                                        'title' => 'Rol',
                                ]);                                
                },
                'permiso' => function ($url, $model, $key) {
                    return Html::a('<span class="glyphicon glyphicon-tasks"></span>', $url, [
                                        'title' => 'Permiso',
                                ]);                                
                }

                ]
            ]
        ],
    ]); ?>
</div>
