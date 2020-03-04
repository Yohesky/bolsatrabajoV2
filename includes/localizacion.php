<?php 
 include("includes/conexion.php");

$query = "SELECT * FROM estado";
$resultado = mysqli_query($conexion, $query) or die(mysqli_error($conexion));

while ($row = mysqli_fetch_array($resultado)) {
 echo "<option name='pais' value='".$row['paisnombre']."'>".$row['paisnombre']."</option>";
}

?>