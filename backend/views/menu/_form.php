<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Menu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="menu-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'imagen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'destino')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'directorio')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'perfil')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'padre')->textInput() ?>
	<?= $form->field($model, 'padre')->dropDownList($model->listaMenu, ['prompt' => 'Seleccione Uno', 'empty' => '0',]);?>
												   
    <?= $form->field($model, 'orden')->textInput() ?>

	<?//= $form->field($model, 'submenu')->textInput() ?>
    <?= $form->field($model, 'submenu')->checkBox() ?>

    <?= $form->field($model, 'activo')->checkBox() ?>
 
    <?//= $form->field($model, 'grupo')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'target')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
