<?php

include("conexion.php");
session_start();

$idempresa = $_SESSION['idempresa'];

$query = "SELECT titulo, nombre FROM usuarios_has_propuesta JOIN propuesta
ON usuarios_has_propuesta.propuesta_idpropuesta = propuesta.idpropuesta
JOIN usuarios ON usuarios_has_propuesta.usuarios_idusuarios = usuarios.idusuarios WHERE empresa_idempresa='$idempresa'";

$resultado = mysqli_query($conexion,$query);

if(!$resultado)
{
    die("Conexion fallida, no se pudo traer los datos". mysqli_error($conexion));

}

$json = array();
while($row = mysqli_fetch_array($resultado))
{
    $json[] = array 
    (   
        "titulo" => $row["titulo"],
        "nombre" => $row["nombre"],
        "idempresa" => $row["empresa_idempresa"]
    );
}

$jsonString = json_encode($json);
echo $jsonString;


?>