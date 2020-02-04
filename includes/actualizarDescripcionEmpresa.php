<?php

include("conexion.php");
session_start();
$idempresa = $_SESSION['idempresa'];


if(isset($_POST["descripcion"]))
{
    
    $descripcion = $_POST["descripcion"];
    

   
    $query = "UPDATE empresa SET descripcionEmpresa='$descripcion' WHERE idempresa='$idempresa'";

    mysqli_query($conexion,$query) or die(mysqli_error($conexion).$query);

    // if(!$resultado)
    // {
    //   die("la consulta fallo");
    // }

    echo "exito";
}

?>