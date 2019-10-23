<?php

include("conexion.php");
session_start();

$idusuario = $_SESSION['idusuarios'];

$query = "SELECT * FROM usuarios_has_propuesta JOIN propuesta ON usuarios_has_propuesta.propuesta_idpropuesta = propuesta.idpropuesta WHERE usuarios_idusuarios='$idusuario'";
$resultado = mysqli_query($conexion,$query);



$rsQuery = mysqli_query($conexion, $query) or die(mysqli_error($conexion));

$json = array();
while($row = mysqli_fetch_array($resultado))
{
    
    $json [] = array
    (
        "titulo" => $row["titulo"],
        "descripcion" => $row["descripcion"],
        "sueldo" => $row["sueldo"],
        "localizacion" => $row["localizacion"],
    );
}

$jsonString = json_encode($json);

echo $jsonString;


?>