<?php

//Clase que se encarga de crear y devolver el json de las consultas
class GeneradorConsultaConPaginacion{

    private $pagina = 0;
    private $postulacionesPorPagina = 0;
    private $conexion;
    private $consultaSQL = "";
    private $limites = "";
    private $condicionales = "";

    public function __construct($postulacionePorPagina = 5, $conexion, $consultaSQL = "SELECT * FROM propuesta  JOIN empresa ON propuesta.empresa_idempresa = empresa.idempresa" , $condicionales = ""){

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