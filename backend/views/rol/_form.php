<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use softark\duallistbox\DualListbox;
use gudezi\fancytree\FancytreeWidget;

/* @var $this yii\web\View */
/* @var $model backend\models\Rol */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rol-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php 
        if($action == 'default')
            echo $form->field($model, 'nombre')->textInput(['maxlength' => true]);
        else     
            echo $form->field($model, 'nombre')->textInput(['maxlength' => true, 'readonly' => true]);
    ?>

    <?php
    if($action == 'default'){
        $opciones = \yii\helpers\ArrayHelper::map($listaOpciones, 'id', 'nombre');
        
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
                'selectedListLabel' => 'Operaciones Seleccionadas',
                'nonSelectedListLabel' => 'Operaciones Disponibles',
                'filterTextClear' => 'mostrar todo',
                'filterPlaceHolder' => 'Filtro',
                'moveSelectedLabel' => 'Mover seleccionado',
                'moveAllLabel' => 'Mover todo',
                'removeSelectedLabel' => 'Borrar seleccionado',
                'removeAllLabel' => 'Borrar todo',
                'infoText' => 'Mostrando todo {0}',
                'infoTextFiltered' => '<span class="label label-warning">Filtrado</span> {0} de {1}',
                'infoTextEmpty' => 'Lista Vacia',
            ],
        ]);
    }elseif($action == 'user'){
        $opciones = \yii\helpers\ArrayHelper::map($listaOpciones, 'id', 'username');
        
        //echo $form->field($model, 'usuarios')->checkboxList($opciones, ['unselect'=>NULL]);
        $options = [
            'multiple' => true,
            'size' => 10,
        ];
        // echo $form->field($model, $attribute)->listBox($items, $options);
        echo $form->field($model, 'usuarios')->widget(DualListbox::className(),[
            'items' => $opciones,
            'options' => $options,
            'clientOptions' => [
                'moveOnSelect' => false,
                'selectedListLabel' => 'Usuarios Seleccionados',
                'nonSelectedListLabel' => 'usuarios Disponibles',
                'filterTextClear' => 'mostrar todo',
                'filterPlaceHolder' => 'Filtro',
                'moveSelectedLabel' => 'Mover seleccionado',
                'moveAllLabel' => 'Mover todo',
                'removeSelectedLabel' => 'Borrar seleccionado',
                'removeAllLabel' => 'Borrar todo',
                'infoText' => 'Mostrando todo {0}',
                'infoTextFiltered' => '<span class="label label-warning">Filtrado</span> {0} de {1}',
                'infoTextEmpty' => 'Lista Vacia',
            ],
        ]);
    }elseif($action == 'menu'){
        //echo "<pre>"; print_r($model->TreeCheck);die; 
        //print_r($model->id_menu);die;
        echo $form->field($model, 'menues')->widget(FancytreeWidget::classname(), [
            'name' => 'fancytree',
            'source' => $listaOpciones,
            'selectMode' => FancytreeWidget::SELECT_MULTI,
            'checkbox' => true,
            //'idfield' => 'id_menu',
            //'parent' => 'padre', //$id, // parent category id (if exist)
            'btnExpandAll' => false,
            'btnCollapseAll' => false,
            'btnToggleExpand' => true,
            'btnSelectAll' => true,
            'btnUnselectAll' => true,
            'btnToggleSelect' => false,
            'childcounter' => true,
            'glyph'=> true,
            'filter' => true,
            'options' => [//'id' => 'gus',
            ],
        ]); 

        /*$opciones = \yii\helpers\ArrayHelper::map($listaOpciones, 'id_menu', 'descripcion');
        //echo $form->field($model, 'menues')->checkboxList($opciones, ['unselect'=>NULL]);
        $options = [
            'multiple' => true,
            'size' => 10,
        ];
        // echo $form->field($model, $attribute)->listBox($items, $options);
        echo $form->field($model, 'menues')->widget(DualListbox::className(),[
            'items' => $opciones,
            'options' => $options,
            'clientOptions' => [
                'moveOnSelect' => false,
                'selectedListLabel' => 'Selected Items',
                'nonSelectedListLabel' => 'Available Items',
            ],
        ]);*/
    }
    
    ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
