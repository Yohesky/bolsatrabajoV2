<?php

session_start();
include("conexion.php");


if(isset($_POST['correo']) && isset($_POST['contrasena']))
{
      $correo = mysqli_real_escape_string($conexion, $_POST['correo']);
      
      $contrasena = mysqli_real_escape_string($conexion, $_POST['contrasena']);
      

      $sql = "SELECT correoEmpresa, nombreEmpresa, idempresa, contrasenaEmpresa FROM empresa WHERE correoEmpresa='$correo'";
      $resultado = mysqli_query($conexion,$sql) or die(mysqli_error($conexion));
      //obtenemos el numero de filas de la variable resultado, es decir el numero de filas que obtuvo la consulta

      $num_filas = mysqli_num_rows($resultado);
      if($num_filas == "1")
      {  
         session_unset();
         //almacena el resultado de la consulta en forma de array
         $data = mysqli_fetch_array($resultado);
         if(password_verify($contrasena, $data['contrasenaEmpresa'])){
            $_SESSION['correoEmpresa'] = $data['correoEmpresa'];
            $_SESSION['nombreEmpresa'] = $data['nombreEmpresa'];
            $_SESSION['idempresa'] = $data['idempresa'];
            echo '1';
         }else{
            echo "Error 1";
         }
         
      }
      else
      {
         echo "Error 2";
      }
 }




 ?>


