<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/customize.css">
    
</head>
<body class="h-100">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#"> Bolsa de Trabajo VE </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
<div class="container h-75">
    <div class="row align-items-center h-100">

        <div class="col-12 col-sm-6  offset-md-2 col-md-4 text-center login">
           <a href="loginEmpresa.php" class="text-white">
               <img src="img/empresa.png" alt="" class="rounded">
               <h2>Empresas</h2>
           </a>
           
        </div>


        <div class="col-12 col-sm-6 col-md-4 text-center login">
           <a href="loginTrabajador.php" class="text-white">
                <img src="img/trabajador.png" alt="" class="rounded"> 
                <h2>Trabajadores</h2>
           </a>
        </div>
    </div>
</div>

<?php include("includes/footer.php") ?>