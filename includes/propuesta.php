<?php

//incluir la conexion con el servidor
include("conexion.php");
include("loginEmpresa.php");
session_start();


$idempresa = $_SESSION['idempresa'];


if(isset($_POST["nombre"]))
{
    
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $vacantes = $_POST["vacantes"];
    $sueldo = $_POST["sueldo"];
    $funciones = $_POST['funciones'];
    $categoria = $_POST['categoria'];
    $viajes = $_POST['viajes'];
    $aExp = $_POST['aExp'];
    $vehiculo = $_POST['vehiculo'];
    $educacion = $_POST['educacion'];
    $pais = mysqli_real_escape_string($conexion, $_POST['pais']);
    $estado = mysqli_real_escape_string($conexion, $_POST['estado']);

    
    //entre parentesis (nombre, descripcion) se llaman las columnas en la BD
    $query = "INSERT INTO propuesta(titulo, descripcion, vacantes, sueldo,empresa_idempresa, funciones, categoria, aExp, educacion, viajes, vehiculo, idpais, idestado) 
    VALUES('$nombre', '$descripcion', '$vacantes', '$sueldo','$idempresa', '$funciones', '$categoria', '$aExp', '$educacion', '$viajes', '$vehiculo', '$pais', '$estado' )";

    mysqli_query($conexion,$query) or die(mysqli_error($conexion).$query);

    // if(!$resultado)
    // {
    //   die("la consulta fallo");
    // }

    echo "guardada";
}

?>