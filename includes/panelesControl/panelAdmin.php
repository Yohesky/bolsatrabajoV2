<?php
	

	function inicio(){
		
		include_once("../conexion.php");

		$datos = [
			"empresas" => empresas($conexion),
			"trabajadores" => usuarios($conexion),
			"ofertas" => trabajos($conexion),
			"educacion" => nivelEducacion($conexion)
		];
		echo json_encode($datos);
	}	

	inicio();

	function postulaciones($conexion){
                          
		session_start();
		$idusuario = '';
		
		$query = "SELECT * FROM usuarios_has_propuesta WHERE usuarios_idusuarios='$idusuario' ";
		$rsQuery = mysqli_query($conexion, $query) or die(mysqli_error($conexion));
		$numregistros = mysqli_num_rows($rsQuery);
		return $numregistros;
	}

	function empresas($conexion){
		$query = "SELECT * FROM empresa";
		$rsQuery = mysqli_query($conexion, $query) or die(mysqli_error($conexion));
		$numregistros = mysqli_num_rows($rsQuery);
		return $numregistros;
	}

	function trabajos($conexion){
		$query = "SELECT * FROM propuesta";
		$rsQuery = mysqli_query($conexion, $query) or die(mysqli_error($conexion));
		$numregistros = mysqli_num_rows($rsQuery);
		return $numregistros;
	}

	function usuarios($conexion){
		$query = "SELECT * FROM usuarios";
		$rsQuery = mysqli_query($conexion, $query) or die(mysqli_error($conexion));
		$numregistros = mysqli_num_rows($rsQuery);
		return $numregistros;
	}

	function nivelEducacion($conexion){
		$querys = array("bachiller" => "SELECT COUNT(*) from usuarios where educacion = 'Bachiller'",
		"tecnicoMedio" => "SELECT COUNT(*) from usuarios where educacion = 'Tecnico Medio'",
		"TSU" => "SELECT COUNT(*) from usuarios where educacion = 'Tecnico Superior Universitario'",
		"universitario" => "SELECT COUNT(*) from usuarios where educacion = 'Universitario'");

		$datos = array();
		foreach ($querys as $key => $value) {
			$rsQuery = mysqli_query($conexion, $value) or die(mysqli_error($conexion));
			$datos[$key] = mysqli_fetch_array($rsQuery)[0]; 
		}
		
		return $datos;
	}

	
?>