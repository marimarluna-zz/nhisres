<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<script type="text/javascript">
<!--
 
$(document).ready( function() {
        $('#mensaje').delay(4000).fadeOut();
      });
//-->
</script>

<link href="<?= base_url().'assents/css/bootstrap.min.css'?>" rel="stylesheet">

  <script src="<?= base_url().'assents/js/jquery.js'?>"></script>
  <script src="<?= base_url().'assents/js/bootstrap.min.js'?>"></script>
  <script type="text/javascript" src="<?= base_url().'assents/jq/jquery.min.js'?>"></script>

<title>Documento sin t&iacute;tulo</title>

<style type="text/css">
body {
    background-size: 100%;
    background-image: url(assents/img/Background.jpg);
}base_

</style>

</head>

<body>


<br><br><br>

<div align="center">
       <img src="<?=base_url().'assents/img/logo.png'?>" height="300" width="700">
  </div>

<br><br>
   
   <H1 align="center"><b><font color="#0EC20B">Bienvenido a NHisRes</b></font></H1>
   <H4 align="center"><b><font color="#0EC20B">Nube de uso exclusivo para información médica</b></font></H4>

   <div id="mensaje">
      <h3 align="center"><font color="#F60606"> <?=(isset($error))?$error:''?></font> </h3>
  </div>

<br>

   <DIV align="center">
      <a href="#myModal" class="btn btn-lg btn-success" data-toggle="modal">Entrar al Sistema</a>
   </DIV>
<br><br>


   
  <div id="myModal" class="modal fade col-sm-8 col-sm-offset-3" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content col-sm-8">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Bienvenido a Cloud</h4>
      </div>
      <div class="modal-body">

         <div class="panel-body">

                  <?php echo validation_errors(); ?>
                  <?php echo form_open('verifylogin'); ?>
                  
                  <form class="form-signin">
                   
                    <div class="input-group col-sm-12">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="usuario" type="text" class="form-control" name="usuario" placeholder="Usuario" required>                                        
                    </div>  

                    <br>

                    <div class="input-group col-sm-12">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="password" type="password" class="form-control" name="password" placeholder="Clave" required>
                    </div>    

                    <br>
                    
                    <div class="form-group" align="center">
                        <div class="col-sm-6 col-sm-offset-3 controls">
                            <button type="submit" class="btn btn-primary btn-block"><i class="glyphicon glyphicon-log-in"></i> Entrar</button>                          
                        </div>
                    </div>
                    <br><br>

                    <a style="margin-left:33%" href="<?php echo base_url(); ?>home/logout"><b>Olvido su clave</b></a>
                  
                </form>     

            </div>     


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>


</body>
</html>
