<?php
	session_start();
	$idusuarios = $_SESSION['idusuarios'];
	require_once('./conexion.php');

	if(isset($_GET['obtenerFotoPerfil']) && !empty($_GET['obtenerFotoPerfil'])){
		
		$queryObtener = "SELECT fotoPerfil FROM usuarios WHERE idusuarios = $idusuarios";
		$resultadoObtener = mysqli_query($conexion, $queryObtener) or mysqli_error($conexion);

		$fila = mysqli_fetch_array($resultadoObtener);

		echo $fila['fotoPerfil'];

		
	}else if(isset($_FILES['fotoPerfil']) && !empty(isset($_FILES['fotoPerfil']))){

		$tmp_name = $_FILES['fotoPerfil']['tmp_name'];
        $name = $_FILES['fotoPerfil']['name'];

        $nueva_path = "../img-perfil/" . $name;
        move_uploaded_file($tmp_name, $nueva_path);
		$src = "./img-perfil/" . $name;
		
		$querySubir = "UPDATE usuarios SET fotoPerfil = '$src' WHERE idusuarios = $idusuarios";

		$resultadoSubir = mysqli_query($conexion, $querySubir) or die(mysqli_error($conexion));

		if($resultadoSubir){
			echo 'exito';
		}else{
			echo $resultadoSubir;
		}

	}else{
		echo "se fue por la tangente";
	}
?>