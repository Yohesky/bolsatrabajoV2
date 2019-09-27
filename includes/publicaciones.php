<?php

//incluir la conexion con el servidor
include("conexion.php");


$query = "SELECT * FROM propuesta";
$resultado = mysqli_query($conexion, $query);





?>