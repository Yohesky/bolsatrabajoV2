

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
    crossorigin="anonymous">
    <link rel="stylesheet" href="css/pushbar.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
</head>
<body id="controlpanel">
<?php include("includes/sesionTrabajador.php") ?>

    
    <nav class="navbar navbar-dark bg-dark">
           
        <i class="fas fa-bars fa-3x menu" data-pushbar-target="pushbar-menu"></i>
        
        
    </nav>

    <div data-pushbar-id="pushbar-menu" class="pushbar from_left pushbar-menu fondo">
        <div class="btn-cerrar">
         
             <i class="fas fa-times close fa-5x" data-pushbar-close></i>
         
        </div>
 
       
 
       <nav class="nav-menu">
             
                 
             <a href="trabajador.php">
                 
                     <li>
                             <div class="barra"></div>
                             <a href="trabajador.php" class="menu">Trabajos</a>
                     </li>
             </a>
                 
             <a href="busquedaPersonalizada.php">
                         <li>
                                 <div class="barra"></div>
                                 <a href="busquedaPersonalizada.php" class="menu">Busqueda Personalizada</a>
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


    <div class="row container mx-auto mt-5 text-center text-white">

        <div class="col-md-6 mx-auto">

    
                  

               <a href="trabajador.php" class="off">
                <div class="card mx-auto mt-3 trabajos" style="width: 18rem;">
                    <i class="fas fa-briefcase card-img-top fa-5x mt-3"></i>
                    <div class="card-body">
                      <h5 class="card-title">Trabajos</h5>
                      
                    </div>
                </div>
               </a>

            
                 <a href="perfilTrabajador.php" class="off">
                    <div class="card mx-auto mt-3 perfil" style="width: 18rem;">
                        <i class="fas fa-address-card card-img-top fa-5x mt-3"></i>
                        <div class="card-body">
                          <h5 class="card-title">Mi Perfil</h5>
                          
                        </div>
                      </div>
                 </a>
        </div>

        <div class="col-md-6 mx-auto">
          <a href="postulaciones.php" class="off">
            <div class="card mx-auto mt-3 postulaciones" style="width: 18rem;">
                <i class="far fa-calendar-check card-img-top fa-5x mt-3"></i>
                <div class="card-body">
                  <h5 class="card-title">Mis Postulaciones</h5>
                  
                </div>
              </div>
          </a>

            <a href="includes/logout.php" class="off">
                <div class="card mx-auto mt-3 sesion" style="width: 18rem;">
                    <i class="fas fa-sign-out-alt card-img-top fa-5x mt-3"></i>
                    <div class="card-body">
                      <h5 class="card-title">Cerrar Sesión</h5>
                      
                    </div>
                  </div>
             </a>
        </div>

    </div>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script src="js/pushbar.js"></script>

<script>
    var pushbar = new Pushbar
    ({
        blur: true,
        overlay: true
    })
</script>

</body>
</html>