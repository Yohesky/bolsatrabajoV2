<?php
include("conexion.php");

session_start();
$idempresa = $_SESSION['idempresa'];
$idusuario = $_POST["id"];
$idpropuesta = $_POST["idpropuesta"];

$query = "INSERT INTO notificaciones (idempresa, idusuario, idpropuesta) VALUES ('$idempresa', '$idusuario', '$idpropuesta') ";
mysqli_query($conexion,$query) or die(mysqli_error($conexion).$query);

if(!$query)
     {
     die("la consulta fallo");
    }
    

    echo "exito";
