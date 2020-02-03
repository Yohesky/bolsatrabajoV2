
<?php
	session_start();
	if(isset($_SESSION['esAdmin']) && !empty($_SESSION['esAdmin']) && $_SESSION['esAdmin'] == 1){

		include_once('panelAdmin.php');
	}else if(isset($_SESSION["idusuarios"]) && !empty($_SESSION["idusuarios"])){

		include_once("panelTrabajador.php");
	}else if(isset($_SESSION["idusuarios"]) && !empty($_SESSION["idusuarios"])){

		include_once("panelEmpresa.php");
	}else{
		
		echo "necesita permisos especiales";
	}
?>
