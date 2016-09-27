<?php
use yii\helpers\Html;
//use yii\grid\GridView;
//use yii\widgets\ActiveForm;
use common\models\menu;
//use execut\widget\TreeView;
//use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $searchModel common\models\MenuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Menus';
$this->params['breadcrumbs'][] = $this->title;
//print_r($model);die;
?>
<div class="menu-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Menu', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
   
    <div class="menu-form">

    
    <?
        /*= TreeWidget::widget([
            'models' => $models,
            'value' => function($model) {
            return $model->title;
        }*/
        
        echo $form->field($model, 'attribute')->widget(FancytreeWidget::classname(), [
            'name' => 'fancytree',
            'source' => $data,
            'parent' =>$id, // parent category id (if exist)
            //'options' => [
            //],
        ]);
    ?>
    ?>
</div>
