<?php

//incluir la conexion con el servidor
include("conexion.php");
session_start();
$idusuario = $_SESSION['idusuarios'];
$idpropuesta = $_POST["id"];
    
    
    $sql = "SELECT COUNT(*) as cantidad FROM usuarios_has_propuesta WHERE usuarios_idusuarios='$idusuario' AND propuesta_idpropuesta='$idpropuesta'";
    $res = mysqli_query($conexion, $sql);
    $data = mysqli_fetch_array($res);
    if($data["cantidad"] > 0)
    {
       echo "nInsertado";
    }   
    else{
        $query = "INSERT INTO usuarios_has_propuesta(usuarios_idusuarios, propuesta_idpropuesta) 
        VALUES('$idusuario', '$idpropuesta')";

        mysqli_query($conexion,$query) or die(mysqli_error($conexion).$query);

        if(!$query)
        {
            die("la consulta fallo");
        }
    

    echo "exito";
    }
    //entre parentesis (nombre, descripcion) se llaman las columnas en la BD
    

?>