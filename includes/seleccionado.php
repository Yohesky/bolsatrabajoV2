<?php
include("conexion.php");

session_start();
if(isset($_POST['id'])){

$idusuarios = $_SESSION['idusuarios'];
$idpropuesta = $_POST["id"];


$sql = "SELECT COUNT(*) as cantidad FROM seleccion WHERE idusuarios='$idusuarios' AND idpropuesta='$idpropuesta'";
$res = mysqli_query($conexion, $sql);
$data = mysqli_fetch_array($res);
if($data["cantidad"] > 0)
{
   echo "seleccionado";
}
else{
    echo "nSeleccionado";
}


}
?>
