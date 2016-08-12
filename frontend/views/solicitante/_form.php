<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model frontend\models\Solicitante */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="solicitante-form">

    <?php $form = ActiveForm::begin([
        'id' => 'solicitante-form',
        'enableAjaxValidation' => true,
        'enableClientScript' => true,
        'enableClientValidation' => true,
    ]); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'apellido')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'numero_identificacion')->textInput(['maxlength' => 45]) ?>

    <?php echo $form->field($model,'fecha_nacimiento')->
        widget(DatePicker::className(),[
            'dateFormat' => 'yyyy-MM-dd',
            'clientOptions' => [
                'yearRange' => '-115:+0',
                'changeYear' => true
            ],
            'options' => ['class' => 'form-control', 'style' => 'width:30%']
        ]) ?>

    <?= $form->field($model, 'nacionalidad')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'estado_civil_id')->dropDownList($model->listaEstadoCivil, ['prompt' => 'Seleccione Uno' ]);?>

    <?= $form->field($model, 'sexo_id')->dropDownList($model->listaSexo, ['prompt' => 'Seleccione Uno' ]);?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'telefono_movil')->textInput(['maxlength' => 45]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <?php
    /*$this->registerJs('
        // obtener la id del formulario y establecer el manejador de eventos
            $("form#solicitante-form").on("beforeSubmit", function(e) {
                var form = $(this);
                $.post(
                   form.attr("action")+"&submit=true",
                    form.serialize()
                )
                .done(function(result) {
                   alert("aca");
                   alert(result.message);
                   form.parent().html(result.message);
                   $.pjax.reload({container:"#solicitante-grid"});
                });
                return false;
            }).on("submit", function(e){
                e.preventDefault();
                e.stopImmediatePropagation();
                return false;
            });
        ');*/
        
        $this->registerJs('
        $("form#solicitante-form").on("beforeSubmit", function(e)
         {
            var form = $(this);
            $.post(
               form.attr("action")+"&submit=true",
               form.serialize()
            )
            .done(function(result) 
            {
               alert("aca");
               alert(result.message);
               form.parent().html(result.message);
               $.pjax.reload({container:"#solicitante-grid"});
            })
            return false;
         });


         $("form#solicitante-form").on("submit", function(e)
         {
            e.preventDefault();
            e.stopImmediatePropagation();
            return false;
         });
        ');

    ?>

</div>