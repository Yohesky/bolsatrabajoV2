<?php

//incluir la conexion con el servidor
include("conexion.php");


$query = "SELECT * from propuesta order by idpropuesta desc limit 1";
$resultado = mysqli_query($conexion, $query);

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
        "descripcion" => $row["descripcion"]
    );
}

$jsonString = json_encode($json);
echo $jsonString;





?>