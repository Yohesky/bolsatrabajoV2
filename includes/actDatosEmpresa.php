<?php
include("conexion.php");
session_start();

$idempresa = $_SESSION['idempresa'];

if(isset($_POST["nombreEmpresa"]) && isset($_POST["rif"]) && isset($_POST["direccionEmpresa"])
&& isset($_POST["areaEmpresa"]) && isset($_POST["correoEmpresa"]) && isset($_POST["webEmpresa"]) )
{
    $nombreEmpresa = $_POST["nombreEmpresa"];
    $rif = $_POST["rif"];
    $direccionEmpresa = $_POST["direccionEmpresa"];
    $areaEmpresa = $_POST["areaEmpresa"];
    $correoEmpresa = $_POST["correoEmpresa"];
    $webEmpresa = $_POST["webEmpresa"];

    


    $query = "UPDATE empresa SET nombreEmpresa='$nombreEmpresa', rif='$rif', direccionEmpresa='$direccionEmpresa', areaEmpresa='$areaEmpresa',
    correoEmpresa='$correoEmpresa', webEmpresa='$webEmpresa' where idempresa='$idempresa'";
    
    mysqli_query($conexion,$query) or die(mysqli_error($conexion).$query);

    echo "exito";
}
else
{
    echo "error no se insertaron los datos";
}

?>