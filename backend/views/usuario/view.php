<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Usuario */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuario-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
            'email:email',
            'status',
            //'role',
            //'created_at',
            //'updated_at',
            //'rol_id',
        ],
    ]) ?>

    <h2>Roles Asignados</h2>
    <?php
    foreach ($model->rolesPermitidosList as $rolesPermitidos) {
       echo $rolesPermitidos['nombre'] . " - ";
    }
   ?>
    <h2>Operaciones no Permitidas</h2>
    <?php
    foreach ($model->operacionesPermitidasList as $operacionesPermitidas) {
       echo $operacionesPermitidas['nombre'] . " - ";
    }
   ?>
    
</div>
