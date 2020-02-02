<?php

session_start();
include("conexion.php");

if(isset($_POST['correo']) && isset($_POST['contrasena']))
{
      $correo = mysqli_real_escape_string($conexion, $_POST['correo']);
      $contrasena = mysqli_real_escape_string($conexion, $_POST['contrasena']);

      $sql = "SELECT correo, nombre, idusuarios, esAdmin FROM usuarios WHERE correo='$correo' AND contrasena='$contrasena'";
      $resultado = mysqli_query($conexion,$sql);
      //obtenemos el numero de filas de la variable resultado, es decir el numero de filas que obtuvo la consulta
      $num_filas = mysqli_num_rows($resultado);
      if($num_filas == "1")
      {  
         //almacena el resultado de la consulta en forma de array
         $data = mysqli_fetch_array($resultado);
         $_SESSION['correo'] = $data['correo'];
         $_SESSION['nombre'] = $data['nombre'];
         $_SESSION['idusuarios'] = $data['idusuarios'];
         $_SESSION['esAdmin'] = $data['esAdmin'];
         
         echo '1';
      }
      else
      {
         echo "Error";
      }
 }
 else
 {
     echo 'Error';
 }



 ?>


