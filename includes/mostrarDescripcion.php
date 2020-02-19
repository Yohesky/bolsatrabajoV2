<?php
include("conexion.php");

$idusuario = $_SESSION['idusuarios'];

$query = "SELECT descripcion FROM usuarios where idusuarios='$idusuario'";
    
$resultado = mysqli_query($conexion, $query);

if(!$resultado)
{
    die("Conexion fallida, no se pudo traer los datos". mysqli_error($conexion));

}


while($row = mysqli_fetch_array($resultado))
{
   echo 
   "
   
  <form  id='formularioDescripcion' class='card card-body' style='max-width: 540px;' novalidate><h2>Descripción</h2>
                <div class='form-group text-center'>
    <textarea name='descripcion' id='descripcion' cols='30' rows='4' class='form-control' placeholder='Ingresa una breve descripción' maxlength='100'>".$row['descripcion']."</textarea>
                </div>
    <button id='btnDescripcion' type='submit' class='btn btn-success' >Actualizar</button>
    </form>
   ";
}



?>

