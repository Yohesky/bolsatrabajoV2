<?php
include("conexion.php");

session_start();

$idempresa = $_SESSION['idempresa'];


 if(isset($_POST["estado"]) && isset($_POST["pais"]))
 {

     $pais = $_POST['pais'];
     $estado = $_POST['estado'];
    

      $query = "UPDATE empresa SET idpais='$pais', idestado='$estado' WHERE idempresa='$idempresa'";
                  mysqli_query($conexion,$query) or die(mysqli_error($conexion).$query);

                  echo 'exito';

 }
 else
 {
     echo "error no se inserto";
 }

?>