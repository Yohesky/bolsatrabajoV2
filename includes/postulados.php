<?php 
include("conexion.php");
session_start();
//obtiene la pagina y la cantidad de postulaciones por pagina
$postulacionePorPagina = 5;
$pagina = 0;
if(isset($_GET['pagina'])){
    $pagina = (filter_var($_GET['pagina'], FILTER_SANITIZE_NUMBER_INT)-1) * $postulacionePorPagina;
}


$idempresa = $_SESSION['idempresa'];
$idpropuesta = $_GET["idpropuesta"];

$query = "SELECT * FROM usuarios_has_propuesta JOIN propuesta
ON usuarios_has_propuesta.propuesta_idpropuesta = propuesta.idpropuesta
JOIN usuarios ON usuarios_has_propuesta.usuarios_idusuarios = usuarios.idusuarios WHERE idpropuesta='$idpropuesta' LIMIT $pagina, $postulacionePorPagina";
$resultado = mysqli_query($conexion,$query);


$queryPaginacion = "SELECT COUNT(*) FROM usuarios_has_propuesta JOIN propuesta
ON usuarios_has_propuesta.propuesta_idpropuesta = propuesta.idpropuesta
JOIN usuarios ON usuarios_has_propuesta.usuarios_idusuarios = usuarios.idusuarios WHERE empresa_idempresa='$idempresa'";
$filas = mysqli_query($conexion, $queryPaginacion) or die(mysqli_error($conexion));
$a = mysqli_fetch_row($filas);
$paginas = ceil($a[0] / $postulacionePorPagina);

if(!$resultado)
{
    die("Conexion fallida, no se pudo traer los datos". mysqli_error($conexion));

}
 

$json = array();
while($row = mysqli_fetch_array($resultado))
{
$json[] = array 
(
    "nombre" => $row["nombre"],
    "apellido" => $row["apellido"],
    "foto" => $row["fotoPerfil"],
    "id" => $row["idusuarios"],
    "descripcion" => $row["descripcion"],
    "idpropuesta" => $row["propuesta_idpropuesta"]
);
    
}

$json[] = Array('paginas' => $paginas);
$jsonString = json_encode($json);
echo $jsonString;


?>