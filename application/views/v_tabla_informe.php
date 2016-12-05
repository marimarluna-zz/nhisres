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
<title>Detalle Pacientes</title>
</head>

<body>

<h1 align="center"><b>Historial</b></h1>
<div id="mensaje"><h2 align="center"><b><font color="red"><?=(isset($error))?$error:''?></font></b></h2></div>


<br>

<div class="container">

    <table class="table table-bordered" class="col-md-8"  >
    
    <thead>
    
    <th>ID</th>
    <th>Fecha y Hora</th>
    <th>Observacion</th>
    <th>Detalle</th>
    <th>Cedula</th>
    
    </thead>
    
    
    <tbody>
    <?php foreach($informe as $row): ?>
    <tr> 
    
      <td><?php echo $row->id_informe; ?></td>
      <td><?php echo $row->fecha_hora; ?></td>
      <td><?php echo $row->observacion; ?></td>
      <td><?php echo $row->detalle; ?></td>
      <td><div class="col-md-12"> 
                    <div class="row col-sm-3"> 
                        <a class="btn btn-success" href="../assents/descargas/<?php echo $row->detalle ?>" id="boton" download><span class="glyphicon glyphicon-download"></span></a>
                    </div>
            </div>     
      </td> 

    </tr>
      <?php endforeach; ?>
    </tbody>
    </table>
    
</div>

</body>
</html>