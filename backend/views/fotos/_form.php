<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use gudezi\croppic\Croppic;
/* @var $this yii\web\View */
/* @var $model backend\models\Fotos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fotos-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'urlUpload')->textInput(['maxlength' => true]) ?>
    
    <?= Croppic::widget([
            'options' => [
                'class' => 'croppic',
            ],
            'pluginOptions' => [
                'uploadUrl' => 'upload',//$model->urlUpload,
                'cropUrl' => 'crop',//$model->urlCrop,
                'modal' => false,
                'doubleZoomControls' => false,
                'enableMousescroll' => true,
                //'outputUrlId' => 'prueba-urlupload',
                //'loadPicture' => 'img/user/avatar/i-14768128925806605c543c7.jpg',
                'loaderHtml' => '<div class="loader bubblingG">
                    <span id="bubblingG_1"></span>
                    <span id="bubblingG_2"></span>
                    <span id="bubblingG_3"></span>
                </div> ',
            ]
        ]) ?>

    <?= $form->field($model, 'urlCrop')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
