<?php include("includes/headerTrabajador.php") ?>

<?php 

session_start();
$idpropuesta = $_GET['idpropuesta'];
$idusuario = $_SESSION['idusuarios'];


?>


<h1> <?php echo $idusuario;  ?> </h1>

<?php include("includes/footer.php") ?>