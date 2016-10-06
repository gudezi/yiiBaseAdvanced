<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use frontend\models\Provincias;
use frontend\models\Partidos;
use frontend\models\Localidades;
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

    <?php //= $form->field($model, 'localidad_id')->textInput() ?>
    <?php
        $provincia = ArrayHelper::map(Provincias::find()->all(), 'id', 'descripcion');
        echo $form->field($model, 'provincia_id')->dropDownList(
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
        );
    ?>
    <?php 
	if ($model->isNewRecord){
		$partido = array();
	}else{	
		$partido = ArrayHelper::map(Partidos::find()->where(['provincia_id' =>$model->provincia_id])->all(), 'id', 'descripcion');
	}
	echo $form->field($model, 'partido_id')->dropDownList($partido,
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
	);
	
    ?>
    <?php
    if ($model->isNewRecord)
        echo $form->field($model, 'localidad_id')->dropDownList(['prompt'=>'Por favor elija una']);
    else
    {
        $localidad = ArrayHelper::map(Localidades::find()->where(['partido_id' =>$model->partido_id])->all(), 'id', 'descripcion');
        echo $form->field($model, 'localidad_id')->dropDownList($localidad,['prompt'=>'Por favor elija una']);
    }
?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
