<?php

//incluir la conexion con el servidor
include("conexion.php");
session_start();
$idempresa = $_SESSION['idempresa'];

$query = "SELECT * FROM propuesta WHERE empresa_idempresa='$idempresa'";
$resultado = mysqli_query($conexion, $query);

if(!$resultado)
{
    die("Conexion fallida, no se pudo traer los datos". mysqli_error($conexion));

}

$json = array();
while($row = mysqli_fetch_array($resultado))
{
    $json[] = array
    (   "idempresa" => $row["empresa_idempresa"],
        "idpropuesta" => $row["idpropuesta"],
        "titulo" => $row["titulo"],
        "descripcion" => $row["descripcion"],
        "vacantes" => $row["vacantes"],
        "sueldo" => $row["sueldo"]
    );
}

$jsonString = json_encode($json);
echo $jsonString;





?>