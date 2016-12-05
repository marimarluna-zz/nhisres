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

    <title>Buscar Paciente</title>

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
        <form name="form_porcion" action="<?= base_url().'paciente_controller/ver'?>" method="POST">
          <div class="row">

            <!-- aqui puedes ver como cada uno de los campos en el formulario tomo un registro de la bd con el siguiente comando: <?php echo $datos->campo; ?> sustituyendo lo que dice campo con el campo de la BD  -->
          <br>
          
          <div class="row"> 
            <div class="col-sm-8 col-sm-offset-2">
              <label>Cedula</label>
              <input type="text" id="ci_paciente" name="ci_paciente" class="form-control" required>
            </div>
          </div>
          <br>
         
            <br><br>
          <div class="col-sm-offset-4">
                <button class="btn btn-lg btn-danger" type="submit" value='login' name="datos"> Buscar Datos <span class="glyphicon glyphicon-file"></span></button></button>
          </div>  
  </div>
  </div>

  </form>

  </div>

    <script src="<?= base_url().'assents/js/bootstrap.min.js'?>"></script>

    <script src="<?= base_url().'assents/js/jquery.js'?>"></script>



  </body>
</html>