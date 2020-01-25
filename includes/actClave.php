<?php
include("conexion.php");

if(isset($_POST["nContrasena"]) &&isset($_POST["idusuario"]) ){
    $contrasena = $_POST["nContrasena"];
    $idusuario = $_POST["idusuario"];

    
    $query = "UPDATE usuarios SET contrasena='$contrasena' WHERE idusuarios = '$idusuario' ";
    $rsQuery = mysqli_query($conexion, $query) or die(mysqli_error($conexion));

    echo "exito";
    
}
else{
    echo "no se pudo actualizar";
}





?>