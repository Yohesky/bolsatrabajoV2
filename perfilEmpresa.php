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
                            <h1 class="p-3 mb-5 bg-white text-break" style="text-transform: capitalize" id="nomG"><?php echo $nombreEmpresa; ?></h1> </div>
                        </div>
                    </div>
                </div>

                
            </div>

        <h3 class="bg-white p-3 rounded">Trabajadores Seleccionados</h3>
        <div style="max-height: 23rem; overflow: auto;" >
            <ul id="empleadosSeleccionados">
                
            </ul>
        </div>
            
        </div>

        <!-- formulario de datos -->
        
        <div class="col-md-6">        
        
        <div class="card card-body mt-1">
            <h3>Edita tu perfil</h3>
        </div>            
        <div>
                <?php include("includes/mostrarDescripcionEmpresa.php") ?>
            </div>

        <div class="card mt-2">
                <!-- card-body para un espaciado interno entre los componentes -->
                <div class="card-body">
                    <?php include("includes/datosEmpresa.php") ?>
                </div>

                <div class="card text-white">
                <button class="btn btn-warning text-white" data-toggle="modal" data-target="#localizacionModal" id="localizacionM">¿Ha cambiado de País?</button>
            </div>


            <div class="modal fade" id="localizacionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="modal-title text-center">
                            <h5 class="" id="exampleModalLabel">Cambia tu Ubicacion</h5>
                            </div>
                                
                            <hr>
                            <br>

                            

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                       
                            <form id="localizacion" class="card card-body mt-3">

                                <div class="form-group">
                                    <select class="form-control" name='pais' id="pais">
                                        
                                    <?php 
                                        include('includes/conexion.php');
                                        session_start();
                                        $query = "SELECT * FROM pais";
                                        $resultado = mysqli_query($conexion, $query) or die(mysqli_error($conexion));
                                        
                                        while ($row = mysqli_fetch_array($resultado)) {
                                            echo "<option value='".$row['id']."'>";
                                            echo $row['paisnombre'];
                                            echo "</option>";
                                        } 
                                        ?>
                                    </select>
                
            
                                </div>

                                
                                <div class="form-group">
                                     <select class="form-control" name="estado" id="estado">
                                                <option value="">Estado</option>
                                    </select>
                                </div>



                                <button class="btn btn-info btn-block">Guardar</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" id="cerrar-modal" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
                
            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php") ?>
<script src="js/validaciones.js"></script>
<script src="js/perfilEmpresa.js"></script>
<script src="js/direccionesEmpresa.js"></script>
<script>
    actLocalizacion()
    	$(document).ready(function(){
				$("#pais").ready(function () {
                    
                   console.log('ready');
                   $("#pais option:selected").each(function () {
						idpais = $(this).val();
						$.post("includes/getEstados.php", { idpais: idpais }, function(data){
                            console.log(data);
                            
							$("#estado").html(data);
						});            
					});

                })
                

                $("#pais").change(function () {
                    
                    console.log('cambiando');
                    $("#pais option:selected").each(function () {
                         idpais = $(this).val();
                         $.post("includes/getEstados.php", { idpais: idpais }, function(data){
                             console.log(data);
                             
                             $("#estado").html(data);
                         });            
                     });
 
                 })
            });
            
            function actLocalizacion(){
                $("#localizacion").submit(function (e){
                   let localizacion = $("#localizacion").serialize()
                    console.log(localizacion);
                    
                    
                    $.ajax({
                        method: 'POST',
                        url: "includes/actualizarLocalizacionEmpresa.php",
                        data: localizacion,
                        success: function (response) {
        
                            
                            console.log(response)
                        },
                        error: function(error){
                            console.log(error);
                        }
                        });

                    e.preventDefault()
                })
            }
</script>