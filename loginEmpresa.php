
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

    <div class="card-body">
        <div class="card card-body mt-1 text-center">
            <h3>Empresas</h3>
        </div>
        <div class="row">
            <form id="formulario" class="col-md-6 col-md-offseet-3 container mt-5 text-center needs-validation" novalidate>
                <div class="form-group">
                    <input type="text" name="correo" id="correo" placeholder="Correo" class="form-control" autofocus>
                </div>

                <div class="form-group">
                    <input type="password" name="contrasena" id="contrasena" placeholder="Contraseña" class="form-control">
                </div>
                <button class="btn btn-success btn-block mt-5" id="ingresar" type="submit">Ingresar</button>

                <div id="resultado"></div>

                <a href="registroEmpresa.php" class="mt-4"> ¿No tienes cuenta empresarial? Crea una!</a>
                <br>

                <a href="recuperacionEmpresa.php" class="mt-4"> ¿Olvidó su contraseña? </a>
                <br>
                <a href="index.php" class="mt-4 btn btn-success"> Volver</a>
            </form>
        </div>
    </div>

    <?php include("includes/footer.php") ?>    
    <script src="js/validaciones.js"></script>
    <script src="js/loginEmpresa.js"></script>
