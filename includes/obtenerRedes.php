<?php

include("conexion.php");
session_start();
$idusuario = $_SESSION['idusuarios'];

$query = "SELECT * FROM usuarios WHERE idusuarios='$idusuario'";
$resultado = mysqli_query($conexion, $query);

if(!$resultado)
{
    die("Conexion fallida, no se pudo traer los datos". mysqli_error($conexion));

}

$json = array();
while($row = mysqli_fetch_array($resultado))
{
    $json[] = array
    (   "facebook" => $row["facebook"],
        "instagram" => $row["instagram"],
        "linkedin" => $row["linkedin"],
    );
}

$jsonString = json_encode($json);
echo $jsonString;


?>