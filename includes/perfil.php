<?php
	require_once('conexion.php');
	$id = $_GET["id"];

	$queryUsuario = "SELECT * FROM usuarios WHERE idusuarios = '$id'";
	$rsQuery = mysqli_query($conexion, $queryUsuario);
	$fila = mysqli_fetch_assoc($rsQuery);
	echo json_encode($fila);

?>