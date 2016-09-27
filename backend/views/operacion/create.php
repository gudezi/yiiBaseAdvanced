<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Operacion */

$this->title = 'Crear Operacion';
$this->params['breadcrumbs'][] = ['label' => 'Operaciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="operacion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
