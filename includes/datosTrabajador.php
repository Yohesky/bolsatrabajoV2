<?php
include("conexion.php");

session_start();

$idusuario = $_SESSION['idusuarios'];

if(isset($_POST["nombre"]) && isset($_POST["apellido"])&& isset($_POST["correo"]) && isset($_POST["ci"]) && isset($_POST["ciudad"])
&& isset($_POST["educacion"]) && isset($_POST["idestado"]) && isset($_POST["idpais"]))
{
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $correo = $_POST["correo"];
    $ci = $_POST["ci"];
    $num1 = $_POST["num1"];
    $puesto = $_POST["puesto"];
    $ciudad = $_POST["ciudad"];
    $direccion = $_POST["direccion"];
    $educacion = $_POST["educacion"];
    $fechaNacimiento = $_POST["fechaNacimiento"];
    $sueldoDeseado = $_POST["sueldoDeseado"];
    $educacion = $_POST["educacion"];
    $genero = $_POST["genero"];
    $disponibilidadViajar = $_POST["disponibilidadViajar"];
    $vehiculo = $_POST["vehiculo"];
    $estadoCivil = $_POST["estadoCivil"];
    $fechaActual = date('Y-m-d', time());
    $edad = (int) $fechaActual - $fechaNacimiento;
    $pais = $_POST['idpais'];
    $estado = $_POST['idestado'];
    

    if(isset($_FILES['curriculum'])){
        //guardar curricum
        $tipo = $_FILES['curriculum']['type'];
        $tmp_name = $_FILES['curriculum']['tmp_name'];
        $name = $_FILES['curriculum']['name'];

        $nueva_path = "../curriculum/" . $name;
        move_uploaded_file($tmp_name, $nueva_path);
        $src = "./curriculum/" . $name;
        
        $query = "UPDATE usuarios SET nombre='$nombre', apellido='$apellido', ci='$ci', correo='$correo', num1='$num1', puestoDeseado='$puesto', ciudad='$ciudad', direccion='$direccion', educacion='$educacion', fechaNacimiento='$fechaNacimiento', sueldoDeseado='$sueldoDeseado',
        educacion='$educacion', genero='$genero', disponibilidadViajar='$disponibilidadViajar', vehiculo='$vehiculo', estadoCivil='$estadoCivil', edad='$edad', idpais='$pais', idestado='$estado', curriculum='$src' WHERE idusuarios='$idusuario'";
    }else{
        $query = "UPDATE usuarios SET nombre='$nombre', apellido='$apellido', ci='$ci', correo='$correo', num1='$num1', puestoDeseado='$puesto', ciudad='$ciudad', direccion='$direccion', educacion='$educacion', fechaNacimiento='$fechaNacimiento', sueldoDeseado='$sueldoDeseado',
        educacion='$educacion', genero='$genero', disponibilidadViajar='$disponibilidadViajar', vehiculo='$vehiculo', estadoCivil='$estadoCivil', edad='$edad',  idpais='$pais', idestado='$estado',
        where idusuarios='$idusuario'";

        mysqli_query($conexion,$query) or die(mysqli_error($conexion).$query);
        echo 'exito';
    }
    
    
    mysqli_query($conexion,$query) or die(mysqli_error($conexion).$query);

}
else
{
    echo "error";
}

?>