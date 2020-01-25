<?php include("includes/verificacionLogin.php") ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
 
    
</head>
<body>

<?php 
    include('includes/conexion.php');

    $idempresa = $_GET["idempresa"];
    $correoEmpresa = $_GET["correoEmpresa"];

    $query = "SELECT correoEmpresa, idempresa, preguntaSeguridad, respuestaSeguridad, idempresa FROM empresa WHERE correoEmpresa = '$correoEmpresa' AND idempresa='$idempresa'";
    $rsQuery = mysqli_query($conexion, $query) or die(mysqli_error($conexion));
	$datos = mysqli_fetch_array($rsQuery); 
?>

<div class="card-body">
<div class="card card-body mt-1 text-center">
        <h3>Recuperación de Contraseña</h3>
</div>
<div class="row">
    <form id="formRecuperar" class="col-md-6 col-md-offseet-3 container mt-5 text-center">
        <div class="form-group">
           <label for="" class="form-control bg-info"> <?php echo $datos["preguntaSeguridad"]; ?> </label>
        </div>

        <div class="form-group">
            <label for="respuesta"> Ingrese su respuesta </label>
            <input id="respuesta" name="respuesta" type="text" class="form-control">

            <input type="hidden" id="empresaid" name="empresaid" value="<?php echo $datos["idempresa"]; ?>">
        </div>

        <button class="btn btn-success btn-block mt-5" id="enviar">Enviar</button>

        <div id="result"></div>

        

    </form>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-center" id="exampleModalLabel">Ingresa tu nueva contraseña</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="card card-body" id="formNContrasena">
                            <input type="hidden" id="idempresa" name="idempresa" value="<?php echo $datos["idempresa"]; ?>">
                                <div class="form-group">
                                    <input type="password" name="nContrasena" id="nContrasena" placeholder="Ingresa tu nueva contrasena" class="form-control" required>
                                </div>

                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button id="guardar" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
</div>
</div>

<?php include("includes/footer.php") ?>
<script src="js/recuperacionEmpresa.js"></script>

