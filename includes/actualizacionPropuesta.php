<?php 

include("conexion.php");

if(isset($_POST["postulacionId"]))
{
    $id = $_POST["postulacionId"];
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $vacantes = $_POST["vacantes"];
    $sueldo = $_POST["sueldo"];
    $funciones = $_POST['funciones'];
    $categoria = $_POST['categoria'];
    $viajes = $_POST['viajes'];
    $vehiculo = $_POST['vehiculo'];
    $aExp = $_POST['aExp'];
    $educacion = $_POST['educacion'];
    $pais = mysqli_real_escape_string($conexion, $_POST['pais']);
    $estado = mysqli_real_escape_string($conexion, $_POST['estado']);
    


    //entre parentesis (nombre, descripcion) se llaman las columnas en la BD
    $query = "UPDATE propuesta set titulo='$nombre', descripcion='$descripcion', vacantes='$vacantes', sueldo='$sueldo', funciones='$funciones', categoria='$categoria', aExp='$aExp', educacion='$educacion', viajes='$viajes', vehiculo='$vehiculo', idpais='$pais', idestado='$estado' WHERE idpropuesta='$id' ";

    mysqli_query($conexion,$query) or die(mysqli_error($conexion).$query);

    // if(!$resultado)
    // {
    //   die("la consulta fallo");
    // }

    echo "guardada";
}
?>