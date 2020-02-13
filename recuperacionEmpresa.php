<?php include("includes/verificacionLogin.php") ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Recuperación de Empresas</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
 
    
</head>
<body>


<div class="card-body">
<div class="card card-body mt-1 text-center">
        <h3>Recuperación de Contraseña</h3>
</div>
<div class="row">
    <form id="formulario" class="col-md-6 col-md-offseet-3 container mt-5 text-center">
        <div class="form-group">
            <input type="text" name="correo" id="correo" placeholder="Ingrese su correo electronico" class="form-control" autofocus>
        </div>

        <button class="btn btn-success btn-block mt-5" id="enviar">Enviar</button>
        
        <div id="result" class="mt-5"></div>
    </form>

    
</div>
</div>

<?php include("includes/footer.php") ?>
<script src="js/recuperacionEmpresa.js"></script>
<script src="js/validaciones.js"></script>
