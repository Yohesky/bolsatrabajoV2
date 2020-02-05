<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/coreui.min.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
    crossorigin="anonymous">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/pushbar.css">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="js/jquery-ui-1.12.1.custom/jquery-ui.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    
    

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

       
    </nav>