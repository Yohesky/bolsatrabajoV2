<?php
include("conexion.php");

session_start();

$idusuario = $_SESSION['idusuarios'];


 if(isset($_POST["estado"]) && isset($_POST["pais"]))
 {

     $pais = $_POST['pais'];
     $estado = $_POST['estado'];
   

      $query = "UPDATE usuarios SET idpais='$pais', idestado='$estado' WHERE idusuarios='$idusuario'";
                  mysqli_query($conexion,$query) or die(mysqli_error($conexion).$query);

                  echo 'exito';

 }
 else
 {
     echo "error no se inserto";
 }

?>