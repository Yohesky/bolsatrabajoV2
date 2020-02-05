<?php
	require_once('conexion.php');
	$id = $_GET["id"];

	$queryUsuario = "SELECT * FROM usuarios  WHERE idusuarios = '$id'";
	$rsQuery = mysqli_query($conexion, $queryUsuario) or die(mysqli_error($conexion));
	$usuario = mysqli_fetch_assoc($rsQuery);

	$queryHabilidades = "SELECT nombreHabilidad, nivelHabilidad FROM habilidades  WHERE idusuario = '$id'";
	$rsQueryH = mysqli_query($conexion, $queryHabilidades) or die(mysqli_error($conexion));
	
	$habilidades = array();
	while($aux = mysqli_fetch_assoc($rsQueryH)){
		$habilidades[] = $aux;
	}
	
	$usuario["habilidades"] = $habilidades;
	echo json_encode($usuario);

?>