<?php
//use Yii;
use yii\helpers\Html;
//dd(Yii::$app->user->identity->username);
/* @var $this \yii\web\View */
/* @var $content string */
?>
<!-- User Account Menu -->
    <li class="dropdown user user-menu">
        <!-- Menu Toggle Button -->
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <?php if(Yii::$app->user->isGuest){?>
            <!-- The user image in the navbar-->
            <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="user-image" alt="User Image">
            <!-- hidden-xs hides the username on small devices so only the image appears. -->
            <span class="hidden-xs">Invitado</span>
        <?php }else{?>
            <!-- The user image in the navbar-->
            <!-- <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="user-image" alt="User Image"> -->
            <img src="<?= Yii::$app->getUrlManager()->getBaseUrl()?>/uploads/<?= Yii::$app->user->identity->profile->photo_cropped?>" class="img-circle user-image" alt="User Image">
            <!-- hidden-xs hides the username on small devices so only the image appears. -->
            <span class="hidden-xs"><?= Yii::$app->user->identity->fullname?></span>
        <?php }?>
        </a>
        <ul class="dropdown-menu">
            <!-- The user image in the menu -->
            <li class="user-header">
            <?php if(Yii::$app->user->isGuest){?>
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                <p>
                    Invitado
                </p>
            <?php }else{?>
                <!-- <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"> -->
                <img src="<?= Yii::$app->getUrlManager()->getBaseUrl()?>/uploads/<?= Yii::$app->user->identity->profile->photo_cropped?>" class="img-circle" alt="User Image">
                <p>
                    <?= Yii::$app->user->identity->fullname?>
                    <small><?= Yii::$app->user->identity->profile->perfil?></small>
                </p>
            <?php }?>
            </li>
            <!-- Menu Body -->
            <?php if(!Yii::$app->user->isGuest){?>
            <li class="user-body">
                <div class="row">
                    <!-- <div class="col-xs-12 text-center">
                        <a href="#" class="btn btn-default btn-block"><i class="fa fa-users"></i> Administrar usuarios</a>
                    </div> -- >
                    <!-- <div class="col-xs-4 text-center">
                        <a href="#">Ventas</a>
                    </div>
                    <div class="col-xs-4 text-center">
                        <a href="#">Amigos</a>
                    </div> -->
                </div>
                <!-- /.row -->
            </li>
            <?php }?>
            <!-- Menu Footer-->
            <li class="user-footer">
            <?php if(Yii::$app->user->isGuest){?>
                <div class="pull-left">
                    <?= Html::a(   '<i class="fa fa-user-plus"></i> Registrarse',
                                ['/site/signup'],
                                ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                    ) ?>
                </div>
                <div class="pull-right">
                    <?= Html::a(   '<i class="fa fa-sign-in"></i> Login',
                                ['/site/logout'],
                                ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                              ) ?>
                </div>
            <?php }else{?>
                <div class="pull-left">
                    <a href="#" class="btn btn-default btn-flat"><i class="fa fa-user"></i> Mí cuenta</a>
                </div>
                <div class="pull-right">
                    <?= Html::a(
                                '<i class="fa fa-sign-out"></i> Salir',
                                ['/site/logout'],
                                ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                               ) ?>
                </div>
            <?php }?>
            </li>
        </ul>
    </li>