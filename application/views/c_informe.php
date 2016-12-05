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

    <title>Agregar Informe</title>

<style type="text/css">
form {float:right;}
</style>

    <!-- Bootstrap -->
    
    <link href="<?= base_url().'assents/css/bootstrap.min.css'?>" rel="stylesheet">

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript">
/*funcion ajax que llena el combo dependiendo de la categoria seleccionada*/

</script>

  </head>
  
  <body>
  
  <h1 align="Center"><B><BIG>Formulario Para Agregar Informe </BIG></B></h1>

  <div id="mensaje">
<h3 align="center"> <?=(isset($error))?$error:''?> </h3>
</div>

  <br>


<div class="container col-sm-offset-3">

<?php echo form_open_multipart('paciente_controller/cargar_archivo');?>

  <div class="row col-sm-8 col-sm-offset-2">
    <div class="col-sm-12 form-group">
      <div class="col-sm-4 form-group">
        <label>Cedula Paciente</label>
        <input type="number" min="0" id="ci_paciente" name="ci_paciente" value="<?php echo $datos->ci_paciente; ?>" class="form-control" readonly>
      </div>
      <div class="col-sm-4 form-group">
        <label>Cedula Especialista</label>
        <input type="number" min="0" id="ci_especialista" name="ci_especialista" value="<?php echo $id; ?>" class="form-control" readonly>
      </div>
    </div>
  </div>

  <div class="row col-sm-8 col-sm-offset-2">

  <div class="col-sm-4">
  <label>Ruta del Archivo</label>
    <input type="file" name="userfile" class="form-class">
  </div>

  </div>

  <div class="row col-sm-10 col-sm-offset-2">
  <br><br>
  <label>Observaciones</label>
  <br>
  <textarea cols="62" rows="6" name="observaciones" id="observaciones"></textarea>
  </div>

  <div class="row col-sm-5 col-sm-offset-2"> 

  <br><br>
    <input type="submit" value="Cargar" class="btn btn-success btn-block" />

  </div>

    



</form>

</div>

    <script src="<?= base_url().'assents/js/bootstrap.min.js'?>"></script>

    <script src="<?= base_url().'assents/js/jquery.js'?>"></script>
  </body>
</html>