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
                <li><i class="fa fa-home fa-fw" aria-hidden="true"></i><a href="#"> About us</a></li>
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
            <div class="card mt-5" style="right: 90px;">
                <div class="card-header">
                    ' . $row['expEmpresa'] . '
                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                    <p> ' . $row['expLabor'] . ' </p>
                    <footer >' . $row['expFechaIni'] . ' Hasta ' . $row['expFechaFin'] . ' </cite></footer>
                    </blockquote>
                </div>
            </div>
                        ';
                    } ?>
                </div>

                <div class="col-md-6">
               
                <?php
                    include("includes/conexion.php");
                    $query3 = "SELECT * FROM usuarios WHERE idusuarios ='$id' ";
                    $result = mysqli_query($conexion, $query3);
                    $cv = mysqli_fetch_array($result);
                    ?>
                    <div class="card border-primary mb-3 mt-5" style="max-width: 18rem; left: 70px;">
                        <div class="card-header"> <?php echo $cv["nombre"] ?>  <?php echo $cv["apellido"] ?> </div>
                        <div class="card-body text-primary">
                            <h5 class="card-title">Descripcion:</h5>
                            <p class="card-text">
                            <?php echo $cv["descripcion"] ?>

                                <hr>
                                <h5 class="card-title">Correo:</h5>
                                <?php echo $cv["correo"] ?>


                                <hr>
                                <h5 class="card-title">Estado Civil:</h5>
                                <?php echo $cv["estadoCivil"] ?>

                                <hr>
                                <h5 class="card-title">Genero:</h5>
                                <?php echo $cv["genero"] ?>

                                <hr>
                                <h5 class="card-title">Direccion:</h5>
                                <?php echo $cv["direccion"] ?>

                                <hr>
                                <h5 class="card-title">Nivel de Educacion:</h5>
                                <?php echo $cv["educacion"] ?>
                                <hr>

                                <h5 class="card-title">Edad:</h5>
                                <?php echo $cv["edad"] ?>
                                <hr>
                                <?php 
                                    if(!empty($cv["curriculum"])){
                                      echo "<a id='notificacion' href='".$cv['curriculum']."' target='_blank' class='btn btn-success'> Descargar PDF </a>";
                                    }
                                ?>

                            </p>
                        </div>
                    </div>


                    
                </div>
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
    <script src="js/notificaciones.js"></script>