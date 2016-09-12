<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\MenuSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="menu-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_menu') ?>

    <?= $form->field($model, 'descripcion') ?>

    <?= $form->field($model, 'imagen') ?>

    <?= $form->field($model, 'destino') ?>

    <?= $form->field($model, 'directorio') ?>

    <?php // echo $form->field($model, 'perfil') ?>

    <?php // echo $form->field($model, 'activo') ?>

    <?php // echo $form->field($model, 'padre') ?>

    <?php // echo $form->field($model, 'submenu') ?>

    <?php // echo $form->field($model, 'orden') ?>

    <?php // echo $form->field($model, 'grupo') ?>

    <?php // echo $form->field($model, 'target') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
