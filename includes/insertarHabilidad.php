<?php

include("conexion.php");
session_start();
$idusuario = $_SESSION['idusuarios'];

if(isset($_POST["habilidad"]) && !empty($_POST["habilidad"]) && isset($_POST["nivelHabilidad"])){
     
$habilidad = $_POST["habilidad"];
$nivelHabilidad = $_POST["nivelHabilidad"];

$query = "INSERT INTO habilidades (nombreHabilidad, idusuario, nivelHabilidad) VALUES ('$habilidad', '$idusuario', '$nivelHabilidad') ";
mysqli_query($conexion,$query) or die(mysqli_error($conexion).$query);

    if(!$query)
     {
     die("la consulta fallo");
    }
    

    echo "exito";

}else {
    echo "no recibo";
}

?>