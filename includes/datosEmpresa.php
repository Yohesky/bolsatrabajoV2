<?php
include("conexion.php");


$idempresa = $_SESSION['idempresa'];

$query = "SELECT * FROM empresa where idempresa='$idempresa'";
    
$resultado = mysqli_query($conexion, $query);

if(!$resultado)
{
    die("Conexion fallida, no se pudo traer los datos". mysqli_error($conexion));

}


while($row = mysqli_fetch_array($resultado))
{
   echo 
   "
   <form id='formularioActualizacion'>
   <div class='form-group'>
                            <input type='text' id='nombreEmpresa' name='nombreEmpresa' value='".$row['nombreEmpresa']."' class='form-control' required>
    </div>

    <div class='form-group'>
    <input type='text' id='descripcionEmpresa' name='descripcionEmpresa' value='".$row['descripcionEmpresa']."' class='form-control' required>
    </div>

    <div class='form-group'>
                            <input type='text' id='rif' name='rif' value='".$row['rif']."' class='form-control' required>
    </div>

    <div class='form-group'>
                            <input type='text' id='direccionEmpresa' name='direccionEmpresa' value='".$row['direccionEmpresa']."' class='form-control' required>
    </div>

    <div class='form-group'>
                            <input type='text' id='areaEmpresa' name='areaEmpresa' value='".$row['areaEmpresa']."' class='form-control' required>
    </div>

    <div class='form-group'>
                            <input type='text' id='correoEmpresa' name='correoEmpresa' value='".$row['correoEmpresa']."' class='form-control' required>
    </div>

    <div class='form-group'>
                            <input type='text' id='webEmpresa' name='webEmpresa' value='".$row['webEmpresa']."' class='form-control' required>
    </div>
    

    <button type='button' class='btn btn-success' id='btnDatos'>
    Actualizar
    </button>
   </form>
   ";
}



?>