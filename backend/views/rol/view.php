<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Rol */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Roles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rol-view">

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
            'nombre',
        ],
    ]) ?>
    <h2>Operaciones Permitidas</h2>
    <?php
    foreach ($model->operacionesPermitidasList as $operacionPermitida) {
       echo $operacionPermitida['nombre'] . " - ";
    }
   ?>
    <h2>Usuarios Permitidos</h2>
    <?php
    foreach ($model->usuariosPermitidosList as $usuariosPermitidos) {
       echo $usuariosPermitidos['username'] . " - ";
    }
   ?>
    <h2>Menues Permitidos</h2>
    <?php
    //print_r($model->menuesPermitidosList);die;
    foreach ($model->menuesPermitidosList as $menuesPermitidos) {
       echo $menuesPermitidos['descripcion'] . " - ";
    }
   ?>

</div>
