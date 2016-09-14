<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use frontend\models\Provincias;
use frontend\models\Partidos;
use frontend\models\Localidades;
use kartik\depdrop\DepDrop;
/* @var $this yii\web\View */
/* @var $model frontend\models\Cliente */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cliente-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'apellido')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dni')->textInput() ?>

    <?= $form->field($model, 'fecha_nacimiento')->textInput() ?>

    <?= $form->field($model, 'domicilio')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'localidad_id')->textInput() ?>
    <?php
        $provincia = ArrayHelper::map(Provincias::find()->all(), 'id', 'descripcion');
        //echo $form->field($model, 'cat')->dropDownList($catList, ['id'=>'cat-id']);
        echo $form->field($model, 'provincia_id')->dropDownList($provincia, ['id'=>'provincia-id']);
        
        /*echo $form->field($model, 'provincia_id')->dropDownList(
        $provincia,
            [
            'prompt'=>'Por favor elija una',
            'onchange'=>'
                        $.get( "'.Url::toRoute('dependent-dropdown/partido').'", { id: $(this).val() } )
                            .done(function( data ) {
                                $( "#'.Html::getInputId($model, 'partido_id').'" ).html( data );
                            }
                        );
                    '
            ]
        );*/
    ?>
    <?php 
    echo $form->field($model, 'partido_id')->widget(DepDrop::classname(), [
     'options' => ['id'=>'partido-id'],
     'pluginOptions'=>[
         'depends'=>['provincia-id'],
         'placeholder' => 'Select...',
         'url' => Url::to(['dependent-dropdown/partido'])
     ]
    ]);
    /*echo $form->field($model, 'partido_id')->dropDownList(array(),
    [
        'prompt'=>'Por favor elija uno',
        'onchange'=>'
                        $.get( "'.Url::toRoute('dependent-dropdown/localidad').'", { id: $(this).val() } )
                            .done(function( data ) {
                                $( "#'.Html::getInputId($model, 'localidad_id').'" ).html( data );
                            }
                        );
                    '
    ]
    );*/
    ?>
    <?php
    echo $form->field($model, 'localidad_id')->widget(DepDrop::classname(), [
    'pluginOptions'=>[
        'depends'=>['provincia-id', 'partido-id'],
        'placeholder'=>'Select...',
        'url'=>Url::to(['dependent-dropdown/localidad'])
    ]
    ]);
    /*if ($model->isNewRecord)
        echo $form->field($model, 'localidad_id')->dropDownList(['prompt'=>'Por favor elija una']);
    else
    {
        $localidad = ArrayHelper::map(Localidades::find()->where(['id' =>$model->localidad_id])->all(), 'id', 'descripcion');
        echo $form->field($model, 'localidad_id')->dropDownList($localidad);
    }*/
?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
