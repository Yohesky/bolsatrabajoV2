<?php

session_start();
if (!isset($_SESSION['correoEmpresa'])) {
    header('location: loginEmpresa.php');
}

?>