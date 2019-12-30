<?php

//incluir la conexion con el servidor
require_once("conexion.php");

//Por Hacer: cambiar convertirConsultaJSON por convertirConsultaArray
// convirte los resultados de una consulta mysqli a un array
function convertirConsultaJSON($resultado): array{

    $json = array();
    while($row = mysqli_fetch_array($resultado)){

        $json[] = array 
        (
            "titulo" =>  $row ["titulo"],
            "descripcion" =>  $row ["descripcion"],
            "vacantes" => $row ["vacantes"],
            "sueldo" => $row ["sueldo"],
            "localizacion" => $row ["localizacion"],
            "publicacion" => $row ["publicacion"],
            "id" =>  $row ["idpropuesta"],
            "idempresa" => $row["idempresa"]
        );

    }

    return $json;
}

//Genera te genera tus consultas con paginacion
class GeneradorConsultaConPaginacion{

    private $pagina = 0;
    private $postulacionesPorPagina = 0;
    private $conexion;
    private $consultaSQL = "";
    private $limites = "";

    public function __construct($postulacionePorPagina = 5, $conexion, $consultaSQL = "SELECT * FROM propuesta  JOIN empresa ON propuesta.empresa_idempresa = empresa.idempresa"){

        $this->postulacionesPorPagina = $postulacionePorPagina;
        $this->conexion = $conexion;
        
        if(isset($_GET['pagina'])){

            $this->pagina = (filter_var($_GET['pagina'], FILTER_SANITIZE_NUMBER_INT)-1) * $this->postulacionesPorPagina;
        }
        
        $this->consultaSQL = $consultaSQL;
        $this->limites = $consultaSQL . " LIMIT $this->pagina, $this->postulacionesPorPagina";
    }

    //te devuelve el json listo
    public function obtenerJSON(): string{

        $json = convertirConsultaJSON($this->consultarPostulaciones());

        $json[] = Array('paginas' => $this->obtenerNumeroDePaginas());
        $jsonString = json_encode($json);

        return $jsonString;
    }

    private function consultarPostulaciones(){

        $resultado = mysqli_query($this->conexion, $this->limites);
        if(!$resultado){

            die("conexion fallida". mysqli_error($this->conexion));
        }

        return $resultado;
    }

    private function obtenerNumeroDePaginas(): int{

        $queryPaginacion = "SELECT COUNT(*) FROM propuesta";
        $filas = mysqli_query($this->conexion, $queryPaginacion) or die(mysqli_error($this->conexion));
        $aux = mysqli_fetch_row($filas);
        $numeroDePaginas = ceil($aux[0] / $this->postulacionesPorPagina);
        
        return $numeroDePaginas;
    }
}

class GeneradorSQL{

    private $abuscar;
    private $parametros;
    
    function __construct(array $parametros){
        $this->parametrosDeBusqueda = $parametros;
        $this->abuscar = "SELECT * FROM propuesta";// las cosas que debe buscar
    }

    public function sql(): string{

        $almenosUno = true;
        $contador = 0;
        foreach ($this->parametrosDeBusqueda as $clave => $valor) {

            $contador += 1;

            if($almenosUno){

                $this->abuscar .= " WHERE ";
                $almenosUno = false;
            }

            if($contador < sizeof($this->parametrosDeBusqueda)){

                $this->abuscar .= ($this->parametrosJsonASql($clave, $valor) . " AND ");
            }else{

                $this->abuscar .= $this->parametrosJsonASql($clave, $valor);
            }
        }
       return $this->abuscar;
    }

    private function parametrosJsonASql($clave, $valor){

        $cadenaSQL = "";
        switch($clave){
            case "buscar":
                $cadenaSQL = "titulo = '$valor'";
            break;
            case "chkCategoria":
                $cadenaSQL = "categorias = '$valor'";
            break;
            case "chkSueldo":
                $cadenaSQL = "sueldo >= '$valor'";
            break;
        }

        return $cadenaSQL;

    }
}

switch($_SERVER['REQUEST_METHOD']){

    case 'GET':
    $generadorConsulta = new GeneradorConsultaConPaginacion(5, $conexion);
    echo $generadorConsulta->obtenerJSON();

break;

    case 'POST':

        $parametrosDeBusqueda = json_decode(file_get_contents("php://input"), true);
        $generadorSql = new GeneradorSQL($parametrosDeBusqueda);
        $generadorConsulta = new GeneradorConsultaConPaginacion(5, $conexion);

        echo $generadorConsulta->obtenerJSON();
        
    break;
}





?>