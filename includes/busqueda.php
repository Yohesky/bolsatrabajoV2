
<?php

//se incluye la conexion
include("conexion.php");


//le enviamos "busqueda" desde DATA y almacenamos con $busqueda el valor desde el lado del servidor
$busqueda = $_POST["busqueda"];

//si el valor de busqueda NO esta vacio se hace una consulta
if(!empty($busqueda))
{
    //consulta a la base de datos
    //selecciona todos los datos de la tabla llamada TAREAS
    //donde el nombre de la tarea coincida con la variable llamada BUSQUEDA
    $query = "SELECT * FROM propuesta JOIN empresa ON propuesta.empresa_idempresa = empresa.idempresa WHERE titulo LIKE '$busqueda%' ";
    $result = mysqli_query($conexion, $query);

    //si no tengo respuesta de la BD
    if(!$result)
    {   
        //termina el proceso
        die("Error de Consulta". mysqli_error($conexion));
    }


    $json = array();
    while($row = mysqli_fetch_array($result))
    {
        //array asociativo
        $json[] = array
        (
            "nombre" =>  $row ["titulo"],
            "descripcion" => $row ["descripcion"],
            "id" => $row ["idpropuesta"],
            "idempresa" => $row["idempresa"]
        );
    }

    $jsonString = json_encode($json);
    echo $jsonString;
}


?>