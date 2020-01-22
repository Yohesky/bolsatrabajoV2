<?php
include("conexion.php");


$idusuario = $_SESSION['idusuarios'];

$query = "SELECT * FROM usuarios where idusuarios='$idusuario'";
    
$resultado = mysqli_query($conexion, $query);

if(!$resultado)
{
    die("Conexion fallida, no se pudo traer los datos". mysqli_error($conexion));

}


while($row = mysqli_fetch_array($resultado))
{
   echo 
   "
   <form id='formularioTarea' enctype='multipart/form-data'>
   <div class='form-group'>
                            <input type='text' id='nombre' name='nombre' value='".$row['nombre']."' class='form-control' placeholder='Nombre' required >
    </div>

    <div class='form-group'>
                            <input type='text' id='apellido' name='apellido' value='".$row['apellido']."' placeholder='Apellido' class='form-control' required>
    </div>

    <div class='form-group'>
                            <input type='text' id='ci' name='ci' value='".$row['ci']."' placeholder='Cedula' class='form-control' required>
    </div>

    <div class='form-group'>
                            <input type='date' id='fechaNacimiento' name='fechaNacimiento' value='".$row['fechaNacimiento']."' placeholder='Fecha de nacimiento' class='form-control' required>
    </div>

    <div class='form-group'>
                            <input type='text' id='num1' name='num1' value='".$row['num1']."' placeholder='Número telefonico' class='form-control' required>
    </div>

    <div class='form-group'>
                            <input type='text' id='puestoDeseado' name='puesto' value='".$row['puestoDeseado']."' placeholder='Puesto deseado' class='form-control' required>
    </div>

    <div class='form-group'>
                            <input type='text' id='sueldoDeseado' name='sueldoDeseado' value='".$row['sueldoDeseado']."' placeholder='Sueldo deseado' class='form-control' required>
    </div>

    <div class='form-group'>
                            <input type='text' id='pais' name='pais' value='".$row['pais']."' placeholder='Pais' class='form-control' required>
    </div>

    <div class='form-group'>
                            <input type='text' id='ciudad' name='ciudad' value='".$row['ciudad']."' placeholder='Ciudad' class='form-control' required>
    </div>

    <div class='form-group'>
                            <input type='text' id='direccion' name='direccion' value='".$row['direccion']."' placeholder='Dirección' class='form-control' required>
    </div>

    <div class='form-group'>
 
        <label class='form-control' for='educacion'>Nivel de Educacion</label>
        <select class='form-control' id='educacion' name='educacion'>
        <option value='".$row['educacion']."'>Bachiller</option>
        <option value='Bachiller'>Bachiller</option>
        <option value='Tecnico Medio'>Tecnico Medio</option>
        <option value='Tecnico Superior Universitario'>Tecnico Superior Universitario</option>
        <option value='Universitario'>Universitario</option>
        </select>

    </div>
                          
    </div>

    <div class='row'>
    
        <div class='form-group col-md-6'>
        <span> Ingrese su idioma </span>
            <input type='text' id='idioma' placeholder='Idioma' name='idioma' value='".$row['idioma']."' class='form-control' required>
        </div>

        <div class='form-group col-md-6'>
        <span> Nivel de idioma </span>
            <input type='text' id='nivelIdioma' placeholder='Nivel de Idioma' name='nivelIdioma' value='".$row['nivelIdioma']."' class='form-control' required>
        </div>

    </div>

    <div class='form-group'>
 
        <label class='form-control' for='genero'>Genero</label>
        <select class='form-control' id='genero' name='genero'>
        <option value='".$row['genero']."'>".$row['genero']."</option>
        <option value='Hombre'>Hombre</option>
        <option value='Nujer'>Nujer</option>
      
        </select>

    </div>

    <div class='form-group'>
 
        <label class='form-control' for='estadoCivil'>Estado Civil</label>
        <select class='form-control' id='estadoCivil' name='estadoCivil'>
        <option value='".$row['estadoCivil']."'>".$row['estadoCivil']."</option>
        <option value='Casado/a'>Casado/a</option>
        <option value='Divorciado/a'>Divorciado/a</option>
        <option value='Viudo/a'>Viudo/a</option>
        </select>

    </div>

    <div class='form-group'>
 
        <label class='form-control' for='disponibilidadViajar'>Nivel de disponibilidad Viajar</label>
        <select class='form-control' id='disponibilidadViajar' name='disponibilidadViajar'>
        <option value='".$row['disponibilidadViajar']."'>".$row['disponibilidadViajar']."</option>
        <option value='Si'>Si</option>
        <option value='No'>No</option>
        </select>

    </div>

    <div class='form-group'>
 
        <label class='form-control' for='vehiculo'> Posee vehiculo </label>
        <select class='form-control' id='vehiculo' name='vehiculo'>
        <option value='".$row['vehiculo']."'>".$row['vehiculo']."</option>
        <option value='Si'>Si</option>
        <option value='No'>No</option>
        </select>

    </div>

    <div class=' mb-4'>
        <input type='file' class='' id='archivoCurriculum' accept='.pdf' name='curriculum' file='.r".$row['curriculum']."'>
        <label class='' for='curriculum'>Ingresar Curriculum</label>
    </div>
    
    <div id='curriculum' direccion='".$row['curriculum']."'>

    </div>

    <button type='button' class='btn btn-success' id='btnDatos'>
    Actualizar
    </button>
   </form>
   ";
}



?>