<?php session_start();
if(isset($_SESSION["idusuarios"])){
	include("includes/headerTrabajador.php");
}else{
	include("includes/headerEmpresa.php");
}?>

<main class="container" >
	<div id="infoTrabajador" style="max-width: 760px;" class="mx-auto shadow-lg">

	</div>
</main>

<?php include("includes/footer.php") ?>
<script src="js/perfil.js"></script>
<script src="js/notificaciones.js"></script>