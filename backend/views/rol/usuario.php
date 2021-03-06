<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Rol */

$this->title = 'Usuarios por Rol: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Roles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Usuarios x Rol';
$action='user';
?>
<div class="rol-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'listaOpciones' => $listaOpciones,
        'action' => $action
    ]) ?>

</div>
