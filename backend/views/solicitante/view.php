<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Solicitante */
?>
<div class="solicitante-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nombre',
            'apellido',
            'numero_identificacion',
            'fecha_nacimiento',
            'nacionalidad',
            'estado_civil_id',
            'sexo_id',
            'email:email',
            'telefono_movil',
        ],
    ]) ?>

</div>
