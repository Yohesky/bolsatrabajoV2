<?php
include("conexion.php");

session_start();

$idusuario = $_SESSION['idusuarios'];

if(isset($_POST["nombre"]) && isset($_POST["apellido"]) && isset($_POST["ci"]) && isset($_POST["num1"])
&& isset($_POST["puesto"]) && isset($_POST["pais"]) && isset($_POST["ciudad"]) && isset($_POST["direccion"])
&& isset($_POST["educacion"]) && isset($_POST["idioma"]) && isset($_POST["nivelIdioma"]))
{
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $ci = $_POST["ci"];
    $num1 = $_POST["num1"];
    $puesto = $_POST["puesto"];
    $pais = $_POST["pais"];
    $ciudad = $_POST["ciudad"];
    $direccion = $_POST["direccion"];
    $educacion = $_POST["educacion"];
    $idioma = $_POST["idioma"];
    $nivelIdioma = $_POST["nivelIdioma"];
    $fechaNacimiento = $_POST["fechaNacimiento"];
    $sueldoDeseado = $_POST["sueldoDeseado"];
    $educacion = $_POST["educacion"];
    $genero = $_POST["genero"];
    $disponibilidadViajar = $_POST["disponibilidadViajar"];
    $vehiculo = $_POST["vehiculo"];
    $estadoCivil = $_POST["estadoCivil"];
    $fechaActual = date('Y-m-d');
    $edad = $fechaActual - $fechaNacimiento;
    



    if(isset($_FILES['curriculum'])){
        //guardar curricum
        $tipo = $_FILES['curriculum']['type'];
        $tmp_name = $_FILES['curriculum']['tmp_name'];
        $name = $_FILES['curriculum']['name'];

        $nueva_path = "../curriculum/" . $name;
        move_uploaded_file($tmp_name, $nueva_path);
        $src = "./curriculum/" . $name;
        
        $query = "UPDATE usuarios SET nombre='$nombre', apellido='$apellido', ci='$ci', num1='$num1', puestoDeseado='$puesto',
        pais='$pais', ciudad='$ciudad', direccion='$direccion', educacion='$educacion', 
        idioma='$idioma', nivelIdioma='$nivelIdioma', curriculum='$src' where idusuarios='$idusuario'";
    }else{
        $query = "UPDATE usuarios SET nombre='$nombre', apellido='$apellido', ci='$ci', num1='$num1', puestoDeseado='$puesto',
        pais='$pais', ciudad='$ciudad', direccion='$direccion', educacion='$educacion', 
        idioma='$idioma', nivelIdioma='$nivelIdioma', fechaNacimiento='$fechaNacimiento', sueldoDeseado='$sueldoDeseado',
        educacion='$educacion', genero='$genero', disponibilidadViajar='$disponibilidadViajar', vehiculo='$vehiculo', estadoCivil='$estadoCivil',
        edad='$edad'
        where idusuarios='$idusuario'";
    }
    
    
    mysqli_query($conexion,$query) or die(mysqli_error($conexion).$query);

    echo "exito";
}
else
{
    echo "error no se insertaron los datos";
}

?>