<?
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ChangePasswordForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Change password';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-change-password">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please choose your new password:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'change-password-form']); ?>

                <?= $form->field($model, 'currentPassword')->passwordInput(['autofocus' => true]) ?>
				<?= $form->field($model, 'newPassword')->passwordInput() ?>
				<?= $form->field($model, 'newPasswordConfirm')->passwordInput() ?>

                <div class="form-group">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>




<?
//use yii\helpers\Html;
//use common\widgets\Alert;
//use yii\bootstrap\ActiveForm;
?>

<?php //= Alert::widget(); ?>

<?php // $form = ActiveForm::begin(['id' => 'passwordform']); ?>

<?php //= $form->field($user, 'currentPassword')->passwordInput(); ?>

<?php //= $form->field($user, 'newPassword')->passwordInput(); ?>

<?php //= $form->field($user, 'newPasswordConfirm')->passwordInput(); ?>


