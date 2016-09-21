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

    <? 
        if($action == 'default')
            echo $form->field($model, 'username')->textInput(['maxlength' => true]);
        else     
            echo $form->field($model, 'username')->textInput(['maxlength' => true, 'readonly' => true]);
    ?>

    <?php
    if($action == 'Rol'){
        $opciones = \yii\helpers\ArrayHelper::map($listaOpciones, 'id', 'nombre');
        
        //echo $form->field($model, 'operaciones')->checkboxList($opciones, ['unselect'=>NULL]);
        $options = [
            'multiple' => true,
            'size' => 10,
        ];
        // echo $form->field($model, $attribute)->listBox($items, $options);
        echo $form->field($model, 'roles')->widget(DualListbox::className(),[
            'items' => $opciones,
            'options' => $options,
            'clientOptions' => [
                'moveOnSelect' => false,
                'selectedListLabel' => 'Selected Items',
                'nonSelectedListLabel' => 'Available Items',
            ],
        ]);
    }elseif($action == 'permiso'){
        $opciones = \yii\helpers\ArrayHelper::map($listaOpciones, 'id', 'nombre');
        
        //echo $form->field($model, 'permisos')->checkboxList($opciones, ['unselect'=>NULL]);
        $options = [
            'multiple' => true,
            'size' => 10,
        ];
        // echo $form->field($model, $attribute)->listBox($items, $options);
        echo $form->field($model, 'permisos')->widget(DualListbox::className(),[
            'items' => $opciones,
            'options' => $options,
            'clientOptions' => [
                'moveOnSelect' => false,
                'selectedListLabel' => 'Selected Items',
                'nonSelectedListLabel' => 'Available Items',
            ],
        ]);
    }
    
    ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
