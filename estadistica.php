<?php include("includes/headerTrabajador.php") ?>

<?php 

session_start();

$idpropuesta = $_GET['idpropuesta'];
$idusuario = $_SESSION['idusuarios'];

?>


<h1 id="estadisticas" idpropuesta="<?php echo $idpropuesta ?>" idusuario="<?php echo $idusuario ?>"></h1>

<script src="./js/estadistica.js"></script>
<?php include("includes/footer.php") ?>