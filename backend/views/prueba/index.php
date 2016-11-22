<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use gudezi\croppic\Croppic;

/* @var $this yii\web\View */
/* @var $model backend\models\Operacion */

$this->title = 'Prueba';
$this->params['breadcrumbs'][] = ['label' => 'Prueba', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="operacion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="operacion-form">

        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
        <?= $form->field($model, 'urlUpload')->textInput() ?>
        <?php /*= Croppic::widget([
            'options' => [
                'class' => 'croppic',
            ],
            'pluginOptions' => [
                'uploadUrl' => 'prueba/upload',//$model->urlUpload,
                'cropUrl' => 'prueba/crop',//$model->urlCrop,
                'modal' => false,
                'doubleZoomControls' => false,
                'enableMousescroll' => true,
                'outputUrlId' => 'prueba-urlupload',
                //'loadPicture' => 'img/user/avatar/i-14768128925806605c543c7.jpg',
                'loaderHtml' => '<div class="loader bubblingG">
                    <span id="bubblingG_1"></span>
                    <span id="bubblingG_2"></span>
                    <span id="bubblingG_3"></span>
                </div> ',
            ]
        ])*/?>
        
        <?php //= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>
        <?php //$htmlOptions = array('size' => '5', 'prompt'=>'Use CTRL to Select Multiple Staff', 'multiple' => 'true', 'options' => $selected);?>
        <?php //= $form->field($model, 'operaciones')->checkboxList($acciones, $htmlOptions)?>
        <div class="form-group">
            <?= Html::submitButton('Ejecutar', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>