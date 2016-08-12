<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Rol */

$this->title = 'Update Rol: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Rols', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="rol-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'tipoOperaciones' => $tipoOperaciones
    ]) ?>

</div>
