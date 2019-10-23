<?php

//incluir la conexion con el servidor
include("conexion.php");
session_start();
$idusuario = $_SESSION['idusuarios'];


if(isset($_POST["id"]))
{
    
    $idpropuesta = $_POST["id"];
    
    

    //entre parentesis (nombre, descripcion) se llaman las columnas en la BD
    $query = "INSERT INTO usuarios_has_propuesta(usuarios_idusuarios, propuesta_idpropuesta) 
    VALUES('$idusuario', '$idpropuesta')";

    mysqli_query($conexion,$query) or die(mysqli_error($conexion).$query);

    if(!$query)
     {
     die("la consulta fallo");
    }
    

    echo "exito";
}
else
{
    echo "error no se pudo insertar";
}

?>