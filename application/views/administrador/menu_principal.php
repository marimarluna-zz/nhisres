<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
   <title>Departamentos en el sistema</title>

      <link href="<?= base_url().'assents/css/bootstrap.min.css'?>" rel="stylesheet">
      <link href="<?= base_url().'assents/css/datepicker.css'?>" rel="stylesheet">
      <meta http-equiv="Content-type" content="text/html; charset=utf-8" />


 </head>


 <body>

    <h1 align="center"><b>Bienvenido</b></h1>

    <h2 align="center">Administrador del Sistema</h2>

       <DIV align="center" class="col-md-4 col-md-offset-4">
      <a><img style="max-width: 200px;" src="<?=base_url().'assents/img/0012.png'?>"></a>
   
   </DIV>


<BR><BR><BR><BR><BR>


      <div class="container">
        <div class="row">
            <form action="<?php echo base_url(); ?>especialista_controller/tabla">
              <div class="col-sm-4 col-md-offset-4 " >
                 <button class="btn btn-lg btn-danger btn-block" type="submit" name="submit" value="login"><span class="glyphicon glyphicon-check"></span> Busqueda de Especialistas </button>
              </div>
            </form>
            </div>
      </div>  

<BR>

      <div class="container">
        <div class="row">
            <form action="<?php echo base_url(); ?>especialista_controller">
              <div class="col-sm-4 col-md-offset-4 " >
                 <button class="btn btn-lg btn-success btn-block" type="submit" name="submit" value="login"><span class="glyphicon glyphicon-check"></span> Registrar Especialista </button>
              </div>
            </form>
            </div>
      </div>

<BR>

    <div class="container">
        <div class="row">
            <form action="<?php echo base_url(); ?>administrador_controller">
              <div class="col-sm-4 col-md-offset-4 " >
                 <button class="btn btn-lg btn-success btn-block" type="submit" name="submit" value="login"><span class="glyphicon glyphicon-check"></span> Registrar Administrador </button>
              </div>
            </form>
            </div>
      </div>

  
    <script src="<?= base_url().'assents/js/jquery.js'?>"></script>
	<script src="<?= base_url().'assents/js/bootstrap.min.js'?>"></script>
  <script src="<?= base_url().'assents/js/bootstrap-datepicker.js'?>"></script>

  <script type="text/javascript">
    
      $(document).ready(function(){

          $('#fecha_i').datepicker({

            format: "yyyy/mm/dd"

          });

          $('#fecha_f').datepicker({

            format: "yyyy/mm/dd"

          });
      });


  </script>

 </body>
</html>