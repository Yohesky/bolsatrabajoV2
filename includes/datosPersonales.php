<?php
include("conexion.php");


$idusuario = $_SESSION['idusuarios'];

$query = "SELECT * FROM usuarios where idusuarios='$idusuario'";
    
$resultado = mysqli_query($conexion, $query);

if(!$resultado)
{
    die("Conexion fallida, no se pudo traer los datos". mysqli_error($conexion));

}

$json = array();
while($row = mysqli_fetch_array($resultado))
{
   echo 
   "
   <form id='formularioTarea' enctype='multipart/form-data'>
   <div class='form-group'>
                            <input type='text' id='nombre' name='nombre' value='".$row['nombre']."' class='form-control' required>
    </div>

    <div class='form-group'>
                            <input type='text' id='apellido' name='apellido' value='".$row['apellido']."' class='form-control' required>
    </div>

    <div class='form-group'>
                            <input type='text' id='ci' name='ci' value='".$row['ci']."' class='form-control' required>
    </div>

    <div class='form-group'>
                            <input type='text' id='num1' name='num1' value='".$row['num1']."' class='form-control' required>
    </div>

    <div class='form-group'>
                            <input type='text' id='puesto' name='puesto' value='".$row['puestoDeseado']."' class='form-control' required>
    </div>

    <div class='form-group'>
                            <input type='text' id='pais' name='pais' value='".$row['pais']."' class='form-control' required>
    </div>

    <div class='form-group'>
                            <input type='text' id='ciudad' name='ciudad' value='".$row['ciudad']."' class='form-control' required>
    </div>

    <div class='form-group'>
                            <input type='text' id='direccion' name='direccion' value='".$row['direccion']."' class='form-control' required>
    </div>

    <div class='form-group'>
                            <input type='text' id='educacion' name='educacion' value='".$row['educacion']."' class='form-control' required>
    </div>

    <div class='row'>

    <div class='form-group col-md-6'>
        <input type='text' id='idioma' name='idioma' value='".$row['idioma']."' class='form-control' required>
    </div>

    <div class='form-group col-md-6'>
        <input type='text' id='nivelIdioma' name='nivelIdioma' value='".$row['nivelIdioma']."' class='form-control' required>
    </div>

    </div>

    <div class=' mb-4'>
        <input type='file' class='' name='curriculum' accept='.pdf' name='curriculum' file='.r".$row['curriculum']."'>
        <label class='' for='curriculum'>Ingresar Curriculum</label>
    </div>
    

    <button type='button' class='btn btn-success' id='btnDatos'>
    Actualizar
    </button>
   </form>
   ";
}



?>