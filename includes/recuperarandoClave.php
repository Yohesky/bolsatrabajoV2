<?php
include("conexion.php");

if(isset($_POST["respuesta"]) && isset($_POST["iduser"])){
    $respuesta = $_POST["respuesta"];
    $iduser = $_POST["iduser"];

    $query = "SELECT resp1 FROM usuarios WHERE idusuarios = '$iduser' ";
    $rsQuery = mysqli_query($conexion, $query) or die(mysqli_error($conexion));

    $data = mysqli_fetch_array($rsQuery);

    if($data["resp1"] === $respuesta){

  
        echo "exito";
        
    }
        else {
            echo "no se recibio";
        }

    
}





?>