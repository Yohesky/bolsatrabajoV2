<?php
	session_start();
	
	require_once('./conexion.php');
	$id = '';

	if(isset($_SESSION['idusuarios']) && !empty($_SESSION['idusuarios'])){
		$id = $_SESSION['idusuarios'];
	}else if(isset($_SESSION['idempresa']) && !empty($_SESSION['idempresa'])){
		$id = $_SESSION['idempresa'];
	}
	

	if(isset($_GET['obtenerFotoPerfil']) && !empty($_GET['obtenerFotoPerfil'])){

		$queryObtener = "SELECT fotoPerfil FROM usuarios WHERE idusuarios = '$id'";
		$resultadoObtener = mysqli_query($conexion, $queryObtener) or mysqli_error($conexion);

		$fila = mysqli_fetch_array($resultadoObtener);

		echo $fila['fotoPerfil'];

		
	}else if(isset($_GET['obtenerImagenEmpresa']) && !empty($_GET['obtenerImagenEmpresa'])){

		$queryObtenerImagen = "SELECT imagenEmpresa FROM empresa WHERE idempresa = '$id'";

		$resultadoObtenerImagen = mysqli_query($conexion, $queryObtenerImagen) or mysqli_error($conexion);

		$fila = mysqli_fetch_array($resultadoObtenerImagen);

		echo $fila['imagenEmpresa'];

	}else if(isset($_FILES['fotoPerfil']) && !empty($_FILES['fotoPerfil'])){
		
		$tmp_name = $_FILES['fotoPerfil']['tmp_name'];
        $name = $_FILES['fotoPerfil']['name'] = time();

        $nueva_path = "../img-perfil/" . $name;
        move_uploaded_file($tmp_name, $nueva_path);
		$src = "./img-perfil/" . $name;
		
		$querySubir = "UPDATE usuarios SET fotoPerfil = '$src' WHERE idusuarios = '$id'";

		$resultadoSubir = mysqli_query($conexion, $querySubir) or die(mysqli_error($conexion));

		if($resultadoSubir){
			echo "exito";
		}else{
			echo $resultadoSubir;
		}

	}else if(isset($_FILES['imagenEmpresa']) && !empty($_FILES['imagenEmpresa'])){

		$tmp_name = $_FILES['imagenEmpresa']['tmp_name'];
        $name = $_FILES['imagenEmpresa']['name'] = time();

        $nueva_path = "../img-empresa/" . $name;
        move_uploaded_file($tmp_name, $nueva_path);
		$src = "./img-empresa/" . $name;
	
		$querySubirEmpresa = "UPDATE empresa SET imagenEmpresa = '$src' WHERE idempresa = '$id'";

		$resultadoSubirEmpresa = mysqli_query($conexion, $querySubirEmpresa) or die(mysqli_error($conexion));

		if($resultadoSubirEmpresa){
			echo 'exito';
		}else{
			echo $resultadoSubirEmpresa;
		}
	}else{
		echo "se fue por la tangente";
	}
?>