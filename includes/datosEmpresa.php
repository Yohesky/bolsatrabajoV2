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
                        <select name='estado' id='estado' class='form-control'>
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
                            <input type='text' id='webEmpresa' name='webEmpresa' value='".$row['webEmpresa']."' class='form-control' required>
    </div>
    

    <button type='button' class='btn btn-success' id='btnDatos'>
    Actualizar
    </button>
   </form>
   ";
}



?>