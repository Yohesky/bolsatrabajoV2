<?php

include("conexion.php");



if(isset($_POST["id"]))
{
    
    $id = $_POST["id"];
    

   
    $query = "SELECT * FROM habilidades WHERE idHabilidad='$id'";

    $resultado = mysqli_query($conexion,$query);



    $rsQuery = mysqli_query($conexion, $query) or die(mysqli_error($conexion));
    $json = array();
while($row = mysqli_fetch_array($resultado))
{
    
    $json [] = array
    (
        "idHabilidad" => $row["idHabilidad"],
        "nombreHabilidad" => $row["nombreHabilidad"],
        "idusuario" => $row["idusuario"],
        "nivelHabilidad" => $row["nivelHabilidad"]
    );
}

$jsonString = json_encode($json[0]);

echo $jsonString;
}

?>