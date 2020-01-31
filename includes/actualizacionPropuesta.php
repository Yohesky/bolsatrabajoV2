<?php 

include("conexion.php");

if(isset($_POST["postulacionId"]))
{
    $id = $_POST["postulacionId"];
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $vacantes = $_POST["vacantes"];
    $sueldo = $_POST["sueldo"];
    $localizacion = $_POST["localizacion"];
    $funciones = $_POST['funciones'];
    $categoria = $_POST['categoria'];
    $viajes = $_POST['viajes'];
    $vehiculo = $_POST['vehiculo'];
    $aExp = $_POST['aExp'];
    $educacion = $_POST['educacion'];
    $estado = mysqli_real_escape_string($conexion, $_POST['estado']);
    $ciudad = mysqli_real_escape_string($conexion, $_POST['ciudad']);


    //entre parentesis (nombre, descripcion) se llaman las columnas en la BD
    $query = "UPDATE propuesta set titulo='$nombre', descripcion='$descripcion', vacantes='$vacantes', sueldo='$sueldo',
    localizacion='$localizacion', funciones='$funciones', categoria='$categoria', aExp='$aExp', educacion='$educacion', viajes='$viajes', vehiculo='$vehiculo', estado='$estado', ciudad='$ciudad' WHERE idpropuesta='$id' ";

    mysqli_query($conexion,$query) or die(mysqli_error($conexion).$query);

    // if(!$resultado)
    // {
    //   die("la consulta fallo");
    // }

    echo "guardada";
}
?>