<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use common\models\menu;

/* @var $this yii\web\View */
/* @var $searchModel common\models\MenuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Menus');
$this->params['breadcrumbs'][] = $this->title;
//print_r($model);die;
?>
<div class="menu-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Menu'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
   
   <div class="menu-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'orden')->textInput() ?>
  	<?//= $form->field($model, 'padre')->dropDownList($model->listaMenu, ['prompt' => 'Seleccione Uno', 'empty' => '0',]);?>

    
    <? ec
        
    ?>


    
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
    
    <?/*= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_menu',
            'descripcion',
            'imagen',
            'destino',
            //'directorio',
            // 'perfil',
            [
               'attribute' => 'padre',
               'value' => 'padre0.descripcion',
               'filter' => yii\helpers\ArrayHelper::map(common\models\menu::find()->all(), 'id_menu', 'descripcion')
            ],
            [
               'attribute' => 'submenu',
               'format' => 'boolean',
               'filter' => [1 => 'Yes', 0 => 'No']
            ],
            [
               'attribute' => 'activo',
               'format' => 'boolean',
               'filter' => [1 => 'Yes', 0 => 'No']
            ],
            //'activo',
            //'padre',
            //'submenu',
            // 'orden',
            // 'grupo',
            // 'target',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);*/ ?>
</div>
