<?php
	require_once('conexion.php');

	$idusuarios = $_GET["idusuarios"];
	$idempresa = $_GET["idempresa"];
	$idpropuesta = $_GET["idpropuesta"];

	$sql = "SELECT COUNT(*) as cantidad FROM seleccion WHERE idempresa='$idempresa' AND idusuarios='$idusuarios' AND idpropuesta = '$idpropuesta'";
$res = mysqli_query($conexion, $sql);
$data = mysqli_fetch_array($res);
if($data["cantidad"] > 0)
{
   echo "no insertado";
}
else{
     $query = "INSERT INTO seleccion (idempresa, idusuarios, idpropuesta) VALUES ('$idempresa', '$idusuarios', '$idpropuesta') ";
     mysqli_query($conexion,$query) or die(mysqli_error($conexion).$query);
     echo "insertado";
}

?>