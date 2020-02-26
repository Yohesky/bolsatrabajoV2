<?php

include("conexion.php");
session_start();
$idusuario = $_SESSION['idusuarios'];

if(isset($_POST["instagram"]) && !empty($_POST["facebook"]) && isset($_POST["linkedin"])){
     
$instagram = $_POST["instagram"];
$facebook = $_POST["facebook"];
$linkedin = $_POST["linkedin"];

$query = "UPDATE usuarios SET instagram='$instagram', facebook='$facebook', linkedin='$linkedin' WHERE idusuarios='$idusuario' ";
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