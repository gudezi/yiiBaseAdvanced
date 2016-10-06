<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

$this->title = 'Error '.$exception->statusCode;
?>

<section class="content">

    <div class="error-page">  
        
    <!-- Content Header (Page header) 
    <section class="content-header">
      <h1>
        Error <?php//= $exception->statusCode?> 
      </h1>
      <ol class="breadcrumb">
        <li class="active">Error 404 </li>
      </ol>
    </section> -->
        
    <!-- Main content -->
    <section class="content">
        <div class="error-page">
            <h2 class="headline text-light-blue"> 404</h2>

            <div class="error-content">
                <h3><i class="fa fa-warning text-light-blue"></i> Error! <?=Html::encode($message)?></h3>
                <p>
                    Se ha producido un error, mientras el servidor Web procesaba su solicitud.
                    Por favor, póngase en contacto con nosotros si usted piensa que esto es un error del servidor. Gracias.
                    Pulse <a href='<?= Yii::$app-> homeUrl ?>'> aquí </a>para regresar.
                </p>

            </div>
            <!-- /.error-content -->
        </div>
        <!-- /.error-page -->
    </section>
    <!-- /.content -->
    
    </div>

</section>



