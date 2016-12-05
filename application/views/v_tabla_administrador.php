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
<title>Lista Administrador</title>
</head>

<body>

<h1 align="center"><b>Lista de Administrador</b></h1>
<div id="mensaje"><h3 align="center"><?=(isset($error))?$error:''?></h3></div>


<br>

<div class="container">
    <div class="row">

        <div class="col-md-12">
                <form name="form_prueba" action="<?= base_url().'administrador_controller/buscar_t'?>" method="POST">
                    <div class=" col-md-6 ">
                        <input type="text" placeholder="Buscar por Nombre/Apellido/Cedula" id="busqueda" name="busqueda" class="form-control col-sm-2" required> 
                    </div>
                    <div class="col-sm-4 form-group">
                        <select requird class="form-control " name="filtro" id="filtro">
                            <option value="nombre" >Nombre</option>
                            <option value="apellido" >Apellido</option>
                            <option value="ci_administrador" >Cedula</option>
                       </select>
                  </div>
                    <div class="row col-sm-1"> 
                        <button type="submit" value='login' name="datos" class="btn btn-success" > <span class="glyphicon glyphicon glyphicon-search"> </span></button>
                    </div>
                </form>
                <form action="<?php echo base_url(); ?>especialista_controller/tabla">
                    <div class="col-sm-1 col-md-offset-1" style="margin-top:-3%"> 
                            <button type="submit" value='login' name="datos" class="btn btn-danger" > Limpiar </button>
                    </div>
                </form>
            <table class="table table-striped table-hover" cellpadding="60">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Cedula</th>
                        <th>Telefono</th>
                        <th>Correo</th>
                        <th>Ubicacion</th>
                        <th>Editar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 0; $i < count($deptlist); ++$i) { ?>
                    <tr>
                        <td><?php echo $deptlist[$i]->nombre; ?></td>
                        <td><?php echo $deptlist[$i]->apellido; ?></td>
                        <td><?php echo $deptlist[$i]->ci_administrador; ?></td>
                        <td><?php echo $deptlist[$i]->telefono; ?></td>
                        <td><?php echo $deptlist[$i]->correo; ?></td>
                        <td><?php echo $deptlist[$i]->ubicacion; ?></td>
                        <td><div class="col-md-12"> 
                                <form name="form_prueba" action="<?= base_url().'administrador_controller/editar'?>" method="POST">
                                    <div class="" style="display:none">
                                        <input type="text" min="1" id="ci_administrador" name="ci_administrador" value="<?php echo $deptlist[$i]->ci_administrador;?>" class="form-control col-sm-2"> 
                                    </div>
                                    <div class="row col-sm-3" style="margin-left:5%"> 
                                        <button type="submit" value='login' name="datos" class="btn btn-success" > <span class="glyphicon glyphicon-user"> </span></button>
                                    </div>
                                </form>
                            </div>     
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-center">
            <?php echo $pagination; ?>
        </div>
    </div>
</div>

</body>
</html>