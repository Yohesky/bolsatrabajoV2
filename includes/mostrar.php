<?php

//incluir la conexion con el servidor
include("conexion.php");
switch($_SERVER['REQUEST_METHOD']){

    case 'GET':
$postulacionePorPagina = 5;
$pagina = 0;
if(isset($_GET['pagina'])){
    $pagina = (filter_var($_GET['pagina'], FILTER_SANITIZE_NUMBER_INT)-1) * $postulacionePorPagina;
}

$query = "SELECT * FROM propuesta  JOIN empresa ON propuesta.empresa_idempresa = empresa.idempresa LIMIT $pagina, $postulacionePorPagina";
$resultado = mysqli_query($conexion, $query);


$queryPaginacion = "SELECT COUNT(*) FROM propuesta";
$filas = mysqli_query($conexion, $queryPaginacion) or die(mysqli_error($conexion));
$a = mysqli_fetch_row($filas);
$paginas = ceil($a[0] / $postulacionePorPagina);

if(!$resultado)
{
    die("conexion fallida". mysqli_error($conexion));
}

$json = array();
while($row = mysqli_fetch_array($resultado))
{
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

$json[] = Array('paginas' => $paginas);
$jsonString = json_encode($json);
echo $jsonString;
break;

    case 'POST':

        $parametrosDeBusqueda = json_decode(file_get_contents("php://input"), true);
        $abuscar = "SELECT * FROM propuesta";// las cosas que debe buscar

        $almenosUno = true;
        $contador = 0;
        foreach ($parametrosDeBusqueda as $clave => $valor) {

            $contador += 1;

            if($almenosUno){
                $abuscar .= " WHERE ";
            }
            if($contador < sizeof($parametrosDeBusqueda)){
                $abuscar .= (parametrosJsonASql($clave, $valor) . " AND ");
            }else{
                $abuscar .= parametrosJsonASql($clave, $valor);
            }

            
            
        }

       echo $abuscar;
    break;
}

function parametrosJsonASql($clave, $valor){

    $cadenaSQL = "";
    switch($clave){
        case "buscar":
            $cadenaSQL = "titulo = '$valor'";
        break;
        case "chkCategoria":
            $cadenaSQL = "categoria = '$valor'";
        break;
        case "chkSalario":
            $cadenaSQL = "salario = '$valor'";
        break;
    }

    return $cadenaSQL;

}
?>