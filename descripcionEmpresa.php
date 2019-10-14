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
        <h1>'".$row['descripcionEmpresa']."'</h1>
    ";
}




?>

<?php include("includes/footer.php"); ?>


