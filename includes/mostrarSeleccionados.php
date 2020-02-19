<?php
	require_once('conexion.php');
	session_start();
	$idempresa = $_SESSION["idempresa"];
	$query = "SELECT * FROM usuarios INNER JOIN seleccion WHERE usuarios.idusuarios in (Select idusuarios from seleccion where idempresa = '$idempresa')";
	$res = mysqli_query($conexion, $query) or die(mysqli_error($conexion).$query);

	$json = array();
	while($row = mysqli_fetch_array($res)){
		$json[] = array(
			"nombre" => $row["nombre"],
			"apellido" => $row["apellido"],
			"idseleccion" => $row["idseleccion"],
			"idusuarios" => $row["idusuarios"]
		);
	}

	echo json_encode($json);

?>