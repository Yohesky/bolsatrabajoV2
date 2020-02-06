<?php
	require_once('conexion.php');
	$id = $_GET["id"];

	$queryUsuario = "SELECT * FROM usuarios  WHERE idusuarios = '$id'";
	$rsQuery = mysqli_query($conexion, $queryUsuario) or die(mysqli_error($conexion));
	$usuario = mysqli_fetch_assoc($rsQuery);

	$queryHabilidades = "SELECT nombreHabilidad, nivelHabilidad FROM habilidades  WHERE idusuario = '$id'";
	$rsQueryH = mysqli_query($conexion, $queryHabilidades) or die(mysqli_error($conexion));
	
	$queryExperiencias = "SELECT expLabor, yearExp, expEmpresa, expArea FROM experiencia  WHERE usuarios_idusuarios = '$id'";
	$rsQueryE = mysqli_query($conexion, $queryExperiencias) or die(mysqli_error($conexion));

	$habilidades = array();
	while($aux = mysqli_fetch_assoc($rsQueryH)){
		$habilidades[] = $aux;
	}

	$experiencias = array();
	while($aux = mysqli_fetch_assoc($rsQueryE)){
		$experiencias[] = $aux;
	}
	
	$usuario["habilidades"] = $habilidades;
	$usuario["experiencias"] = $experiencias;
	echo json_encode($usuario);

?>