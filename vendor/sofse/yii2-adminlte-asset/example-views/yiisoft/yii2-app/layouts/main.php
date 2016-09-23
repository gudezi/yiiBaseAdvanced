<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
/*echo '<pre>';
print_r(Yii::$app->controller->items_menu);
die;*/

if(isset(Yii::$app->controller->items_menu))
{
	$items = Yii::$app->controller->items_menu;
}

if (Yii::$app->controller->action->id === 'login') { 
/**
 * Do not use this code in your template. Remove it. 
 * Instead, use the code  $this->layout = '//main-login'; in your controller.
 */
    echo $this->render(
        'main-login',
        ['content' => $content]
    );
} else {

    if (class_exists('backend\assets\AppAsset')) {
        backend\assets\AppAsset::register($this);
    } else {
        app\assets\AppAsset::register($this);
    }

    sofse\web\AdminLteAsset::register($this);

    //$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');
    $directoryAsset = Yii::$app->assetManager->getPublishedUrl('@vendor/sofse/adminlte/dist');
    //echo '<pre>';
    //print_r(Yii::$app); die;
    ?>
    <?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <!-- <body class="hold-transition skin-blue sidebar-mini"> -->
    <body class="<?= \sofse\helpers\AdminLteHelper::skinClass() ?> hold-transition fixed sidebar-mini">
    <?php $this->beginBody() ?>
    <div class="wrapper">

        <?= $this->render(
            'header.php',
            ['directoryAsset' => $directoryAsset]
        ) ?>

        <?= $this->render(
            'sidebar.php',
            ['items' => $items, 'directoryAsset' => $directoryAsset]
        )
        ?>

        <?= $this->render(
            'content.php',
            ['content' => $content, 'directoryAsset' => $directoryAsset]
        ) ?>

        <?= $this->render(
            'footer.php',
            ['directoryAsset' => $directoryAsset]
        )
        ?>

        <?= $this->render(
            'sidebar_right.php',
            ['directoryAsset' => $directoryAsset]
        )
        ?>

    </div>
    <?include "admin_options.php";?>
    <?php $this->endBody() ?>
    </body>
    </html>
    <?php $this->endPage() ?>
<?php } ?>
