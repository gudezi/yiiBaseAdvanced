<?
use yii\helpers\Html;
use common\widgets\Alert;
use yii\bootstrap\ActiveForm;
?>

<?= Alert::widget(); ?>

<? $form = ActiveForm::begin(['id' => 'passwordform']); ?>

<?= $form->field($user, 'currentPassword')->passwordInput(); ?>

<?= $form->field($user, 'newPassword')->passwordInput(); ?>

<?= $form->field($user, 'newPasswordConfirm')->passwordInput(); ?>

<div class="form-group">
	<div class="col-lg-offset-2 col-lg-10">
		<?= Html::submitButton('Submit', ['class' => 'btn btn-primary']); ?>
	</div>
</div>	

<? ActiveForm::end(); ?>
