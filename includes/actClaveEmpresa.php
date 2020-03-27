<?php
include("conexion.php");

if(isset($_POST["nContrasena"]) &&isset($_POST["idempresa"]) ){
    $contrasena = $_POST["nContrasena"];
    $idempresa = $_POST["idempresa"];
    $claveHash = password_hash($contrasena, PASSWORD_BCRYPT);

    
    $query = "UPDATE empresa SET contrasenaEmpresa='$claveHash' WHERE idempresa = '$idempresa' ";
    $rsQuery = mysqli_query($conexion, $query) or die(mysqli_error($conexion));

    echo "exito";
    
}
else{
    echo "no se pudo actualizar";
}





?>