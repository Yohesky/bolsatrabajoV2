<?php 

include("conexion.php");

if(isset($_POST["habilidadId"]))
{
    $id = $_POST["habilidadId"];
    $nombreHabilidad = $_POST["habilidad"];
    $nivelHabilidad = $_POST["nivelHabilidad"];


    //entre parentesis (nombre, descripcion) se llaman las columnas en la BD
    $query = "UPDATE habilidades set nombreHabilidad='$nombreHabilidad',nivelHabilidad='$nivelHabilidad' WHERE idHabilidad='$id' ";

    mysqli_query($conexion,$query) or die(mysqli_error($conexion).$query);

    // if(!$resultado)
    // {
    //   die("la consulta fallo");
    // }

    echo "guardada";
}
?>