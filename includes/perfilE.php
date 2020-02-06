<?php
	require_once('conexion.php');
	$id = $_GET["idempresa"];

	$queryEmpresa = "SELECT * FROM empresa  WHERE idempresa = '$id'";
	$rsQuery = mysqli_query($conexion, $queryEmpresa) or die(mysqli_error($conexion));
	$empresa = mysqli_fetch_assoc($rsQuery);

	echo json_encode($empresa);

?>