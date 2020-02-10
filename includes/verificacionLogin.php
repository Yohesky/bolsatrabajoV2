<?php 

session_start();
if(isset($_SESSION["correo"])){
    header('location: panelControl.php');
}

?>