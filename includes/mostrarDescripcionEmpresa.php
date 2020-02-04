<?php
include("conexion.php");

$idempresa = $_SESSION['idempresa'];

$query = "SELECT descripcionEmpresa FROM empresa where idempresa='$idempresa'";
    
$resultado = mysqli_query($conexion, $query);

if(!$resultado)
{
    die("Conexion fallida, no se pudo traer los datos". mysqli_error($conexion));

}


while($row = mysqli_fetch_array($resultado))
{
   echo 
   "
  <form  id='formularioDescripcionEmpresa' class='card card-body' style='max-width: 540px;'>
                <div class='form-group text-center'>
    <textarea name='descripcion' id='descripcion' cols='30' rows='4' class='form-control' placeholder='Ingresa una breve descripción' >".$row['descripcionEmpresa']."</textarea>
                </div>
                <button id='btnDescripcion' class='btn btn-success' >Actualizar</button>
    </form>
   ";
}



?>

