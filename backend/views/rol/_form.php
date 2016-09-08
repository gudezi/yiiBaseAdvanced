<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
//use softark\duallistbox\DualListbox;
use andru19\fancytree\FancytreeWidget;

/* @var $this yii\web\View */
/* @var $model backend\models\Rol */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rol-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>
    <div id='gus' style='background:red;'> hola </div>
    <?php
    //$opciones = \yii\helpers\ArrayHelper::map($tipoOperaciones, 'id', 'nombre');
    
    //echo $form->field($model, 'operaciones')->checkboxList($opciones, ['unselect'=>NULL]);
    $options = [
        'multiple' => true,
        'size' => 10,
    ];
    // echo $form->field($model, $attribute)->listBox($items, $options);
    /*echo $form->field($model, 'operaciones')->widget(DualListbox::className(),[
        'items' => $opciones,
        'options' => $options,
        'clientOptions' => [
            'moveOnSelect' => false,
            'selectedListLabel' => 'Selected Items',
            'nonSelectedListLabel' => 'Available Items',
        ],
    ]);*/
    
    /*$data = [
    ['title' => 'Node 1', 'key' => 1],
    ['title' => 'Folder 2', 'key' => '3', 'folder' => true, 'children' => [
        ['title' => 'Node 2.1', 'key' => '2'],
        ['title' => 'Node 2.2', 'key' => '4']
    ]]
    ];*/
    /*$data = [
    ['title' => 'Node 1', 'key' => 1],
    ['title' => 'Folder 2', 'key' => 3], 
    ['title' => 'Node 2.1', 'key' => 2],
    ['title' => 'Node 2.2', 'key' => 4]
    
    ];*/
    
    $data = \yii\helpers\ArrayHelper::toArray($tipoOperaciones, [
        'backend\models\Operacion' => ['title' => 'nombre', 'key' => 'id'],
    ]);
    //echo "<pre>"; print_r($data);die;
    //print_r($tipoMenu); die;
    
    //print_r($opciones);die;
    //$data = \yii\helpers\ArrayHelper::toArray($tipoOperaciones,'key => id');
    
    //print_r($data);//die;
    
    echo $form->field($model, 'operaciones')->widget(FancytreeWidget::classname(), [
            'name' => 'fancytree',
            'source' => $data,
            'selectMode' => FancytreeWidget::SELECT_MULTI,
            'checkbox' => true,
            //'parent' => 'padre', //$id, // parent category id (if exist)
            'options' => [// 'checkbox' => true, 
                        //'id' => 'gus',
                        //'selectmode' => '1',
            ],
        ]); 
    
    
    ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
