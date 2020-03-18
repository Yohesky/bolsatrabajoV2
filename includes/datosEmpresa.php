<?php
include("conexion.php");


$idempresa = $_SESSION['idempresa'];

$query = "SELECT * FROM empresa where idempresa='$idempresa'";
    
$resultado = mysqli_query($conexion, $query);

if(!$resultado)
{
    die("Conexion fallida, no se pudo traer los datos". mysqli_error($conexion));

}

class Cedula{
    public $nacion;
    public $ci;
    private $opc = ['J', 'P', 'G'];

    function __construct(string $cedulaCompleta){
        $this->nacion = substr($cedulaCompleta, 0, 1);
        $this->ci = substr($cedulaCompleta, 2);
    }

    public function opciones(): string{
        $aux = array();
        foreach ($this->opc as $key => $value) {
            if($value == $this->nacion){
                $aux[] = "<option value='" . $value ."' selected='selected'>". $value ."</option>";
            }else{
                $aux[] = "<option value='" . $value ."'>". $value ."</option>";
            }
        }
        return join("", $aux);
    }
}


while($row = mysqli_fetch_array($resultado))
{
    $rif = new Cedula($row["rif"]);
   echo 
   "
   <form id='formularioActualizacion' class='needs-validation' novalidate  >
   <div class='form-group'>
                            <input type='text' id='nombreEmpresa' name='nombreEmpresa' value='".$row['nombreEmpresa']."' class='form-control' required maxlength='50' placeholder='Nombre de la empresa'>
    </div>

    <div class='form-group d-flex row mx-0'>
    <select name='nacion' id='nacion' class='form-control col-2'>".
        $rif->opciones()
    ."</select>
    <div class='d-bloc col-10'>
        <input type='text' name='rif' id='rif' placeholder='Rif de la empresa' class='form-control' maxlength='10' value='". $rif->ci ."'>  
    </div>
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
                            <input type='text' id='webEmpresa' name='webEmpresa' value='".$row['webEmpresa']."' class='form-control' placeholder='web de la empresa'>
    </div>
    

    <button type='submit' class='btn btn-success' id='btnDatos'>
    Actualizar
    </button>
   </form>
   ";
}



?>