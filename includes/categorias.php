<?php 
include("conexion.php");
session_start();

$sql = "SELECT * FROM categorias";

$resultado = mysqli_query($conexion,$sql);

while($row = mysqli_fetch_array($resultado))
{
    echo "<option value='".$row['idcategorias']."'>".$row['nombreCategoria']."</option>";
    $_SESSION['idcategorias'] = $row['idcategorias'];
}


?>

