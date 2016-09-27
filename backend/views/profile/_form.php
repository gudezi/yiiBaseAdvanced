<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use karpoff\icrop\CropImageUpload;
use frontend\models\Paises;
use frontend\models\Provincias;
use frontend\models\Partidos;
use frontend\models\Localidades;

/* @var $this yii\web\View */
/* @var $model common\models\Profile */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="profile-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'id')->textInput(['readonly' => true]) ?>

    <?= $form->field($model, 'apellido')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'perfil')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'grupo')->textInput() ?>

    <?= $form->field($model, 'entidad')->textInput() ?>

    <?= $form->field($model, 'empresa')->textInput() ?>

    <?= $form->field($model, 'calle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'numero')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'piso')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'depto')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'pais_id')->textInput() ?>
    <?php
        $pais = ArrayHelper::map(Paises::find()->all(), 'id', 'descripcion');
        echo $form->field($model, 'pais_id')->dropDownList(
        $pais,
            [
            'prompt'=>'Por favor elija uno',
            'onchange'=>'
                        $.get( "'.Url::toRoute('dependent-dropdown/provincia').'", { id: $(this).val() } )
                            .done(function( data ) {
                                $( "#'.Html::getInputId($model, 'provincia_id').'" ).html( data );
                            }
                        );
                    '
            ]
        );
    ?>    

    <?//= $form->field($model, 'provincia_id')->textInput() ?>
    <?php
	if ($model->isNewRecord){
		$provincia = array();
	}else{	
		$provincia = ArrayHelper::map(Provincias::find()->where(['pais_id' =>$model->pais_id])->all(), 'id', 'descripcion');
	}    
        //$provincia = ArrayHelper::map(Provincias::find()->all(), 'id', 'descripcion');
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

    <?//= $form->field($model, 'partido_id')->textInput() ?>
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

    <?//= $form->field($model, 'localidad_id')->textInput() ?>
    <?php
    if ($model->isNewRecord)
        echo $form->field($model, 'localidad_id')->dropDownList(['prompt'=>'Por favor elija una']);
    else
    {
        $localidad = ArrayHelper::map(Localidades::find()->where(['partido_id' =>$model->partido_id])->all(), 'id', 'descripcion');
        echo $form->field($model, 'localidad_id')->dropDownList($localidad,['prompt'=>'Por favor elija una']);
    }
    ?>
    <?= $form->field($model, 'coordenadas')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telefono')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'celular')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'foto')->textInput() ?>
    
    <?= $form->field($model, 'photo')->widget(CropImageUpload::className()) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
