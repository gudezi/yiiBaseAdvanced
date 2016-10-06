
<header class="main-header">

    <!-- Logo -->
    <a href="<?= Yii::$app->homeUrl?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>TA</b></span>
        <!-- <span class="logo-mini"><i class="fa fa-train"></i></span> -->
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><img src="<?= $directoryAsset ?>/img/logo_desktop.png"></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
      
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

            <?php
            if(Yii::$app->user->isGuest)
            {
                // INCLUYO EL MENU DE USUARIO
                include "usuario.php";
            }
            else
            {
                // INCLUYO LOS SECTORES
                include "sectores.php";
                
                // INCLUYO LOS MENSAJES
                include "mensajes.php";

                // INCLUYO LAS NOTIFICACIONES
                include "notificaciones.php";

                // INCLUYO LAS TAREAS
                include "tareas.php";
                 
                // INCLUYO EL MENU DE USUARIO
                include "usuario.php";
                 
                // INCLUYO EL  BOTON DE CONSTROLSIDEBAR-->
                include "control_sidebar.php";
            }
            ?>

            </ul>
        </div>
    </nav>
</header>