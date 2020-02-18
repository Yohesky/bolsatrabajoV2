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
   <form id='formularioTarea' enctype='multipart/form-data' class='needs-validation' novalidate>
   <div class='form-group'>
                            <input type='text' id='nombre' name='nombre' value='".$row['nombre']."' class='form-control' placeholder='Nombre' required maxlength='45'>
    </div>

    <div class='form-group'>
                            <input type='text' id='apellido' name='apellido' value='".$row['apellido']."' placeholder='Apellido' class='form-control' required maxlength='45'>
    </div>

    <div class='form-group'>
        <input type='email' id='correo' name='correo' value='".$row['correo']."' placeholder='Correo' class='form-control' required>
    </div>

    <div class='form-group'>
                            <input type='text' id='ci' name='ci' value='".$row['ci']."' placeholder='Cedula' class='form-control' required maxlength='12'>
    </div>

    <div class='form-group'>
                            <input type='text' id='fechaNacimiento' name='fechaNacimiento' value='".$row['fechaNacimiento']."' placeholder='Fecha de nacimiento' class='form-control' required>
                            <span id='edadCalculada'> </span>
    </div>

    <div class='form-group'>
                            <input type='tlf' id='num1' name='num1' value='".$row['num1']."' placeholder='Número telefonico' class='form-control' required  maxlength='11'>
    </div>

    <div class='form-group'>
                            <input type='text' id='puestoDeseado' name='puesto' value='".$row['puestoDeseado']."' placeholder='Puesto deseado' class='form-control' maxlength='45'>
    </div>

    <div class='form-group'>
                            <input type='number' id='sueldoDeseado' name='sueldoDeseado' value='".$row['sueldoDeseado']."' placeholder='Sueldo deseado' class='form-control' step='1' min='1'>
    </div>

    <div class='form-group'>
                            <input type='text' id='pais' name='pais' value='".$row['pais']."' placeholder='Pais' class='form-control' maxlength='45'>
    </div>

    <div class='form-group'>
    <select name='estado' id='estado' class='form-control' required>
        <option value=' disabled selected>Selecciona tu estado</option>
        <option value='".$row['estado']."'>".$row['estado']."</option>
        <option value='Amazonas'>Amazonas</option>
        <option value='Anzoategui'>Anzoategui</option>
        <option value='Apure'>Apure</option>
        <option value='Aragua'>Aragua</option>
        <option value='Barinas'>Barinas</option>
        <option value='Bolivar'>Bolivar</option>
        <option value='Carabobo'>Carabobo</option>
        <option value='Cojedes'>Cojedes</option>
        <option value='Delta Amacuro'>Delta Amacuro</option>
        <option value='Distrito Capital'>Distrito Capital</option>
        <option value='Falcon'>Falcon</option>
        <option value='Guarico'>Guarico</option>
        <option value='Lara'>Lara</option>
        <option value='Merida'>Merida</option>
        <option value='Miranda'>Miranda</option>
        <option value='Monagas'>Monagas</option>
        <option value='Nueva Esparta'>Nueva Esparta</option>
        <option value='Portuguesa'>Portuguesa</option>
        <option value='Sucre'>Sucre</option>
        <option value='Tachira'>Tachira</option>
        <option value='Trujillo'>Trujillo</option>
        <option value='Vargas'>Vargas</option>
        <option value='Yaracuy'>Yaracuy</option>
        <option value='Zulia'>Zulia</option>

    </select>


    <select name='ciudad' id='ciudad' class='form-control'>

    <option value='".$row['ciudad']."'>".$row['ciudad']."</option>
    </select>


</div>

    <div class='form-group'>
                            <input type='text' id='direccion' name='direccion' value='".$row['direccion']."' placeholder='Dirección' class='form-control' required maxlength='45'>
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
            <input type='text' id='idioma' placeholder='Idioma' name='idioma' value='".$row['idioma']."' class='form-control' required maxlength='45'>
        </div>

        <div class='form-group col-md-6'>
        <span> Nivel de idioma </span>
            <input type='text' id='nivelIdioma' placeholder='Nivel de Idioma' name='nivelIdioma' value='".$row['nivelIdioma']."' class='form-control' required maxlength='45'>
        </div>

    </div>

    <div class='form-group'>
 
        <label class='form-control' for='genero'>Genero</label>
        <select class='form-control' id='genero' name='genero'>
        <option value='".$row['genero']."'>".$row['genero']."</option>
        <option value='Hombre'>Hombre</option>
        <option value='Mujer'>Mujer</option>
      
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

    <button type='submit' class='btn btn-success' id='btnDatos'>
    Actualizar
    </button>
   </form>
   ";
}



?>