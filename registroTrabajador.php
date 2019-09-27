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
    <div class="row">
    <form id="formulario" class="col-md-6 col-md-offset-4 container text-center">
        <div class="form-group">
            <input type="text" name="nombre" id="nombre" placeholder="Nombre" class="form-control" autofocus>
        </div>

        <div class="form-group">
            <input type="text" name="apellido" id="apellido" placeholder="Apellido" class="form-control" autofocus>
        </div>

        <div class="form-group">
            <input type="email" name="email" id="email" placeholder="Correo" class="form-control">
        </div>

        <div class="form-group">
            <input type="number" name="ci" id="ci" placeholder="Cédula" class="form-control">
        </div>

        <div class="form-group">
            <input type="password" name="contrasena" id="contrasena" placeholder="Contraseña" class="form-control">
        </div>

        <div class="form-group">
            <input type="password" name="contrasena2" id="contrasena2" placeholder="Ingrese contraseña nuevamente" class="form-control">
        </div>


        <button class="btn btn-success btn-block mt-0" id="registro">Registrarse</button>
        <br>
        <a href="loginTrabajador.php" class="pt-4"> Ingresar </a>
        <div id="resultado">

        </div>
    </form>
    </div>

<?php include("includes/footer.php") ?>
<script src="js/trabajador.js"></script>