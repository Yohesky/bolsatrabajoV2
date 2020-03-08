<?php

//incluir la conexion con el servidor
include_once("conexion.php");


function inicio($conexion){
    
    if(isset($_GET["busqueda"])){

        $parametrosDeBusqueda = json_decode($_GET["datos"], true);        
        $generadorSql = new GeneradorSQL("SELECT *, propuesta.idpais as Pais FROM propuesta JOIN empresa ON propuesta.empresa_idempresa = empresa.idempresa JOIN pais ON propuesta.idpais = pais.id JOIN estado ON propuesta.idestado = estado.idestado", "parametrosJsonASql", $parametrosDeBusqueda);
        $generadorConsulta = new GeneradorConsultaConPaginacion(10, $conexion, $generadorSql->obtenerSentenciaSQL(), $generadorSql->obtenerCondicionales());
        echo $generadorConsulta->obtenerJSON();

    }else{
        
        $generadorConsulta = new GeneradorConsultaConPaginacion(10, $conexion);
        echo $generadorConsulta->obtenerJSON();

    }
}

//todo debe iniciar por aqui
inicio($conexion);


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
            "publicacion" => $row ["publicacion"],
            "id" =>  $row ["idpropuesta"],
            "idempresa" => $row["idempresa"],
            "categoria" => $row["categoria"]
        );

    }

    return $json;
}

//Genera te genera tus consultas con paginacion
//clase que genera la consulta con los filtros que deberia tener otro nombre pero ya que :)
class GeneradorSQL{

    private $abuscar;
    private $parametros;
    private $condicionales;
    private $almenosUno = false;
    
    function __construct(string $consulta, string $parametrosJsonASql, array $parametros){
        $this->parametrosDeBusqueda = $parametros;
        $this->abuscar = $consulta;// las cosas que debe buscar
        $this->condicionales = "";
        $this->callBack = $parametrosJsonASql;
        $this->sql();
    }

    public function obtenerSentenciaSQL(): string{
        return $this->abuscar;
    }

    public function obtenerCondicionales(): string{
        return $this->condicionales;
    }

    private function sql(){

        $contador = 0;
        foreach ($this->parametrosDeBusqueda as $clave => $valor) {

            $contador += 1;

            if(!$this->almenosUno){

                $this->condicionales .= " WHERE ";
                $this->almenosUno = true;
            }

            if($contador < sizeof($this->parametrosDeBusqueda)){

                $this->condicionales .= $this->parametrosJsonASql($clave, $valor) . " AND ";
            }else{

                $this->condicionales .= $this->parametrosJsonASql($clave, $valor);
            }
        }

        $this->abuscar .= $this->condicionales;
    }

function parametrosJsonASql($clave, $valor){

        $cadenaSQL = "";
        switch($clave){
            case "buscar":
                $cadenaSQL = "titulo LIKE '%$valor%'";
            break;
            case "chkCategoria":
                $cadenaSQL = "categoria = '$valor'";
            break;
            case "chkSueldo":
                switch($valor){
                    case 1:
                        $cadenaSQL = "sueldo > 0 AND sueldo <= 50";
                    break;
                    case 2:
                        $cadenaSQL = "sueldo >= 50 AND sueldo <= 100";
                    break;
                    case 3:
                        $cadenaSQL = "sueldo >= 100";
                    break;
                }
            break;
            case "chkUbicacion":
                $cadenaSQL = "propuesta.estado = '$valor'";
            break;
            default:
                'error clave no valida';
        }

        return $cadenaSQL;

    }
}

class GeneradorConsultaConPaginacion{

    private $pagina = 0;
    private $postulacionesPorPagina = 0;
    private $conexion;
    private $consultaSQL = "";
    private $limites = "";
    private $condicionales = "";

    public function __construct($postulacionePorPagina = 10, $conexion, $consultaSQL = "SELECT *, propuesta.idpais as Pais FROM propuesta JOIN empresa ON propuesta.empresa_idempresa = empresa.idempresa JOIN pais ON propuesta.idpais = pais.id JOIN estado ON propuesta.idestado = estado.idestado" , $condicionales = ""){

        $this->postulacionesPorPagina = $postulacionePorPagina;
        $this->conexion = $conexion;
        
        if(isset($_GET['pagina'])){

            $this->pagina = (filter_var($_GET['pagina'], FILTER_SANITIZE_NUMBER_INT)-1) * $this->postulacionesPorPagina;
        }
        
        $this->consultaSQL = $consultaSQL;
        $this->limites = $consultaSQL . " LIMIT $this->pagina, $this->postulacionesPorPagina";
        $this->condicionales = $condicionales;
    }

    //te devuelve el json listo
    public function obtenerJSON(): string{

        $json = convertirConsultaJSON($this->consultarPostulaciones());

        $json[] = Array('paginas' => $this->obtenerNumeroDePaginas());
        $jsonString = json_encode($json);
        //echo json_last_error_msg();
        return $jsonString;
    }

    private function consultarPostulaciones(){

        $resultado = mysqli_query($this->conexion, $this->limites);
        if(!$resultado){

            die("conexion fallida". mysqli_error($this->conexion));
        }

        return $resultado;
    }

    //Cuenta las publicaciones y regresa la cantidad de paginas 
    private function obtenerNumeroDePaginas(): int{

        $queryPaginacion = "SELECT COUNT(*) FROM propuesta" . $this->condicionales;
        $filas = mysqli_query($this->conexion, $queryPaginacion) or die(mysqli_error($this->conexion));
        $aux = mysqli_fetch_row($filas);
        $numeroDePaginas = ceil($aux[0] / $this->postulacionesPorPagina);
        
        return $numeroDePaginas;
    }
}
?>
