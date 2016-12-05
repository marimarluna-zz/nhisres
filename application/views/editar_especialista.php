<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <script type="text/javascript">
<!--
 
$(document).ready( function() {
        $('#mensaje').delay(4000).fadeOut();
      });
//-->
</script> 

    <title>Cloud</title>

    <!-- Bootstrap -->
    
    <link href="<?= base_url().'assents/css/bootstrap.min.css'?>" rel="stylesheet">

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript">
/*funcion ajax que llena el combo dependiendo de la categoria seleccionada*/

</script>

  </head>
  
  <body>

     <div class"row">

     <!-- Este es el formulario para editar los registros, fijate como se llaman utilizando codigo php y la etiqueta datos que viene del controlador que llama a la vista -->   


    <div class="container">
  <div class="col-lg-8 col-lg-offset-2 well">
<dir class ="row">
        <form name="form_porcion" action="<?= base_url().'especialista_controller/editar'?>" method="POST">
          <div class="row">

            <!-- aqui puedes ver como cada uno de los campos en el formulario tomo un registro de la bd con el siguiente comando: <?php echo $datos->campo; ?> sustituyendo lo que dice campo con el campo de la BD  -->
            <div class="col-sm-6">
              <label>Nombre</label>
              <input type="text" id="nombre" name="nombre" value="<?php echo $datos->nombre; ?>"  class="form-control" required>
            </div>
            <div class="col-sm-6">
              <label>Apellido</label>
              <input type="text" id="apellido" name="apellido" value="<?php echo $datos->apellido; ?>"  class="form-control" required>
            </div>
          </div>

          <br>
          
            <div class="row"> 
            <div class="col-sm-6">
              <label>Cedula</label>
              <!-- es campo tiene la opcion readonly como propiedad, al ser el identificador del registro no deberias dejar que lo editaran-->
              <input type="text" id="cedula" readonly name="cedula" value="<?php echo $datos->ci_especialista; ?>"  class="form-control" required>
            </div>
             <div class="col-sm-6" style = "display:none">
              <label>Cedula</label>
              <!-- es campo tiene la opcion readonly como propiedad, al ser el identificador del registro no deberias dejar que lo editaran-->
              <input type="text" id="valor" name="valor" value="<?php echo $datos->ci_especialista; ?>"  class="form-control" required >
            </div>
            <div class="col-sm-6">
              <label>Telefono</label>
              <input type="text" id="telefono" name="telefono" value="<?php echo $datos->telefono; ?>"  class="form-control" required>
            </div>
          </div>
          <br>

          <div class="row"> 
            <div class="col-sm-6">
              <label>Socio</label>
              <input type="text" id="socio" name="socio" value="<?php echo $datos->socio; ?>"  class="form-control" required>
            </div>
            <div class="col-sm-6">
              <label>Ubicacion</label>
              <input type="text" id="ubicacion" name="ubicacion" value="<?php echo $datos->ubicacion; ?>"  class="form-control" required>
            </div>
          </div>
          <br>

          <div class="row"> 
            <div class="col-sm-8 col-sm-offset-2">
              <label>Especializacion</label>
              <input type="text" id="especializacion" name="especializacion" value="<?php echo $datos->especializacion; ?>"  class="form-control" required>
            </div>
          </div>
          <br>
         
            <br><br>
          <div class="col-sm-offset-4">
                <button class="btn btn-lg btn-danger" type="submit" value='login' name="datos"> Editar Datos <span class="glyphicon glyphicon-file"></span></button></button>
          </div>  
  </div>
  </div>

  </form>

  </div>

    <script src="<?= base_url().'assents/js/bootstrap.min.js'?>"></script>

    <script src="<?= base_url().'assents/js/jquery.js'?>"></script>



  </body>
</html>