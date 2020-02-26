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
   <form id='formularioActualizacion' class='needs-validation' novalidate  >
   <div class='form-group'>
                            <input type='text' id='nombreEmpresa' name='nombreEmpresa' value='".$row['nombreEmpresa']."' class='form-control' required maxlength='50' placeholder='Nombre de la empresa'>
    </div>

    <div class='form-group'>
                            <input type='text' id='rif' name='rif' value='".$row['rif']."' class='form-control' required maxlength='12' placeholder='Rif de la empresa'>
    </div>

    <div class='form-group'>
                            <input type='text' id='direccionEmpresa' name='direccionEmpresa' value='".$row['direccionEmpresa']."' class='form-control' required maxlenth='100' placeholder='Dirección de la empresa'>
    </div>


    <div class='form-group'>
                    <select id='areaEmpresa' name='areaEmpresa' class='form-control' required>
                    <option value='".$row['areaEmpresa']."' >".$row['areaEmpresa']."</option>
                        <option value='Administración/Oficinas'>Administración/Oficinas</option>
                        <option value='Almacén/Logística/Trasporte'>Almacén/Logística/Trasporte</option>
                        <option value='Atención al Cliente'>Atención al Cliente</option>
                        <option value='Servicios generales, aseo y seguridad'>Servicios generales, aseo y seguridad</option>
                        <option value='CallCenter/Telemercadeo'>CallCenter/Telemercadeo</option>
                        <option value='Producción/Operarios'>Producción/Operarios</option>
                        <option value='Manufactura'>Manufactura</option>
                        <option value='Medicina/Saldud'>Medicina/Saldud</option>
                        <option value='Comunicación'>Comunicación</option>
                        <option value='Construcción y Obras'>Construcción y Obras</option>
                        <option value='Contabilidad/Finanzas'>Contabilidad/Finanzas</option>
                        <option value='Mercadotecnía/Publicidad'>Mercadotecnía/Publicidad</option>
                        <option value='Diseño/Artes Gráficas'>Diseño/Artes Gráficas</option>
                        <option value='Docencia'>Docencia</option>
                        <option value='Compras/Comercio Exterior'>Compras/Comercio Exterior</option>
                        <option value='Dirección/Gerencía'>Dirección/Gerencía</option>
                        <option value='Técnicas'>Técnicas</option>
                        <option value='Investigación y Calidad'>Investigación y Calidad</option>
                        <option value='Hostelería/Turismo'>Hostelería/Turismo</option>
                        <option value='Informatica/Telecomunicaciones'>Informática/Telecomunicaciones</option>
                        <option value='Ingeniería'>Ingeniería</option>
                        <option value='Legal/Asesorias'>Legal/Asesorias</option>
                        <option value='Mantenimiento y Reparaciones'>Mantenimiento y Reparaciones</option>
                        <option value='Recursos Humanos'>Recursos Humanos</option>
                        <option value='Ventas'>Ventas</option>
                    </select>
                </div>

    <div class='form-group'>
                            <input type='email' id='correoEmpresa' name='correoEmpresa' value='".$row['correoEmpresa']."' class='form-control' required maxlength='45'>
    </div>

    <div class='form-group'>
                        <select name='estado' id='estado' class='form-control'>
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
                    </div>

                    <div class='form-group'>

                        <select name='ciudad' id='ciudad' class='form-control'>

                        <option value='".$row['ciudad']."'>".$row['ciudad']."</option>
                        </select>


                    </div>

    <div class='form-group'>
                            <input type='text' id='webEmpresa' name='webEmpresa' value='".$row['webEmpresa']."' class='form-control' placeholder='web de la empresa'>
    </div>
    

    <button type='submit' class='btn btn-success' id='btnDatos'>
    Actualizar
    </button>
   </form>
   ";
}



?>