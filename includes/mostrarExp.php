<?php

include("conexion.php");
session_start();
$idusuario = $_SESSION['idusuarios'];

$query = "SELECT * FROM experiencia where usuarios_idusuarios='$idusuario' ";
$resultado = mysqli_query($conexion,$query);

if(!$resultado)
{
    die("Conexion fallida, no se pudo traer los datos". mysqli_error($conexion));

}

$json = array();
while($row = mysqli_fetch_array($resultado))
{
    $json [] = array
    (
        "expEmpresa" => $row ["expEmpresa"],
        "expPais" => $row ["expPais"],
        "expSector" => $row ["expSector"],
        "expArea" => $row ["expArea"],
        "expLabor" => $row ["expLabor"],
        "expFechaIni" => $row ["expFechaIni"],
        "expFechaFin" => $row ["expFechaFin"]
    );
}

$jsonString = json_encode($json);

echo $jsonString;

?>