<?php
include("conexion.php");

session_start();
if(!isset($_GET['eliminar'])){

$idempresa = $_SESSION['idempresa'];
$idusuario = $_POST["id"];
$idpropuesta = $_POST["idpropuesta"];

// $query = "INSERT INTO notificaciones (idempresa, idusuario, idpropuesta) VALUES ('$idempresa', '$idusuario', '$idpropuesta') ";
// mysqli_query($conexion,$query) or die(mysqli_error($conexion).$query);

// if(!$query)
//      {
//      die("la consulta fallo");
//     }
    

//     echo "exito";

$sql = "SELECT COUNT(*) as cantidad FROM notificaciones WHERE idempresa='$idempresa' AND idusuario='$idusuario' AND idpropuesta='$idpropuesta'";
$res = mysqli_query($conexion,$sql) or die(mysqli_error($conexion).$sql);
$data = mysqli_fetch_array($res);
if($data["cantidad"] > 0)
{
   echo "no insertado";
}
else if($data["cantidad"] <= 0){
     $query = "INSERT INTO notificaciones (idempresa, idusuario, idpropuesta) VALUES ('$idempresa', '$idusuario', '$idpropuesta') ";
     mysqli_query($conexion,$query) or die(mysqli_error($conexion).$query);
     echo "insertado";
}

}else{
   $idNotificacion = $_GET["idNotificacion"];
   $query = "UPDATE notificaciones SET vista = 1 WHERE idNotificacion = '$idNotificacion'";
   $res = mysqli_query($conexion, $query);
   if($res)
   {
      echo "ok";
   }else{
      echo "error";
   }

}
?>
