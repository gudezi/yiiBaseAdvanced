<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Orden */

$this->title = 'Update Orden: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ordens', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="orden-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
