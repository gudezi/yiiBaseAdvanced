<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use gudezi\croppic\Croppic;

/* @var $this yii\web\View */
/* @var $model backend\models\Operacion */

$this->title = 'Prueba';
$this->params['breadcrumbs'][] = ['label' => 'Prueba', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-param" content="_csrf-backend">
<meta name="csrf-token" content="dEVmci44TC04KAUCWFwhQi4IBUpIayQcRysNP2xIFE4/BxJDQFcGeg==">
<title>Prueba</title>
<link href="/yiiBaseAdvanced/backend/web/assets/618e873a/croppic.css" rel="stylesheet">
<link href="/yiiBaseAdvanced/backend/web/assets/81765338/css/bootstrap.css" rel="stylesheet">
<link href="/yiiBaseAdvanced/backend/web/css/site.css" rel="stylesheet">
<link href="/yiiBaseAdvanced/backend/web/assets/a0fe6dfd/css/font-awesome.min.css" rel="stylesheet">
<link href="/yiiBaseAdvanced/backend/web/assets/a7ba25f9/css/font-awesome.min.css" rel="stylesheet">
<link href="/yiiBaseAdvanced/backend/web/assets/a7ba25f9/css/font-awesome-animation.min.css" rel="stylesheet">
<link href="/yiiBaseAdvanced/backend/web/assets/a7ba25f9/css/ionicons.min.css" rel="stylesheet">
<link href="/yiiBaseAdvanced/backend/web/assets/a7ba25f9/css/AdminLTE.min.css" rel="stylesheet">
<link href="/yiiBaseAdvanced/backend/web/assets/a7ba25f9/css/skins/skin-sofse.min.css" rel="stylesheet">    
</head>
    <!-- <body class="hold-transition skin-blue sidebar-mini"> -->
<body class="skin-sofse hold-transition fixed sidebar-mini">
<section class="content">
<div class="operacion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="operacion-form">

        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
        <?= $form->field($model, 'urlUpload')->textInput() ?>
        <?= Croppic::widget([
            'options' => [
                'class' => 'croppic',
            ],
            'pluginOptions' => [
                'uploadUrl' => 'uploads',//$model->urlUpload,
                'cropUrl' => 'uploads',//$model->urlCrop,
                'modal' => false,
                'doubleZoomControls' => false,
                'enableMousescroll' => true,
                'loaderHtml' => '<div class="loader bubblingG">
                    <span id="bubblingG_1"></span>
                    <span id="bubblingG_2"></span>
                    <span id="bubblingG_3"></span>
                </div> ',
            ]
        ])?>
        
        <?php //= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>
        <?php //$htmlOptions = array('size' => '5', 'prompt'=>'Use CTRL to Select Multiple Staff', 'multiple' => 'true', 'options' => $selected);?>
        <?php //= $form->field($model, 'operaciones')->checkboxList($acciones, $htmlOptions)?>
        <div class="form-group">
            <?= Html::submitButton('Ejecutar', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>
</section>
<script src="/yiiBaseAdvanced/backend/web/assets/7af9da6b/jquery.js"></script>
<script src="/yiiBaseAdvanced/backend/web/assets/618e873a/croppic.js"></script>
<script src="/yiiBaseAdvanced/backend/web/assets/618e873a/jquery.mousewheel.min.js"></script>
<script src="/yiiBaseAdvanced/backend/web/assets/a75f0557/yii.js"></script>
<script src="/yiiBaseAdvanced/backend/web/assets/a75f0557/yii.activeForm.js"></script>
<script src="/yiiBaseAdvanced/backend/web/assets/81765338/js/bootstrap.js"></script>
<script src="/yiiBaseAdvanced/backend/web/assets/a7ba25f9/js/app.min.js"></script>
<script src="/yiiBaseAdvanced/backend/web/assets/a7ba25f9/js/sideBarStateLocalStorage.min.js"></script>
<script src="/yiiBaseAdvanced/backend/web/assets/a7ba25f9/js/jquery.slimscroll.js"></script>
<script type="text/javascript">
jQuery(document).ready(function () {
    var w1 = new Croppic('w1', {
        "uploadUrl":"prueba/upload",
        "cropUrl":"prueba/crop",
        "outputUrlId":"prueba-urlupload",
        //"loadPicture":"img/user/avatar/i-14768128925806605c543c7.jpg",
        "modal":false,
        "doubleZoomControls":false,
        "enableMousescroll":true,
        "loaderHtml":"<div></div>",
        //"loaderHtml":"<div class=\"loader bubblingG\">\r\n<span id=\"bubblingG_1\"></span>\r\n<span id=\"bubblingG_2\"></span>\r\n<span id=\"bubblingG_3\"></span>\r\n</div>"
        });
    jQuery('#w0').yiiActiveForm([], []);
});
</script>
</body>
</html>
    