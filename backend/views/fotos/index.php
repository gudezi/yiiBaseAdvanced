<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\FotosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Fotos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fotos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Fotos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'descripcion',
            'urlUpload:url',
            //'urlCrop:url',
            [
            //'format' => ['image',['width'=>'100','height'=>'100']],
            'format' => ['image',['width'=>'100']],
            'label' => 'Foto',
            'value' => function($data) { return $data->imageurl; },
        ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
