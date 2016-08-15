<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Orden */

$this->title = 'Create Orden';
$this->params['breadcrumbs'][] = ['label' => 'Ordens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orden-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
