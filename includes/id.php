<?php
include("conexion.php");

$query = "SELECT correo FROM usuarios";
$resultado = mysqli_query($conexion, $query);

$data = mysqli_fetch_array($resultado);
$_SESSION['correo'] = $data['correo'];


?>