<?php

$conexion = mysqli_connect
(
    "localhost",
    "root",
    "",
    "bolsatrabajo"
);
$acentos = mysqli_query($conexion, "SET NAMES 'utf8'");

?>
