<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use karpoff\icrop\CropImageUpload;

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

    <?= $form->field($model, 'pais_id')->textInput() ?>

    <?= $form->field($model, 'provincia_id')->textInput() ?>

    <?= $form->field($model, 'partido_id')->textInput() ?>

    <?= $form->field($model, 'localidad_id')->textInput() ?>

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
