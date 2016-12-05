<html>


    <script type="text/javascript" src="<?= base_url().'assents/jq/jquery.min.js'?>"></script>

<head>

<link href="<?= base_url().'assents/css/dropdown-submenu.css'?>" rel="stylesheet">

<nav class="navbar navbar-default sidebar " role="navigation" style="background:#0EC20B ;">
  <!-- El logotipo y el icono que despliega el menú se agrupan
       para mostrarlos mejor en los dispositivos móviles -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse"
            data-target=".navbar-ex1-collapse">
      <span class="sr-only" >Desplegar navegación</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
  </div>


 

    

    <ul class="nav navbar-nav navbar-left">

  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
       
        <li><a href="#">Menu Principal <span class="sr-only">(current)</span></a></li>
        <li><a href="<?php echo base_url();?>usuarios_controller">Mi Perfil</a></li>
        <li class="active"><a href="<?php echo base_url();?>usuarios_controller">Usuarios</a></li>
        
      </ul>
    </div>




    </ul>    
  <!-- Agrupar los enlaces de navegación, los formularios y cualquier
       otro elemento que se pueda ocultar al minimizar la barra -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
   

    <ul class="nav navbar-nav navbar-right">
      <li>
        <h5><a><b><span class="glyphicon glyphicon-user"></span> <?php echo $usuario; ?></b></a></h5>
      </li>
      <li>
        <a style="margin-top: -6%;" href="<?php echo base_url(); ?>home/logout"><b>Salir <span class="glyphicon glyphicon-share-alt"></span></b></a>
      </li>
    </ul>


  </div>
</nav>
  
    <script src="<?= base_url().'assents/js/jquery.js'?>"></script>
  <script src="<?= base_url().'assents/js/bootstrap.min.js'?>"></script>

</head>
<body>




</body>
</html>