<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
   <title>Departamentos en el sistema</title>

      <link href="<?= base_url().'assents/css/bootstrap.min.css'?>" rel="stylesheet">
      <meta http-equiv="Content-type" content="text/html; charset=utf-8" />


 </head>



 <body>


    <h1 align="center"><b>Datos cargados exitosamente</b></h1>
    <br>
   


      <div class="container">
        <div class="row">
            <form action="<?php echo base_url(); ?>especialista_controller/tabla">
              <div class="col-sm-4 col-md-offset-4 " >
                 <button class="btn btn-lg btn-success btn-block" type="submit" name="submit" value="login"><span class="glyphicon glyphicon-check"></span> Ver lista de Especialistas </button>
              </div>
            </form>
            </div>
      </div> 



    <script src="<?= base_url().'assents/js/jquery.js'?>"></script>
  <script src="<?= base_url().'assents/js/bootstrap.min.js'?>"></script>

 </body>
</html>