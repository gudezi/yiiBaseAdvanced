<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;

/* @var $this yii\web\View */
/* @var $model frontend\models\OrdenSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orden-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'cliente_id') ?>

    <?//= $form->field($model, 'fecha') ?>
	<?php
	echo $form->field($model, 'fecha_desde')->widget(DatePicker::classname(), [
		'options' => ['placeholder' => ''],      
      'language' => 'es',
		'pluginOptions' => [
			'id' => 'fecha1',
			'autoclose'=>true,
			'format' => 'yyyy-mm-dd',
			'startView' => 'year',
		]
	]);

	echo $form->field($model, 'fecha_hasta')->widget(DatePicker::classname(), [
      'options' => ['placeholder' => ''],
      'language' => 'es',
		'pluginOptions' => [
			'id' => 'fecha1',
			'autoclose'=>true,
			'format' => 'yyyy-mm-dd',
			'startView' => 'year',
		]
	]);
	?>
	
    <?= $form->field($model, 'estado') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
