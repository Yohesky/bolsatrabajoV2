<?php 
session_start();
if(isset($_SESSION["idusuarios"])){
	include("includes/headerTrabajador.php");
}else{
	include("includes/headerEmpresa.php");
}
?>

<main class="container" >
	<div id="infoEmpresa" style="max-width: 760px;" class="mx-auto shadow-lg">

	</div>
</main>

<?php include("includes/footer.php") ?>
<script src="js/perfilE.js"></script>