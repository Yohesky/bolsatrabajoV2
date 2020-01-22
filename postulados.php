<?php include("includes/headerEmpresa.php") ?>
<link rel="stylesheet" href="css/dashboard.css">

<?php
include('includes/conexion.php');

$id = $_GET["id"];
$query = "SELECT * FROM experiencia JOIN usuarios ON experiencia.usuarios_idusuarios = usuarios.idusuarios WHERE idusuarios = '$id'";
$rsquery = mysqli_query($conexion, $query);
$postulado = mysqli_fetch_array($rsquery);

                            

    
    $query2 = "SELECT * FROM experiencia WHERE usuarios_idusuarios='$id'";
    $rsquery2 = mysqli_query($conexion, $query2);
    
     
                          
                   ?>



<div class="row">

    <div class="col-md-4">

        <aside class="side-nav" id="show-side-navigation1">

            <div class="bg-dark">
                <img src="<?php echo $postulado["fotoPerfil"] ?>" alt="perfil" class="responsive rounded-circle mb-4 mt-5 ml-5  bg-white" id="fotoPerfil" style="width: 100px; height: 100px;">
            </div>

            <ul class="categories">
                <h5 class="mt-5 ml-4">Principales Conocimientos</h5>
                <li><i class="fa fa-home fa-fw" aria-hidden="true"></i><a href="#"> About us</a>
                    <ul class="side-nav-dropdown">
                        <li><a href="#">Lorem ipsum</a></li>
                        <li><a href="#">ipsum dolor</a></li>
                        <li><a href="#">dolor ipsum</a></li>
                        <li><a href="#">amet consectetur</a></li>
                        <li><a href="#">ipsum dolor sit</a></li>
                    </ul>
            </ul>
        </aside>


    </div>

    <div class="col-md-6">
        <div class="contents">

            <div class="row">
                <div class="col-md-6">
                    <?php while ($row = $expPost = mysqli_fetch_array($rsquery2)) {
                        echo 
                        '
            <div class="card">
                <div class="card-header">
                    '. $row['expEmpresa'] .'
                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                    <p> '. $row['expLabor'] .' </p>
                    <footer class="blockquote-footer">'. $row['expFechaIni'] .' <cite title="Source Title"> '. $row['expFechaFin'] .' </cite></footer>
                    </blockquote>
                </div>
            </div>
                        ';
                    } ?>
                </div>

                <div class="col-md-6"></div>
            </div>

        </div>


    </div>


    <?php include("includes/footer.php") ?>
    <script src="js/infoPostulados.js"></script>
    <script>
        $('#myCollapsible').collapse({
            toggle: false
        })
    </script>