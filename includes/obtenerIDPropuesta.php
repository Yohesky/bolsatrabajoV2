<?php

session_start();
include("conexion.php");



      $sql = "SELECT idpropuesta FROM propuesta";
      $resultado = mysqli_query($conexion,$sql);
      //obtenemos el numero de filas de la variable resultado, es decir el numero de filas que obtuvo la consulta
      $num_filas = mysqli_num_rows($resultado);
      if($num_filas >= "1")
      {  
         //almacena el resultado de la consulta en forma de array
         $data = mysqli_fetch_array($resultado);
         $_SESSION['idpropuesta'] = $data['idpropuesta'];
    
      }
      else
      {
         echo "Error";
      }




 ?>


