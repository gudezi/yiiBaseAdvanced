<?php
use karpoff\icrop\CropImageUpload;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
<?= $form->field($model, 'title') ?>
<?= $form->field($model, 'photo')->widget(CropImageUpload::className()) ?>
	<div class="form-group">
		<?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
	</div>
<?php ActiveForm::end(); ?>