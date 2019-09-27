<?php
include("conexion.php");
include("id.php");
session_start();

$correo = $_SESSION["correo"];

if(isset($_POST["puesto"]))
{
   
    $puestoDeseado = $_POST["puesto"];
   

    $query = "UPDATE usuarios SET puestoDeseado='$puestoDeseado' where correo='$correo'";
    
    mysqli_query($conexion,$query) or die(mysqli_error($conexion).$query);
}
else
{
    echo "error no se insertaron los datos";
}

?>