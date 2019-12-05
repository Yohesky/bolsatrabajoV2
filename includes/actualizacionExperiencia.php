<?php 

include("conexion.php");



if(isset($_POST["experienciaID"]))
{
    $idexp = $_POST["experienciaID"];
    $expEmpresa = $_POST["expEmpresa"];
    $expPais = $_POST["expPais"];
    $expSector = $_POST["expSector"];
    $expArea = $_POST["expArea"];
    $expLabor = $_POST["expLabor"];
    $expFechaIni = $_POST['expFechaIni'];
    $expFechaFin = $_POST['expFechaFin'];

    //entre parentesis (nombre, descripcion) se llaman las columnas en la BD
    $query = "UPDATE experiencia set expEmpresa='$expEmpresa', expPais='$expPais', expSector='$expSector', expArea='$expArea',
    expLabor='$expLabor', expFechaIni='$expFechaIni', expFechaFin='$expFechaFin' WHERE idexp='$idexp'";

    mysqli_query($conexion,$query) or die(mysqli_error($conexion).$query);

    // if(!$resultado)
    // {
    //   die("la consulta fallo");
    // }

    echo "actualizada";
}
?>