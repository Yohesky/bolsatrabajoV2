<?php

$conexion = mysqli_connect
(
    "localhost",
    "root",
    "",
    "bolsatrabajo2"
);
$acentos = mysqli_query($conexion, "SET NAMES 'utf8'");

?>
