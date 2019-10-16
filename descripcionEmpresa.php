<?php include("includes/headerTrabajador.php"); ?>

<?php
include('includes/conexion.php');
			

$idempresa = $_GET['idempresa'];

$query = "SELECT * FROM empresa where idempresa='$idempresa'";
 
$resultado = mysqli_query($conexion, $query);

if(!$resultado)
{
    die("Conexion fallida, no se pudo traer los datos". mysqli_error($conexion));
}

while($row = mysqli_fetch_array($resultado))
{
    echo
    "
    <div class='card text-center mt-5'>
    <div class='card-header'>
    <h3> ".$row['nombreEmpresa']." </h3>
    </div>
    <div class='card-body'>
      <h5 class='card-title'> ".$row['descripcionEmpresa']." </h5>
      <p class='card-text'> ".$row['rif']." </p>
      <p class='card-text'> ".$row['direccionEmpresa']." </p>
      <p class='card-text'> ".$row['areaEmpresa']." </p>
      <p class='card-text'> ".$row['correoEmpresa']." </p>
      <p class='card-text'> ".$row['webEmpresa']." </p>
    </div>
    ";
}




?>

<?php include("includes/footer.php"); ?>


