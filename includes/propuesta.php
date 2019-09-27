<?php

//incluir la conexion con el servidor
include("conexion.php");
include("loginEmpresa.php");
include("categorias.php");

$idempresa = $_SESSION['idempresa'];
$idcategorias = $_SESSION['idcategorias'];

if(isset($_POST["nombre"]))
{
    
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $vacantes = $_POST["vacantes"];
    $sueldo = $_POST["sueldo"];
    $localizacion = $_POST["localizacion"];
    $funciones = $_POST['funciones'];

    //entre parentesis (nombre, descripcion) se llaman las columnas en la BD
    $query = "INSERT INTO propuesta(titulo, descripcion, vacantes, sueldo,localizacion,empresa_idempresa,categorias_idcategorias, funciones) 
    VALUES('$nombre', '$descripcion', '$vacantes', '$sueldo', '$localizacion','$idempresa','$idcategorias', '$funciones')";

    mysqli_query($conexion,$query) or die(mysqli_error($conexion).$query);

    // if(!$resultado)
    // {
    //   die("la consulta fallo");
    // }

    echo "guardada";
}

?>