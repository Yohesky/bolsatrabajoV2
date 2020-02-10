<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio</title>    
    <link rel="stylesheet" href="./css/bootstrap.min.css.map.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/coreui.min.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="./css/all.css">
    <link rel="stylesheet" href="./css/fontawesome.css">
    <link rel="stylesheet" href="css/pushbar.css">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="js/jquery-ui-1.12.1.custom/jquery-ui.css">
    <link rel="stylesheet" href="css/dashboard.css">
    
    
    

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <i class="fa fa-bars close-aside hidden-sm hidden-md hidden-lg" data-pushbar-target="pushbar-menu"></i>
    <!-- <i class="fas fa-bars fa-3x menu" data-pushbar-target="pushbar-menu"></i> -->
   

       <div data-pushbar-id="pushbar-menu" class="pushbar from_left pushbar-menu fondo">
        <div class="btn-cerrar">
         
             <i class="fas fa-times close fa-5x" data-pushbar-close></i>
         
        </div>
 
       
 
       <nav class="side-nav">
             
       <ul class="categories">

       <?php
        session_start();

        if(isset($_SESSION['esAdmin']) && !empty($_SESSION['esAdmin'])){
            if($_SESSION['esAdmin'] == 1){
               echo "<li id='controlPanel'> <i class='fas fa-briefcase'></i> Panel de Control </li>";
            }}
       ?>

        <li id="trabajos"> <i class="fas fa-briefcase"></i> Trabajos </li>
          
        <li id="misPostulaciones"> <i class="fas fa-bullseye"></i> Mis Postulaciones</li>
        
        <li id="perfil"> <i class="fa fa-user-o fw"></i> Perfil</li>

        <li id="salir"> <i class="fa fa-sign-out"></i> Salir</li>
        
      </ul>
     
     
     
             
        
       </nav>
    </div>

    <?php

  include("includes/conexion.php");
  $idusuario = $_SESSION['idusuarios'];

  $query = "SELECT * FROM notificaciones JOIN empresa ON notificaciones.idempresa = empresa.idempresa JOIN propuesta ON notificaciones.idpropuesta = propuesta.idpropuesta WHERE idusuario = '$idusuario'";
  $resultado = mysqli_query($conexion, $query) or die(mysqli_error($conexion));

  function nNotificaciones(){
  include("includes/conexion.php");
  global $idusuario;
  $query = "SELECT * FROM notificaciones JOIN empresa ON notificaciones.idempresa = empresa.idempresa JOIN propuesta ON notificaciones.idpropuesta = propuesta.idpropuesta WHERE idusuario = '$idusuario'";
  $resultado = mysqli_query($conexion, $query) or die(mysqli_error($conexion));
  $num = mysqli_num_rows($resultado);
  return $num;
  }
  ?>



    <li class="dropdown" style="margin-left: auto" style="list-style: none">
    
              <button class="dropdown-toggle btn btn-info" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Notificaciones <span class="badge badge-light"> <?php echo nNotificaciones() ?> </span></span></button>
              <ul class="dropdown-menu">
                <?php

                while ($row = mysqli_fetch_array($resultado)) {
                  echo "<li class='mt-2 list-group-item list-group-item-success'> La empresa " . $row['nombreEmpresa'] . " Ha visto tu CV en la propuesta " . $row['titulo'] . " </li>";
                }

                ?>
              </ul>
    </li>
    
    </nav>