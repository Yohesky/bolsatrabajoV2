<?php

//incluir la conexion con el servidor
include("conexion.php");
include("loginEmpresa.php");


$idempresa = $_SESSION['idempresa'];


if(isset($_POST["nombre"]))
{
    
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $vacantes = $_POST["vacantes"];
    $sueldo = $_POST["sueldo"];
    $localizacion = $_POST["localizacion"];
    $funciones = $_POST['funciones'];
    $categoria = $_POST['categoria'];
    $viajes = $_POST['viajes'];
    $aExp = $_POST['aExp'];
    $vehiculo = $_POST['vehiculo'];
    $educacion = $_POST['educacion'];
    $estado = mysqli_real_escape_string($conexion, $_POST['estado']);
    $ciudad = mysqli_real_escape_string($conexion, $_POST['ciudad']);




    //entre parentesis (nombre, descripcion) se llaman las columnas en la BD
    $query = "INSERT INTO propuesta(titulo, descripcion, vacantes, sueldo,localizacion,empresa_idempresa, funciones, categoria, aExp, educacion, viajes, vehiculo, estado, ciudad) 
    VALUES('$nombre', '$descripcion', '$vacantes', '$sueldo', '$localizacion','$idempresa', '$funciones', '$categoria', '$aExp', '$educacion', '$viajes', '$vehiculo', '$estado', '$ciudad' )";

    mysqli_query($conexion,$query) or die(mysqli_error($conexion).$query);

    // if(!$resultado)
    // {
    //   die("la consulta fallo");
    // }

    echo "guardada";
}

?>