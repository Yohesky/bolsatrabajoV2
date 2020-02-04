
<?php
	session_start();
	if(isset($_SESSION['esAdmin']) && !empty($_SESSION['esAdmin'])){
		if($_SESSION['esAdmin'] == 1){
			include_once('panelAdmin.php');
		}else{
			header('location: perfilTrabajador.php');
		}
		
	}else if(isset($_SESSION["idempresa"]) && !empty($_SESSION["idempresa"])){

		include_once("panelEmpresa.php");
	}else{
		echo "necesita iniciar session";
	}
?>
