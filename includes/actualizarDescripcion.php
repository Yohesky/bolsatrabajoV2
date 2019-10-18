<?php

include("conexion.php");
session_start();
$idusuario = $_SESSION['idusuarios'];


if(isset($_POST["descripcion"]))
{
    
    $descripcion = $_POST["descripcion"];
    

   
    $query = "UPDATE usuarios SET descripcion='$descripcion' where idusuarios='$idusuario'";

    mysqli_query($conexion,$query) or die(mysqli_error($conexion).$query);

    // if(!$resultado)
    // {
    //   die("la consulta fallo");
    // }

    echo "exito";
}

?>