<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
?>
<!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">Gonzalo Fernandez</span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  Gonzalo Fernandez
                  <small>Web Developer</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-12 text-center">
                    <a href="#" class="btn btn-default btn-block"><i class="fa fa-users"></i> Administrar usuarios</a>
                  </div>
                  <!-- <div class="col-xs-4 text-center">
                    <a href="#">Ventas</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Amigos</a>
                  </div> -->
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat"><i class="fa fa-user"></i> Mí cuenta</a>
                </div>
                <div class="pull-right">
				<?= Html::a(
                                    'Salir',
                                    ['/site/logout'],
                                    ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                ) ?>
                 <!-- <a href="/yiiBaseAdvanced/frontend/web/index.php?r=site%2Flogout" class="btn btn-default btn-flat"><i class="fa fa-sign-out"></i> Salir</a> -->
                </div>
              </li>
            </ul>
          </li>