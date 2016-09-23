<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Rol */

$this->title = 'Crear Rol';
$this->params['breadcrumbs'][] = ['label' => 'Roles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$action='default';
?>
<div class="rol-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'listaOpciones' => $listaOpciones,
        'action' => $action
    ]) ?>

</div>
