<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/@coreui/coreui/dist/css/coreui.min.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
    crossorigin="anonymous">
    <link rel="stylesheet" href="css/pushbar.css">
    <link rel="stylesheet" href="css/custom.css">

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <i class="fas fa-bars fa-3x menu" data-pushbar-target="pushbar-menu"></i>
    <nav class="navbar navbar-dark bg-dark ml-auto">
           
           
           <input class="form-control" type="buscar" id="buscar" placeholder="Busca empleo" aria-label="Search">
           
       </nav>

       <div data-pushbar-id="pushbar-menu" class="pushbar from_left pushbar-menu fondo">
        <div class="btn-cerrar">
         
             <i class="fas fa-times close fa-5x" data-pushbar-close></i>
         
        </div>
 
       
 
       <nav class="nav-menu">
             
       <a href="panelControl.php">
                 
                 <li>
                         <div class="barra"></div>
                         <a href="panelControl.php" class="menu">Panel de Control</a>
                 </li>
         </a>


             <a href="trabajador.php">
                 
                     <li>
                             <div class="barra"></div>
                             <a href="trabajador.php" class="menu">Trabajos</a>
                     </li>
             </a>
                 
     
     
                 <a href="postulaciones.php">
                         <li>
                                 <div class="barra"></div>
                                 <a href="postulaciones.php" class="menu">Mis Postulaciones</a>
                             </li>
                 </a>
     
     
     
                 <a href="perfilTrabajador.php">
                         <li>
                                 <div class="barra"></div>
                                 <a href="perfilTrabajador.php" class="menu">Mi Perfil</a>
                             </li>
                 </a>
     
             
                 <a href="includes/logout.php">
                         <li>
                                 <div class="barra"></div>
                                 <a href="includes/logout.php" class="menu">Salir</a>
                             </li>
                 </a>
     
     
     
             
        
       </nav>
    </div>

       
        
        
    </nav>