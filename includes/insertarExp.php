<?php

include("conexion.php");
include("id.php");
session_start();
$correo = $_SESSION["correo"];


if(isset($_POST["expEmpresa"]) && isset($_POST["expPais"]) && isset($_POST["expSector"])
&& isset($_POST["expArea"]) && isset($_POST["expLabor"]) && isset($_POST["expFechaIni"]) && isset($_POST["expFechaFin"]))
{
    
    $expEmpresa = $_POST["expEmpresa"];
    $expPais = $_POST["expPais"];
    $expSector = $_POST["expSector"];
    $expArea = $_POST["expArea"];
    $expLabor = $_POST["expLabor"];
    $expFechaIni = $_POST["expFechaIni"];
    $expFechaFin = $_POST['expFechaFin'];

    //entre parentesis (nombre, descripcion) se llaman las columnas en la BD
    $query = "INSERT INTO usuarios WHERE correo='$correo' (expEmpresa, expPais, expSector, expArea,expLabor,expFechaIni,expFechaFin) 
    VALUES('$expEmpresa', '$expPais', '$expSector', '$expArea', '$expLabor','$expFechaIni','$expFechaFin')";

    mysqli_query($conexion,$query) or die(mysqli_error($conexion).$query);

    // if(!$resultado)
    // {
    //   die("la consulta fallo");
    // }

    echo "guardada";
}

?>