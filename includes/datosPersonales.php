<?php
include("conexion.php");


$idusuario = $_SESSION['idusuarios'];

$query = "SELECT * FROM usuarios JOIN pais ON usuarios.idpais = pais.id JOIN estado ON usuarios.idestado = estado.idestado WHERE idusuarios='$idusuario'";
    
$resultado = mysqli_query($conexion, $query);

if(!$resultado)
{
    die("Conexion fallida, no se pudo traer los datos". mysqli_error($conexion));

}

$queryPais = "SELECT * FROM pais";
$resultadoPais = mysqli_query($conexion, $queryPais) or die(mysqli_error($conexion));




while($row = mysqli_fetch_array($resultado))
{
   echo 
   "
   <h2>Datos Personales</h2>
   <form id='formularioTarea' enctype='multipart/form-data' class='needs-validation' novalidate>
   <div class='form-group'>
        <input type='text' id='nombre' name='nombre' value='".$row['nombre']."' class='form-control' placeholder='Nombre' required maxlength='45'>
                            
    </div>

    <div class='form-group'>
    <label>Apellido</label>
                            <input type='text' id='apellido' name='apellido' value='".$row['apellido']."' placeholder='Apellido' class='form-control' required maxlength='45'>
    </div>

    <div class='form-group'>
    <label>Correo Electronico</label>
        <input type='email' id='correo' name='correo' value='".$row['correo']."' placeholder='Correo' class='form-control' required>
    </div>

    <div class='form-group'>
                            <input type='text' id='ci' name='ci' value='".$row['ci']."' placeholder='Cedula' class='form-control' required maxlength='12'>
    </div>

    <div class='form-group'>
                            <input type='text' id='fechaNacimiento' name='fechaNacimiento' value='".$row['fechaNacimiento']."' placeholder='Fecha de nacimiento' class='form-control'>
                            <span id='edadCalculada'> </span>
    </div>

    <div class='form-group'>
                            <input type='tlf' id='num1' name='num1' value='".$row['num1']."' placeholder='Número telefonico' class='form-control' maxlength='11'>
    </div>

    <div class='form-group'>
                            <input type='text' id='puestoDeseado' name='puesto' value='".$row['puestoDeseado']."' placeholder='Puesto deseado' class='form-control' maxlength='45'>
    </div>

    <div class='form-group'>
                            <input type='number' id='sueldoDeseado' name='sueldoDeseado' value='".$row['sueldoDeseado']."' placeholder='Sueldo deseado' class='form-control' step='1' min='1'>
    </div>
    ";

    echo " 
    
    <div class='form-group'>
                            <input type='text' id='direccion' name='direccion' value='".$row['direccion']."' placeholder='Dirección' class='form-control' maxlength='45' required='false'>
    </div>

    <div class='form-group'>
 
        <label class='form-control' for='educacion'>Nivel de Educacion</label>
        <select class='form-control' id='educacion' name='educacion'>
        <option value='".$row['educacion']."'>".$row['educacion']."</option>
        <option value='Bachiller'>Bachiller</option>
        <option value='Tecnico Medio'>Tecnico Medio</option>
        <option value='Tecnico Superior Universitario'>Tecnico Superior Universitario</option>
        <option value='Universitario'>Universitario</option>
        </select>

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
    
    <div id='curriculum' direccion='".$row['curriculum']."' idusuarios='".$_SESSION['idusuarios']."'>

    </div>

    <button type='submit' class='btn btn-success' id='btnDatos'>
    Actualizar
    </button>
   </form>
   ";
}



?>