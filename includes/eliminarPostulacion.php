<?php

include("conexion.php");
session_start();
$idusuario = $_SESSION['idusuarios'];

//verifica si mediante el metodo POST hay una variable ID y la almacena para eliminar los datos
if(isset($_POST["id"]))
{

    $id = $_POST["id"];


    $query = "DELETE FROM usuarios_has_propuesta WHERE propuesta_idpropuesta='$id' AND usuarios_idusuarios='$idusuario'";
    $resultado = mysqli_query($conexion, $query);

    // if(!$resultado)
    // {
    //     die("La consulta ha fallado");
    // }

    mysqli_query($conexion,$query) or die(mysqli_error($conexion).$query);

    echo "postulacion eliminada satisfactoriamente";

}



?>