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

    //entre parentesis (nombre, descripcion) se llaman las columnas en la BD
    $query = "UPDATE propuesta set titulo='$nombre', descripcion='$descripcion', vacantes='$vacantes', sueldo='$sueldo',
    localizacion='$localizacion', funciones='$funciones' WHERE idpropuesta='$id' ";

    mysqli_query($conexion,$query) or die(mysqli_error($conexion).$query);

    // if(!$resultado)
    // {
    //   die("la consulta fallo");
    // }

    echo "guardada";
}
?>