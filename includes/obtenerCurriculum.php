<?php
require_once('conexion.php');
	$idusuarios = $_GET["idusuarios"];

$query = "SELECT curriculum FROM usuarios where idusuarios='$idusuarios'";
    
$resultado = mysqli_query($conexion, $query) or die(mysqli_error($conexion));

if(!$resultado)
{
    die("Conexion fallida, no se pudo traer los datos". mysqli_error($conexion));

}

while($row = mysqli_fetch_array($resultado)){
	echo $row["curriculum"];
}
?>