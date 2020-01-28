<?php
include("conexion.php");

if(isset($_POST["respuesta"]) && isset($_POST["empresaid"])){
    $respuesta = $_POST["respuesta"];
    $idempresa = $_POST["empresaid"];

    $query = "SELECT respuestaSeguridad FROM empresa WHERE idempresa = '$idempresa' ";
    $rsQuery = mysqli_query($conexion, $query) or die(mysqli_error($conexion));

    $data = mysqli_fetch_array($rsQuery);

    if($data["respuestaSeguridad"] === $respuesta){

  
        echo "exito";
        
    }
        else {
            echo "no se recibio";
        }

    
}





?>