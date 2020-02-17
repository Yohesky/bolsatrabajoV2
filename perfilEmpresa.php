<?php include("includes/headerEmpresa.php") ?>

<?php include("includes/sesionEmpresa.php") ?>

<!-- Modal -->
<div class="modal fade" id="subirFoto" tabindex="-1" role="dialog" aria-labelledby="exampleModal3Label" aria-hidden="true">

<?php
include("includes/conexion.php");

$idempresa = $_SESSION['idempresa'];

$query = "SELECT nombreEmpresa FROM empresa where idempresa='$idempresa'";
    
$resultado = mysqli_query($conexion, $query);

if(!$resultado)
{
    die("Conexion fallida, no se pudo traer los datos". mysqli_error($conexion));

}

$nombreEmpresa = mysqli_fetch_array($resultado)[0];

?>
      
</div>



<div class="container mt-4">
    <div class="row text-center">
        <div class="col-md-6">
            <!-- FOTO DE PERFIL -->
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <div class="contenedor-foto-perfil my-4" data-toggle="modal" data-target="#subirFoto">
                            <img src="" alt="perfil" class="responsive bg-white" id="fotoPerfil" style="border-radius: 5%">
                            <div class="texto-editar bg-white">Editar</div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <div class="card-title"> 
                            <h1 class="p-3 mb-5 bg-white text-break"><?php echo $nombreEmpresa; ?></h1> </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <?php include("includes/mostrarDescripcionEmpresa.php") ?>
            </div>
            
        </div>

        <!-- formulario de datos -->
        
        <div class="col-md-6">
        <div class="card card-body mt-1">
        <h3>Edita tu perfil</h3>
        </div>
        <div class="card mt-2">
                <!-- card-body para un espaciado interno entre los componentes -->
                <div class="card-body">
                    <?php include("includes/datosEmpresa.php") ?>
                </div>
                
            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php") ?>
<script src="js/validaciones.js"></script>
<script src="js/perfilEmpresa.js"></script>
<script src="js/direccionesEmpresa.js"></script>
