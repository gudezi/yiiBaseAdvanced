<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use softark\duallistbox\DualListbox;

/* @var $this yii\web\View */
/* @var $model backend\models\Rol */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rol-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>
    <?php
    $opciones = \yii\helpers\ArrayHelper::map($tipoOperaciones, 'id', 'nombre');
    
    //echo $form->field($model, 'operaciones')->checkboxList($opciones, ['unselect'=>NULL]);
    $options = [
        'multiple' => true,
        'size' => 10,
    ];
    // echo $form->field($model, $attribute)->listBox($items, $options);
    echo $form->field($model, 'operaciones')->widget(DualListbox::className(),[
        'items' => $opciones,
        'options' => $options,
        'clientOptions' => [
            'moveOnSelect' => false,
            'selectedListLabel' => 'Selected Items',
            'nonSelectedListLabel' => 'Available Items',
        ],
    ]);
    ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
