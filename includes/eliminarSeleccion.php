<?php
	require_once('conexion.php');
	$idseleccion = $_GET["idseleccion"];
	$query = "DELETE from seleccion where idseleccion = '$idseleccion'";
	$res = mysqli_query($conexion, $query) or die(mysqli_error($conexion).$query);
	if($res){
		echo "ok";
	}
?>