<?php

include("conexion.php");
session_start();
$idusuario = $_SESSION['idusuarios'];

$query = "SELECT * FROM habilidades WHERE idusuario='$idusuario'";
$resultado = mysqli_query($conexion, $query);

if(!$resultado)
{
    die("Conexion fallida, no se pudo traer los datos". mysqli_error($conexion));

}

$json = array();
while($row = mysqli_fetch_array($resultado))
{
    $json[] = array
    (   "nombreHabilidad" => $row["nombreHabilidad"],
        "nivelHabilidad" => $row["nivelHabilidad"],
        "idHabilidad" => $row["idHabilidad"],
    );
}

$jsonString = json_encode($json);
echo $jsonString;


?>