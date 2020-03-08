<?php

//incluir la conexion con el servidor
include("conexion.php");
session_start();
$idempresa = $_SESSION['idempresa'];

$query = "SELECT * FROM propuesta JOIN pais ON propuesta.idpais = pais.id JOIN estado ON propuesta.idestado = estado.idestado WHERE empresa_idempresa='$idempresa'";
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
        "paisnombre" => $row["paisnombre"],
        "sueldo" => $row["sueldo"],
        "estadonombre" => $row["estadonombre"],
    );
}

$jsonString = json_encode($json);
echo $jsonString;





?>