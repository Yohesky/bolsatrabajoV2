<?php include("conexion.php") ?>
<?php

session_start();
if(isset($_SESSION['correoEmpresa'])){
    header('location: perfilEmpresa.php');
}


?>