<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Operacion */

$this->title = 'Generar Operaciones';
$this->params['breadcrumbs'][] = ['label' => 'Operaciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="operacion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="operacion-form">

        <?php $form = ActiveForm::begin(); ?>

        <?//= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>
        <?//$htmlOptions = array('size' => '5', 'prompt'=>'Use CTRL to Select Multiple Staff', 'multiple' => 'true', 'options' => $selected);?>
        <?= $form->field($model, 'nombre')->checkboxList($acciones, $htmlOptions)?>
        <div class="form-group">
            <?= Html::submitButton('Generar', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>