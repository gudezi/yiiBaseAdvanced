<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use gudezi\fancytree\FancytreeWidget;

/* @var $this yii\web\View */
/* @var $model common\models\Menu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="menu-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'imagen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'destino')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'directorio')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'perfil')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'padre')->textInput() ?>
	
    <?php //= $form->field($model, 'padre')->dropDownList($model->listaMenu, ['prompt' => 'Seleccione Uno', 'empty' => '0',]);?>

    <?php /*$data = [
    ['title' => 'Node 1', 'key' => 1],
    ['title' => 'Folder 2', 'key' => '3', 'folder' => true, 'children' => [
        ['title' => 'Node 2.1', 'key' => '2'],
        ['title' => 'Node 2.2', 'key' => '4']
    ]]
    ];*/
    /*$data = [
    ['title' => 'Node 1', 'key' => 1],
    ['title' => 'Folder 2', 'key' => 3], 
    ['title' => 'Node 2.1', 'key' => 2],
    ['title' => 'Node 2.2', 'key' => 4]
    
    ];*/
    
    /*$data = \yii\helpers\ArrayHelper::toArray($model->TreeCheck, [
        'backend\models\Operacion' => ['title' => 'lable', 'key' => 'id_menu'],
    ]);*/
    //echo "<pre>"; print_r($model->TreeCheck);die; 
    //print_r($model->id_menu);die;
    echo $form->field($model, 'padre')->widget(FancytreeWidget::classname(), [
            'name' => 'fancytree',
            'source' => $model->TreeCheck,
            'selectMode' => FancytreeWidget::SELECT_SINGLE,
            'checkbox' => true,
            'idfield' => 'id_menu', 
            'quicksearch' => true,
            //'autoScroll' => true,
            //'scrollOfs'=> ['top' => 50, 'bottom' => 50],
            //'scrollParent' => 'gus',
            //'parent' => 'padre', //$id, // parent category id (if exist)
            //'istoggleexpand' => true,
            'btnExpandAll' => true,
            'btnCollapseAll' => true,
            'btnToggleExpand' => true,
            'btnSelectAll' => true,
            'btnUnselectAll' => true,
            'btnToggleSelect' => true,
            'childcounter' => true,
            'glyph' => true,
            'filter' => true,
            'options' => [//'id' => 'gus',
            ],
        ]); 
    ?>
												   
    <?= $form->field($model, 'orden')->textInput() ?>

	<?php //= $form->field($model, 'submenu')->textInput() ?>
    <?= $form->field($model, 'submenu')->checkBox() ?>

    <?= $form->field($model, 'activo')->checkBox() ?>
 
    <?php //= $form->field($model, 'grupo')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'target')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
