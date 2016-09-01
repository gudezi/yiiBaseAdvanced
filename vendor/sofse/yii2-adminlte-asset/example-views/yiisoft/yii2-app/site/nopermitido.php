<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

$this->title = 'No Permitido';
?>

<section class="content">

    <div class="">  
        
    <!-- Content Header (Page header) 
    <section class="content-header">
      <h1>
        Error <?//= $exception->statusCode?> 
      </h1>
      <ol class="breadcrumb">
        <li class="active">Error 404 </li>
      </ol>
    </section> -->
        
    <!-- Main content -->
    <section class="content">
      <div class="">
        <h2 class="headline text-red">Prohibido</h2>

        <div class="error-content">
          <h3><i class="fa fa-ban text-red"></i> Proibido ! <?=Html::encode($message)?></h3>

          <p>
            <div class="alert alert-danger">
               <p>No tiene permiso para acceder a esta página.</p>
            </div>.
          </p>

        </div>
        <!-- /.error-content -->
      </div>
      <!-- /.error-page -->
    </section>
    <!-- /.content -->
    
    </div>

</section>



